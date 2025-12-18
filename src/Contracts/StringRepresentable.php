<?php

namespace Nacosvel\Support\Contracts;

/**
 * Represents an object that can expose a meaningful string representation.
 *
 * This is an explicit alternative to PHP's Stringable interface,
 * intended for manual invocation, testing, and composition.
 */
interface StringRepresentable
{
    /**
     * Get a string representation of the object.
     *
     * @return string
     */
    public function toString(): string;
}
