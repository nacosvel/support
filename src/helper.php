<?php

use Nacosvel\Support\HigherOrderProxy;
use Nacosvel\Support\HigherOrderTapProxy;

if (!function_exists('optional')) {
    /**
     * Provide access to optional objects.
     *
     * @template TValue
     * @template TReturn
     *
     * @param TValue                           $value
     * @param (callable(TValue): TReturn)|null $callback
     *
     * @return ($callback is null ? HigherOrderProxy : ($value is null ? null : TReturn))
     */
    function optional($value = null, callable $callback = null)
    {
        if (is_null($callback)) {
            return new HigherOrderProxy($value);
        }

        if (!is_null($value)) {
            return $callback($value);
        }

        return null;
    }
}

if (!function_exists('tap')) {
    /**
     * Call the given Closure with the given value then return the value.
     *
     * @template TValue
     *
     * @param TValue                         $value
     * @param (callable(TValue): mixed)|null $callback
     *
     * @return ($callback is null ? HigherOrderTapProxy : TValue)
     */
    function tap($value, callable $callback = null)
    {
        if (is_null($callback)) {
            return new HigherOrderTapProxy($value);
        }

        $callback($value);

        return $value;
    }
}

if (!function_exists('value')) {
    /**
     * Return the default value of the given value.
     *
     * @template TValue
     * @template TArgs
     *
     * @param TValue|Closure(TArgs): TValue $value
     * @param TArgs                         ...$args
     *
     * @return TValue
     */
    function value($value, ...$args)
    {
        return $value instanceof Closure ? $value(...$args) : $value;
    }
}

if (!function_exists('with')) {
    /**
     * Return the given value, optionally passed through the given callback.
     *
     * @template TValue
     * @template TReturn
     *
     * @param TValue                             $value
     * @param (callable(TValue): (TReturn))|null $callback
     *
     * @return ($callback is null ? TValue : TReturn)
     */
    function with($value, ?callable $callback = null)
    {
        return is_null($callback) ? $value : $callback($value);
    }
}
