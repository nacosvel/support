<?php

namespace Nacosvel\Support\Contracts;

use InvalidArgumentException;

/**
 * Represents a class that can be instantiated from a JSON string.
 *
 * This interface is useful for objects that need to deserialize JSON data
 * into a strongly-typed object instance.
 */
interface JsonCreatable
{
    /**
     * Create a new instance from a JSON string.
     *
     * @param string    $json        The JSON string to deserialize.
     * @param bool|null $associative Whether to decode JSON as an associative array (true)
     *                               or as objects (false). Default is false.
     * @param int       $depth       User specified recursion depth.
     * @param int       $flags       <p>
     *                               Bitmask of JSON decode options:<br/>
     *                               {@see JSON_BIGINT_AS_STRING} decodes large integers as their original string value.<br/>
     *                               {@see JSON_INVALID_UTF8_IGNORE} ignores invalid UTF-8 characters,<br/>
     *                               {@see JSON_INVALID_UTF8_SUBSTITUTE} converts invalid UTF-8 characters to \0xfffd,<br/>
     *                               {@see JSON_OBJECT_AS_ARRAY} decodes JSON objects as PHP array, since 7.2.0 used by default if $assoc parameter is null,<br/>
     *                               {@see JSON_THROW_ON_ERROR} when passed this flag, the error behaviour of these functions is changed. The global error state is left untouched, and if an error occurs that would otherwise set it, these functions instead throw a JsonException<br/>
     *                               </p>
     *
     * @return static A new instance of the implementing class.
     *
     * @throws InvalidArgumentException If the JSON string is invalid.
     */
    public static function fromJson(string $json, bool $associative = null, int $depth = 512, int $flags = 0): static;
}
