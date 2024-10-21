<?php

declare(strict_types=1);

namespace App\API\Foods\Domain;

final class Fruits extends Collection
{
    public function type(): string
    {
        return Fruit::class;
    }
}
