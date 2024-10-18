<?php

declare(strict_types=1);

namespace App\API\Foods\Application;


use App\API\Foods\Domain\Fruits;
use App\API\Foods\Domain\FruitsRepository;

final class GetFruitsHandler {
    public function __construct(private readonly FruitsRepository $repository) {
        // code...
    }

    public function __invoke(GetFruitsQuery $query): Fruits {
        return $this->repository->list();
    }
}