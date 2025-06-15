<?php

declare(strict_types=1);

namespace App;

final class GildedRose
{
    public function updateQuality(Item $item): void
    {
        if ($this->isSulfuras($item)) {
            $item->quality = 80;
            return;
        }

        if ($this->isAgedBrie($item)) {
            $this->updateAgedBrie($item);
        } elseif ($this->isBackstagePass($item)) {
            $this->updateBackstagePass($item);
        } else {
            $this->updateStandardItem($item);
        }

        $item->sell_in--;

        if ($item->sell_in < 0) {
            $this->handleExpiredItem($item);
        }
    }

    private function isSulfuras(Item $item): bool
    {
        return $item->name === 'Sulfuras, Hand of Ragnaros';
    }

    private function isAgedBrie(Item $item): bool
    {
        return $item->name === 'Aged Brie';
    }

    private function isBackstagePass(Item $item): bool
    {
        return $item->name === 'Backstage passes to a TAFKAL80ETC concert';
    }

    private function updateAgedBrie(Item $item): void
    {
        $this->increaseQuality($item);
    }

    private function updateBackstagePass(Item $item): void
    {
        $this->increaseQuality($item);

        if ($item->sell_in < 11) {
            $this->increaseQuality($item);
        }

        if ($item->sell_in < 6) {
            $this->increaseQuality($item);
        }
    }

    private function updateStandardItem(Item $item): void
    {
        $this->decreaseQuality($item);
    }

    private function increaseQuality(Item $item, int $amount = 1): void
    {
        $item->quality = min(50, $item->quality + $amount);
    }

    private function decreaseQuality(Item $item, int $amount = 1)
    {
        $item->quality = max(0, $item->quality - $amount);
    }

    private function handleExpiredItem(Item $item): void
    {
        if ($this->isAgedBrie($item)) {
            $this->increaseQuality($item);
        } elseif ($this->isBackstagePass($item)) {
            $item->quality = 0;
        } elseif (!$this->isSulfuras($item)) {
            $this->decreaseQuality($item);
        }
    }
}
