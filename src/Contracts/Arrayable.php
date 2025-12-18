<?php

namespace Nacosvel\Support\Contracts;

/**
 * @template TKey of array-key
 * @template TValue
 */
interface Arrayable
{
    /**
     * Get the instance as an array.
     *
     * @return array<TKey, TValue>
     */
    #[TentativeType]
    public function toArray(): array;
}
