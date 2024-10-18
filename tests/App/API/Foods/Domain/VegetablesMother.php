<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Domain;

use App\API\Foods\Domain\Vegetables;

final class VegetablesMother {
    public static function validMultiple(): Vegetables {
        $vegetablesArray = [
            VegetableMother::createTomato(),
            VegetableMother::createCarrot(),
            VegetableMother::createOnion()
        ];

        return new Vegetables($vegetablesArray);
    }

    public static function validOne(): Vegetables {
        $vegetablesArray = [
            VegetableMother::createTomato()
        ];

        return new Vegetables($vegetablesArray);
    }

    public static function validEmpty(): Vegetables {
        return new Vegetables([]);
    }
}