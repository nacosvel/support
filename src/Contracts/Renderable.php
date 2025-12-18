<?php

namespace Nacosvel\Support\Contracts;

/**
 * Represents an object that can be rendered into a specific output format.
 * Classes implementing this interface must provide a `render` method that
 * generates the desired representation of the object.
 */
interface Renderable
{
    /**
     * Render the object into a specific output.
     *
     * This method should return a representation of the object,
     * which could be a string, HTML, JSON, or any other format
     * depending on the implementation context.
     *
     * @return mixed The rendered output of the object.
     */
    public function render();
}
