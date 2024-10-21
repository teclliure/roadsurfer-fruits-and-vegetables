<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Application;

use App\API\Foods\Application\GetFruitsHandler;
use App\API\Foods\Application\GetFruitsQuery;
use App\API\Foods\Domain\FruitsRepository;
use App\Tests\App\API\Foods\Domain\FruitsMother;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class GetFruitsHandlerTest extends TestCase
{
    private FruitsRepository|MockObject $fruitsRepository;

    private GetFruitsHandler $getFruitsHandler;

    public function setUp(): void
    {
        $this->fruitsRepository = $this->createMock(FruitsRepository::class);
        $this->getFruitsHandler = new GetFruitsHandler(
            $this->fruitsRepository,
        );
    }

    public function testGetFruitsListOk(): void
    {
        $fruits = FruitsMother::validEmpty();

        $this->fruitsRepository
            ->expects($this->once())
            ->method('list')
            ->willReturn($fruits);

        $this->getFruitsHandler->__invoke(
            new GetFruitsQuery()
        );
    }
}
