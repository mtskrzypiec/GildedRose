<?php

declare(strict_types=1);

namespace App;

use App\Updater\Enum\UpdaterType;
use App\Updater\Factory\UpdaterRegisterFactory;
use App\Updater\Register\UpdaterRegister;
use App\Updater\Register\UpdaterRegistry;

final readonly class GildedRose
{
    public function updateQuality(Item $item): void
    {
        $updater = $this->getUpdaterRegistry()->getUpdater(
            UpdaterType::fromName($item->getName())
        );

        $updater->update($item);
    }

    public function getUpdaterRegistry(): UpdaterRegistry
    {
        return (new UpdaterRegisterFactory())->create();
    }
}
