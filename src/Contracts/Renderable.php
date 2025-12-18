<?php

namespace Nacosvel\Support\Contracts;

/**
 * Represents an object that can be rendered as a string.
 */
interface Renderable
{
    /**
     * Render the object as a string.
     *
     * @return string The rendered string output of the object.
     */
    public function render(): string;
}
