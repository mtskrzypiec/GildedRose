<?php

declare(strict_types=1);

namespace App\Updater\Service;

use App\Updater\Enum\UpdaterType;
use App\Updater\ValueObject\Item;
use App\Updater\Interface\ItemUpdaterInterface;

class StandardItemUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $sellIn = $item->getSellIn();
        $quality = $item->getQuality();

        if ($quality > 0) {
            $quality--;
        }

        $sellIn--;

        if ($sellIn < 0 && $quality > 0) {
            $quality--;
        }

        $item->setQuality($quality);
        $item->setSellIn($sellIn);
    }

    public function getUpdaterType(): UpdaterType
    {
        return UpdaterType::Standard;
    }
}
