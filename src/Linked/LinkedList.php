<?php

namespace Nacosvel\Support\Linked;

use Nacosvel\Support\Contracts\Arrayable;
use Nacosvel\Support\Contracts\ArrayInstantiable;
use SplDoublyLinkedList;

class LinkedList extends SplDoublyLinkedList implements Arrayable, ArrayInstantiable
{
    public function __construct(private array $items = [])
    {
        foreach ($this->items as $value) {
            $this->push($value);
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

        $mode = $this->getIteratorMode();
        $this->setIteratorMode(self::IT_MODE_KEEP);

        $this->rewind();
        while ($this->valid()) {
            $data[$this->key()] = $this->current();
            $this->next();
        }

        $this->rewind();
        $this->setIteratorMode($mode);

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
