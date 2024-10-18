<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Application;

use App\API\Foods\Application\CreateFruitCommand;
use App\API\Foods\Application\CreateFruitHandler;
use App\API\Foods\Domain\FruitsRepository;
use App\Tests\App\API\Foods\Domain\FruitMother;
use App\Tests\App\API\Foods\Domain\FruitsMother;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CreateFruitHandlerTest extends TestCase
{
    private FruitsRepository|MockObject $fruitsRepository;

    private CreateFruitHandler $createFruitHandler;

    public function setUp(): void
    {
        $this->fruitsRepository = $this->createMock(FruitsRepository::class);
        $this->createFruitHandler = new CreateFruitHandler(
            $this->fruitsRepository,
        );
    }

    public function testCreateFruit(): void
    {
        $fruit = FruitMother::createBanana();
        $fruits = FruitsMother::validEmpty();

        $this->fruitsRepository
            ->expects($this->once())
            ->method('list')
            ->willReturn(clone $fruits);

        $this->fruitsRepository
            ->expects($this->once())
            ->method('save')
            ->with($fruits->add($fruit));

        $this->createFruitHandler->__invoke(
            new CreateFruitCommand(
                $fruit->id(),
                $fruit->name(),
                $fruit->massQuantity(),
            ),
        );
    }
}
