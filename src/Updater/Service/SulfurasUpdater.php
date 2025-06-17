<?php

declare(strict_types=1);

namespace App\Updater\Service;

use App\Updater\Enum\UpdaterType;
use App\Updater\ValueObject\Item;
use App\Updater\Interface\ItemUpdaterInterface;

class SulfurasUpdater implements ItemUpdaterInterface
{
    public function update(Item $item): void
    {
        $item->setQuality(80);
    }

    public function getUpdaterType(): UpdaterType
    {
        return UpdaterType::Sulfuras;
    }
}
