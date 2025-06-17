<?php

declare(strict_types=1);

namespace App\Updater\Service;

use App\Item;
use App\Updater\Enum\UpdaterType;
use App\Updater\Interface\ItemUpdaterInterface;

class AgedBrieUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $quality = $item->getQuality();

        if ($quality >= 50) {
            $item->sell_in--;
            return;
        }

        $quality++;

        if ($item->sell_in <= 0 && $quality < 50) {
            $quality++;
        }

        $item->setQuality($quality);
        $item->sell_in--;
    }

    public function getUpdaterType(): UpdaterType
    {
        return UpdaterType::AgedBrie;
    }
}
