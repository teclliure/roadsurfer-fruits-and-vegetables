<?php

declare(strict_types=1);

namespace App\API\Foods\Application;

use App\API\Foods\Domain\Fruit;
use App\API\Foods\Domain\Fruits;
use App\API\Foods\Domain\FruitsRepository;
use App\API\Foods\Domain\Mass;
use App\API\Foods\Domain\MassConverter;
use App\API\Foods\Domain\Vegetable;
use App\API\Foods\Domain\Vegetables;
use App\API\Foods\Domain\VegetablesRepository;

final class CreateFruitHandler
{
    public function __construct(
        private readonly FruitsRepository $fruitsRepository
    ) {}

    public function __invoke(CreateFruitCommand $command): void
    {
        $fruit = new Fruit(
            $command->id(),
            $command->name(),
            $command->massQuantity()
        );

        $fruits = $this->fruitsRepository->list();
        $fruits->add($fruit);
        $this->fruitsRepository->save($fruits);
    }
}