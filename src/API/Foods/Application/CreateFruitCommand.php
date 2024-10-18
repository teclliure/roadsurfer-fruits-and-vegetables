<?php

declare(strict_types=1);

namespace App\API\Foods\Application;

final class CreateFruitCommand {
    public function __construct(
        private int $id,
        private string $name,
        private int $massQuantity
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function massQuantity(): int
    {
        return $this->massQuantity;
    }
}