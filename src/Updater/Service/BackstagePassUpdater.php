<?php

declare(strict_types=1);

namespace App\Updater\Service;

use App\Item;
use App\Updater\Enum\UpdaterType;
use App\Updater\Interface\ItemUpdaterInterface;

class BackstagePassUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $quality = $item->getQuality();

        if ($item->sell_in <= 0) {
            $item->setQuality(0);
            $item->sell_in--;
            return;
        }

        if ($quality < 50) {
            $quality++;

            if ($item->sell_in <= 10 && $quality < 50) {
                $quality++;
            }

            if ($item->sell_in <= 5 && $quality < 50) {
                $quality++;
            }

            $item->setQuality($quality);
        }

        $item->sell_in--;
    }

    public function getUpdaterType(): UpdaterType
    {
        return UpdaterType::BackstagePass;
    }
}
