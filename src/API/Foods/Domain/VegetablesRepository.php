<?php

declare(strict_types=1);

namespace App\API\Foods\Domain;

interface VegetablesRepository
{
    public function save(Vegetables $vegetables): void;

    public function list(): Vegetables;
}
