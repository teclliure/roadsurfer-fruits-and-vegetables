<?php

declare(strict_types=1);

namespace App\API\Foods\Application;

use App\API\Foods\Domain\Fruit;
use App\API\Foods\Domain\Fruits;
use App\API\Foods\Domain\FruitsRepository;
use App\API\Foods\Domain\MassConverter;
use App\API\Foods\Domain\Vegetable;
use App\API\Foods\Domain\Vegetables;
use App\API\Foods\Domain\VegetablesRepository;

final readonly class CreateFruitsAndVegetablesCollectionsHandler
{
    public function __construct(
        private FruitsRepository $fruitsRepository,
        private VegetablesRepository $vegetablesRepository,
        private MassConverter $massConverter,
    ) {
    }

    public function __invoke(CreateFruitsAndVegetablesCollectionsCommand $command): void
    {
        $fruits = new Fruits([]);
        $vegetables = new Vegetables([]);
        $fruitsAndVegetables = $command->fruitsAndVegetables();
        array_walk($fruitsAndVegetables, function ($fruitOrVegetable) use ($fruits, $vegetables) {
            if ($this->isFruit($fruitOrVegetable)) {
                $fruits->add($this->createFruit($fruitOrVegetable));
            } else {
                $vegetables->add($this->createVegetable($fruitOrVegetable));
            }
        });
        $this->fruitsRepository->save($fruits);
        $this->vegetablesRepository->save($vegetables);
    }

    private function isFruit(array $fruitOrVegetable): bool
    {
        if ('fruit' === $fruitOrVegetable['type']) {
            return true;
        }

        return false;
    }

    private function createFruit(array $fruitOrVegetable): Fruit
    {
        if ('kg' === $fruitOrVegetable['unit']) {
            $fruitOrVegetable['quantity'] = $this->massConverter->kilogramsToGrams($fruitOrVegetable['quantity']);
        }

        return new Fruit(
            $fruitOrVegetable['id'],
            $fruitOrVegetable['name'],
            $fruitOrVegetable['quantity'],
        );
    }

    private function createVegetable(array $fruitOrVegetable): Vegetable
    {
        if ('kg' === $fruitOrVegetable['unit']) {
            $fruitOrVegetable['quantity'] = $this->massConverter->kilogramsToGrams($fruitOrVegetable['quantity']);
        }

        return new Vegetable(
            $fruitOrVegetable['id'],
            $fruitOrVegetable['name'],
            $fruitOrVegetable['quantity'],
        );
    }
}
