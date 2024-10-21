<?php

declare(strict_types=1);

namespace App\API\Foods\Domain;

final class Vegetables extends Collection
{
    public function type(): string
    {
        return Vegetable::class;
    }
}
