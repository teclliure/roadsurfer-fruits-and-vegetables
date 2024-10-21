<?php

declare(strict_types=1);

namespace App\Tests\App\API\Foods\Infrastructure;

use App\API\Foods\Domain\Vegetables;
use App\API\Foods\Infrastructure\StorageSystemInMemory;
use App\Tests\App\API\Foods\Domain\VegetablesMother;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class StorageSystemInMemoryTest extends KernelTestCase
{
    private StorageSystemInMemory $storageInMemory;

    public function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();
        $filesystemAdapter = $container->get(FilesystemAdapter::class);
        $this->storageInMemory = new StorageSystemInMemory($filesystemAdapter);
    }

    public function testGetSaveCollection(): void
    {
        $key = 'testKey';
        $expected = VegetablesMother::validMultiple();

        $this->storageInMemory->save($key, $expected->items());
        $actual = $this->storageInMemory->get($key);

        $this->assertEquals($expected, new Vegetables($actual));
    }
}
