<?php

declare(strict_types=1);

namespace App\API\Foods\Application;

use App\API\Foods\Domain\Fruit;
use App\API\Foods\Domain\FruitsRepository;

final class CreateFruitHandler
{
    public function __construct(
        private readonly FruitsRepository $fruitsRepository
    ) {
    }

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
