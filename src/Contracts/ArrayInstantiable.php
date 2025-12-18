<?php

namespace Nacosvel\Support\Contracts;

interface ArrayInstantiable
{
    /**
     * Create a new instance from an array.
     *
     * @param array $data
     *
     * @return static
     */
    #[TentativeType]
    public static function fromArray(array $data): static;
}
