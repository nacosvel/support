<?php

namespace Nacosvel\Support\Concerns;

trait HasArrayCreatable
{
    /**
     * @inheritdoc
     *
     * @param array $data
     *
     * @return static
     */
    public static function fromArray(array $data): static
    {
        return new static($data);
    }
}
