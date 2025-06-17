<?php

declare(strict_types=1);

namespace App;

use App\Updater\Enum\UpdaterType;
use App\Updater\ValueObject\Item;
use App\Updater\Register\UpdaterRegister;

final readonly class GildedRose
{
    public function __construct(private UpdaterRegister $updaterRegister)
    {
    }

    public function updateQuality(Item $item): void
    {
        $updater = $this->updaterRegister->getUpdater(
            UpdaterType::fromName($item->getName())
        );

        $updater->update($item);
    }
}
