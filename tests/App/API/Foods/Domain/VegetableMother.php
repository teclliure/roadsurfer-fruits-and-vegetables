<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Domain;

use App\API\Foods\Domain\Vegetable;

final class VegetableMother
{
    public static function createTomato(): Vegetable
    {
        return new Vegetable(1, 'Tomato', 20);
    }

    public static function createCarrot(): Vegetable
    {
        return new Vegetable(2, 'Carrot', 77);
    }

    public static function createOnion(): Vegetable
    {
        return new Vegetable(3, 'Onion', 4322);
    }
}
