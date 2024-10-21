<?php

declare(strict_types=1);

namespace App\API\Foods\Application;

final readonly class CreateFruitsAndVegetablesCollectionsCommand
{
    public function __construct(
        private array $fruitsAndVegetables,
    ) {
    }

    public function fruitsAndVegetables(): array
    {
        return $this->fruitsAndVegetables;
    }
}
