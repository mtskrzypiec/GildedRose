<?php

declare(strict_types=1);

namespace App\Updater\ValueObject;

use App\Updater\Exception\InvalidQualityValueException;

final class Item
{
    private const int MAX_QUALITY = 80;
    private const int MIN_QUALITY = 0;

    public function __construct(
        private readonly string $name,
        private int $sell_in,
        private int $quality
    ) {
        $this->validateQuality($quality);
    }

    public static function create(string $name, int $sell_in, int $quality): self
    {
        return new self(
            name: $name,
            sell_in: $sell_in,
            quality:  $quality
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSellIn(): int
    {
        return $this->sell_in;
    }

    public function setSellIn(int $sell_in): void
    {
        $this->sell_in = $sell_in;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function setQuality(int $quality): void
    {
        $this->validateQuality($quality);
        $this->quality = $quality;
    }

    private function validateQuality(int $quality): void
    {
        if ($quality < self::MIN_QUALITY || $quality > self::MAX_QUALITY) {
            throw new InvalidQualityValueException(
                quality: $quality,
                minQuality: self::MIN_QUALITY,
                maxQuality: self::MAX_QUALITY
            );
        }
    }
}
