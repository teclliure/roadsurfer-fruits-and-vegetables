<?php

declare(strict_types=1);

namespace App\API\Foods\Domain;

interface StorageSystem
{
    public function save($key, array $content): void;

    public function get($key, array $defaultValue = []): array;
}