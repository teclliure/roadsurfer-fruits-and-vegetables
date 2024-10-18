<?php

declare(strict_types=1);

namespace App\API\Foods\Application;

final class CreateFruitsAndVegetablesCollectionsCommand {
    public function __construct(
        private readonly array $fruitsAndVegetables
    ) {
    }

    public function fruitsAndVegetables(): array
    {
        return $this->fruitsAndVegetables;
    }
}