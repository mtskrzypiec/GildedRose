<?php

declare(strict_types=1);

namespace App\Updater\Interface;

use App\Item;
use App\Updater\Enum\UpdaterType;

interface ItemUpdaterInterface
{
    public function update(Item $item): void;
    public function getUpdaterType(): UpdaterType;
}
