<?php

declare(strict_types=1);

namespace App\API\Foods\Application;


use App\API\Foods\Domain\Vegetable;
use App\API\Foods\Domain\Vegetables;
use App\API\Foods\Domain\VegetablesRepository;

final class GetVegetablesHandler
{
    public function __construct(private readonly VegetablesRepository $repository)
    {
        // code...
    }

    public function __invoke(GetVegetablesQuery $query): Vegetables
    {
        $vegetables = $this->repository->list();
        return $this->repository->list();
    }
}