<?php

declare(strict_types=1);

namespace App\API\Foods\Domain;

interface FruitsRepository
{
    public function save(Fruits $fruits): void;

    public function list(): Fruits;
}
