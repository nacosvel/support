<?php

namespace Nacosvel\Support;

use ArrayAccess;
use ArrayObject;
use Nacosvel\Macroable\Macroable;

class HigherOrderProxy implements ArrayAccess
{
    use Macroable {
        __call as macroCall;
    }

    /**
     * Create a new proxy.
     */
    public function __construct(protected mixed $target)
    {
        //
    }

    /**
     * Dynamically handle method calls to the target or macro.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

        if (is_object($this->target)) {
            return $this->target->{$method}(...$parameters);
        }
    }

    /**
     * Dynamically get properties from the target.
     *
     * @param string $name
     *
     * @return mixed|null
     */
    public function __get(string $name)
    {
        if (is_object($this->target) && property_exists($this->target, $name)) {
            return $this->target->{$name};
        }

        if (is_array($this->target) && array_key_exists($name, $this->target)) {
            return $this->target[$name];
        }

        return null;
    }

    /**
     * Set a dynamic property on the target.
     *
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     */
    public function __set(string $name, mixed $value): void
    {
        if (is_object($this->target)) {
            $this->target->{$name} = $value;
        }

        if (is_array($this->target)) {
            $this->target[$name] = $value;
        }
    }

    /**
     * Dynamically check a property exists on the underlying object.
     *
     * @param $name
     *
     * @return bool
     */
    public function __isset($name): bool
    {
        if (is_array($this->target)) {
            return isset($this->target[$name]);
        }

        if (is_object($this->target)) {
            return isset($this->target->{$name});
        }

        if (is_array($this->target) || $this->target instanceof ArrayObject) {
            return isset($this->target[$name]);
        }

        return false;
    }

    /**
     * Determine if an item exists at an offset.
     *
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        if ($this->target instanceof ArrayAccess) {
            return $this->target->offsetExists($offset);
        }

        if (!is_array($this->target)) {
            return false;
        }

        if (is_float($offset) || is_null($offset)) {
            $offset = (string)$offset;
        }

        return array_key_exists($offset, $this->target);
    }

    /**
     * Get an item at a given offset.
     *
     * @param mixed $offset
     *
     * @return mixed
     */
    public function offsetGet(mixed $offset): mixed
    {
        if (!$this->accessible()) {
            return value(null);
        }

        if (is_null($offset)) {
            return $this->target;
        }

        if ($this->offsetExists($offset)) {
            return $this->target[$offset];
        }

        return null;
    }

    /**
     * Set the item at a given offset.
     *
     * @param mixed $offset
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        if ($this->accessible()) {
            $this->target[$offset] = $value;
        }
    }

    /**
     * Unset the item at a given offset.
     *
     * @param mixed $offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        if ($this->accessible()) {
            unset($this->target[$offset]);
        }
    }

    /**
     * Determine is array accessible.
     *
     * @return bool
     */
    protected function accessible(): bool
    {
        return is_array($this->target) || $this->target instanceof ArrayAccess;
    }
}
