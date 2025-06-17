<?php

declare(strict_types=1);

namespace App\Updater\Service;

use App\Updater\Enum\UpdaterType;
use App\Updater\ValueObject\Item;
use App\Updater\Interface\ItemUpdaterInterface;

class BackstagePassUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $sellIn = $item->getSellIn();
        $quality = $item->getQuality();

        if ($sellIn <= 0) {
            $item->setQuality(0);
            $item->setSellIn($sellIn - 1);
            return;
        }

        if ($quality < 50) {
            $quality++;

            if ($sellIn <= 10 && $quality < 50) {
                $quality++;
            }

            if ($sellIn <= 5 && $quality < 50) {
                $quality++;
            }

            $item->setQuality($quality);
        }

        $item->setSellIn($sellIn - 1);
    }

    public function getUpdaterType(): UpdaterType
    {
        return UpdaterType::BackstagePass;
    }
}
