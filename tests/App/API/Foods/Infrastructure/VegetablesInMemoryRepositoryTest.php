<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Infrastructure;

use App\API\Foods\Domain\StorageSystem;
use App\API\Foods\Infrastructure\VegetablesInMemoryRepository;
use App\Tests\App\API\Foods\Domain\VegetablesMother;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class VegetablesInMemoryRepositoryTest extends TestCase
{
    private StorageSystem|MockObject $storageSystem;
    private VegetablesInMemoryRepository $repository;

    public function setUp(): void
    {
        $this->storageSystem = $this->createMock(StorageSystem::class);
        $this->repository = new VegetablesInMemoryRepository($this->storageSystem);
    }

    public function testSaveCollection(): void
    {
        $vegetables = VegetablesMother::validMultiple();

        $this->storageSystem->expects($this->once())
            ->method('save')
            ->with('vegetables', $vegetables->items());

        $this->repository->save($vegetables);
    }

    public function testGetCollection(): void
    {
        $vegetables = VegetablesMother::validMultiple();

        $this->storageSystem->expects($this->once())
            ->method('get')
            ->with('vegetables', []);

        $this->repository->list();
    }
}
