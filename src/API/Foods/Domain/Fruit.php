<?php

declare(strict_types=1);

namespace App\API\Foods\Domain;

final readonly class Fruit
{
    private MassConverter $massConverter;

    public function __construct(
        private int $id,
        private string $name,
        private int $massQuantity,
    ) {
        $this->massConverter = new MassConverter();
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

    public function toArray(string $unit): array
    {
        $massQuantity = $this->massQuantity();
        if ('kg' === $unit) {
            $massQuantity = $this->massConverter->gramsToKilograms($massQuantity);
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'mass' => $massQuantity,
        ];
    }
}