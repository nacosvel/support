<?php

namespace Nacosvel\Support\Concerns;

use InvalidArgumentException;
use JsonException;

trait HasJsonCreatable
{
    /**
     * @inheritdoc
     *
     * @param string    $json
     * @param bool|null $associative
     * @param int       $depth
     * @param int       $flags
     *
     * @return static
     */
    public static function fromJson(string $json, ?bool $associative = null, int $depth = 512, int $flags = 0): static
    {
        try {
            $data = json_decode($json, $associative, $depth, $flags);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new JsonException(json_last_error_msg());
            }

            return new static($data);
        } catch (JsonException $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}
