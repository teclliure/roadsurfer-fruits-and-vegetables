<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Infrastructure;

use App\API\Foods\Domain\StorageSystem;
use App\API\Foods\Infrastructure\FruitsInMemoryRepository;
use App\Tests\App\API\Foods\Domain\FruitsMother;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class FruitsInMemoryRepositoryTest extends TestCase
{
    private StorageSystem|MockObject $storageSystem;
    private FruitsInMemoryRepository $repository;

    public function setUp(): void
    {
        $this->storageSystem = $this->createMock(StorageSystem::class);
        $this->repository = new FruitsInMemoryRepository($this->storageSystem);
    }

    public function testSaveCollection(): void
    {
        $fruits = FruitsMother::validMultiple();

        $this->storageSystem->expects($this->once())
            ->method('save')
            ->with('fruits', $fruits->items());

        $this->repository->save($fruits);
    }

    public function testGetCollection(): void
    {
        $fruits = FruitsMother::validMultiple();

        $this->storageSystem->expects($this->once())
            ->method('get')
            ->with('fruits', []);

        $this->repository->list();
    }
}
