<?php

namespace Nacosvel\Support\Heap;

use Nacosvel\Support\Contracts\Arrayable;
use Nacosvel\Support\Contracts\ArrayInstantiable;
use SplHeap;

abstract class Heap extends SplHeap implements Arrayable, ArrayInstantiable
{
    public function __construct(private array $items = [])
    {
        foreach ($this->items as $value) {
            $this->insert($value);
        }
    }

    /**
     * Convert the current instance into a raw array representation.
     *
     * @return array The raw array form of the stored items.
     */
    #[TentativeType]
    public function toArray(): array
    {
        $data = [];

        $this->rewind();
        while ($this->valid()) {
            $data[$this->key()] = $this->current();
            $this->next();
        }

        $this->rewind();

        return $data;
    }

    /**
     * Create a new instance from the given items array.
     *
     * @param array $data
     *
     * @return static
     */
    #[TentativeType]
    public static function fromArray(array $data): static
    {
        return new static($data);
    }
}
