<?php

declare(strict_types=1);

namespace App\API\Foods\Domain;

use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;

abstract class Collection implements IteratorAggregate, Countable
{
    public function __construct(
        protected array $items = []
    ) {
        if ($this->items) {
            $this->arrayOf($this->type(), $items);
        }
    }

    public function add($item): self
    {
        $this->instanceOf($this->type(), $item);
        $this->items[] = $item;

        return $this;
    }

    public function remove($item): self
    {
        $this->instanceOf($this->type(), $item);
        $this->items = array_filter($this->items, fn (stdClass $i) => $i !== $item);

        return $this;
    }

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items());
    }

    public function count(): int
    {
        return count($this->items());
    }

    public function items(): array
    {
        return $this->items;
    }

    abstract protected function type(): string;

    private function arrayOf(string $class, array $items): void
    {
        foreach ($items as $item) {
           $this->instanceOf($class, $item);
        }
    }

    private function instanceOf(string $class, mixed $item): void
    {
        if (! $item instanceof $class) {
            throw new InvalidArgumentException(
                sprintf('The object <%s> is not an instance of <%s>', $class, $item::class)
            );
        }
    }
}