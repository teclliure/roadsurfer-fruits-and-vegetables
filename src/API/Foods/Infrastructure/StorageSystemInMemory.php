<?php

declare(strict_types=1);

namespace App\API\Foods\Infrastructure;

use App\API\Foods\Domain\StorageSystem;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

final class StorageSystemInMemory implements StorageSystem
{
    public function __construct(public readonly FilesystemAdapter $storage) {}

    public function save($key, array $content): void
    {
        $cacheItem = $this->storage->getItem($key);
        $cacheItem->set($content);
        $this->storage->save($cacheItem);
    }

    public function get($key, array $defaultValue = []): array
    {
        $cacheItem = $this->storage->getItem($key);
        if (!$cacheItem->isHit()) {
            return $defaultValue;
        }
        return $cacheItem->get();
    }
}