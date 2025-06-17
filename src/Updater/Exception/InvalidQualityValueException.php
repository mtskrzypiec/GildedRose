<?php

declare(strict_types=1);

namespace App\Updater\Exception;

use InvalidArgumentException;

final class InvalidQualityValueException extends InvalidArgumentException
{
    public function __construct(int $quality, int $minQuality, int $maxQuality)
    {
        parent::__construct(
            sprintf(
                'Invalid quality value: %d. Allowed range is between %d and %d.',
                $quality,
                $minQuality,
                $maxQuality
            )
        );
    }
}
