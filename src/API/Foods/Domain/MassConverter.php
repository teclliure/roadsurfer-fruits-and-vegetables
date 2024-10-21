<?php

declare(strict_types=1);

namespace App\API\Foods\Domain;

final class MassConverter
{
    public function gramsToKilograms(int $mass): float
    {
        return $mass / 1000;
    }

    public function kilogramsToGrams(float $kilograms): int
    {
        return (int) $kilograms * 1000;
    }
}
