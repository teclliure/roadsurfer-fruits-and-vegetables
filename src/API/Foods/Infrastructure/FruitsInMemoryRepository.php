<?php

declare(strict_types=1);

namespace App\API\Foods\Infrastructure;

use App\API\Foods\Domain\Fruit;
use App\API\Foods\Domain\Fruits;
use App\API\Foods\Domain\FruitsRepository;
use App\API\Foods\Domain\Mass;
use App\API\Foods\Domain\StorageSystem;

final class FruitsInMemoryRepository implements FruitsRepository {

    public function __construct(private readonly StorageSystem $storage) {}

    public function save(Fruits $fruits): void
    {
        $this->storage->save('fruits', $fruits->items());
    }

    public function list(): Fruits
    {
        $fruits = $this->storage->get('fruits', []);
        return new Fruits($fruits);
    }
}