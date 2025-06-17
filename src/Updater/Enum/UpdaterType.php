<?php

declare(strict_types=1);

namespace App\Updater\Enum;

enum UpdaterType
{
    case AgedBrie;
    case Sulfuras;
    case BackstagePass;
    case Standard;

    public static function fromName(string $name): self
    {
        return match ($name) {
            'Aged Brie' => self::AgedBrie,
            'Sulfuras, Hand of Ragnaros' => self::Sulfuras,
            'Backstage passes to a TAFKAL80ETC concert' => self::BackstagePass,
            default => self::Standard
        };
    }
}
