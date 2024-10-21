<?php

declare(strict_types=1);

namespace App\API\Foods\Application;

use App\API\Foods\Domain\Vegetables;
use App\API\Foods\Domain\VegetablesRepository;

final readonly class GetVegetablesHandler
{
    public function __construct(private VegetablesRepository $repository)
    {
    }

    public function __invoke(GetVegetablesQuery $query): Vegetables
    {
        return $this->repository->list();
    }
}
