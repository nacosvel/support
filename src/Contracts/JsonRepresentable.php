<?php

namespace Nacosvel\Support\Contracts;

/**
 * Represents an object that can be converted to a JSON string.
 */
interface JsonRepresentable
{
    /**
     * Convert the object into a JSON representation.
     *
     * @param int $options Optional JSON encode options.
     * @return string The JSON string representation of the object.
     */
    public function toJson(int $options = 0): string;
}
