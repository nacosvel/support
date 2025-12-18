<?php

namespace Nacosvel\Support\Contracts;

/**
 * Represents a class that can be instantiated from an array.
 */
interface ArrayCreatable
{
    /**
     * Create a new instance of the class from an array.
     *
     * @param array $data The input data for creating the instance.
     */
    public static function fromArray(array $data);
}
