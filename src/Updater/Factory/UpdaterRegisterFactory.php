<?php

declare(strict_types=1);

namespace App\Updater\Factory;

use App\Updater\Service\AgedBrieUpdater;
use App\Updater\Service\SulfurasUpdater;
use App\Updater\Register\UpdaterRegister;
use App\Updater\Service\StandardItemUpdater;
use App\Updater\Service\BackstagePassUpdater;

class UpdaterRegisterFactory
{
    public function create(): UpdaterRegister
    {
        $updaterRegister = new UpdaterRegister();
        $updaterRegister->add(new AgedBrieUpdater());
        $updaterRegister->add(new SulfurasUpdater());
        $updaterRegister->add(new BackstagePassUpdater());
        $updaterRegister->add(new StandardItemUpdater());

        return $updaterRegister;
    }
}
