<?php

declare(strict_types=1);

namespace App\Updater\Register;

use App\Updater\Enum\UpdaterType;
use App\Updater\Interface\ItemUpdaterInterface;

class UpdaterRegister
{
    /** @var ItemUpdaterInterface[] $updaters */
    private array $updaters = [];

    public function add(ItemUpdaterInterface $updater): void
    {
        $this->updaters[$updater->getUpdaterType()->name] = $updater;
    }

    public function getUpdater(UpdaterType $type): ItemUpdaterInterface
    {
        return $this->updaters[$type->name];
    }
}
