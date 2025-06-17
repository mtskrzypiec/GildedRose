<?php

declare(strict_types=1);

namespace App\Updater\Interface;

use App\Updater\Enum\UpdaterType;
use App\Updater\ValueObject\Item;

interface ItemUpdaterInterface
{
    public function update(Item $item): void;
    public function getUpdaterType(): UpdaterType;
}
