<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Domain;

use App\API\Foods\Domain\Fruits;

final class FruitsMother
{
    public static function validMultiple(): Fruits
    {
        $fruitsArray = [
            FruitMother::createApple(),
            FruitMother::createBanana(),
            FruitMother::createAvocado(),
        ];

        return new Fruits($fruitsArray);
    }

    public static function validOne(): Fruits
    {
        $fruitsArray = [
            FruitMother::createAvocado(),
        ];

        return new Fruits($fruitsArray);
    }

    public static function validEmpty(): Fruits
    {
        return new Fruits([]);
    }
}
