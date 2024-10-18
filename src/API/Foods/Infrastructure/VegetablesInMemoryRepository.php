<?php

declare(strict_types=1);

namespace App\API\Foods\Infrastructure;

use App\API\Foods\Domain\Mass;
use App\API\Foods\Domain\StorageSystem;
use App\API\Foods\Domain\Vegetable;
use App\API\Foods\Domain\Vegetables;
use App\API\Foods\Domain\VegetablesRepository;

final class VegetablesInMemoryRepository implements VegetablesRepository {

    public function __construct(private readonly StorageSystem $storage) {}

    public function save(Vegetables $vegetables): void
    {
        $this->storage->save('vegetables', $vegetables->items());
    }

    public function list(): Vegetables
    {
        $vegetables = $this->storage->get('vegetables', []);
        return new Vegetables($vegetables);
    }
}