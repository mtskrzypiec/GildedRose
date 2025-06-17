<?php

declare(strict_types=1);

namespace App\Updater\Service;

use App\Item;
use App\Updater\Enum\UpdaterType;
use App\Updater\Interface\ItemUpdaterInterface;

class StandardItemUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $quality = $item->getQuality();

        if ($quality > 0) {
            $quality--;
        }

        $item->sell_in--;

        if ($item->sell_in < 0 && $quality > 0) {
            $quality--;
        }

        $item->setQuality($quality);
    }

    public function getUpdaterType(): UpdaterType
    {
        return UpdaterType::Standard;
    }
}
