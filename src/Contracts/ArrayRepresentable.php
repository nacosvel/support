<?php

namespace Nacosvel\Support\Contracts;

/**
 * Represents an object that can be converted to an array.
 */
interface ArrayRepresentable
{
    /**
     * Convert the object into an array representation.
     *
     * @return array The array representation of the object.
     */
    public function toArray(): array;
}
