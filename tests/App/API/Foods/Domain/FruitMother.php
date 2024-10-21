<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Domain;

use App\API\Foods\Domain\Fruit;

final class FruitMother
{
    public static function createApple(): Fruit
    {
        return new Fruit(1, 'Apple', 20);
    }

    public static function createBanana(): Fruit
    {
        return new Fruit(2, 'Banana', 50);
    }

    public static function createAvocado(): Fruit
    {
        return new Fruit(3, 'Avocado', 150);
    }
}
