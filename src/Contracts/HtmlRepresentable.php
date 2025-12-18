<?php

namespace Nacosvel\Support\Contracts;

/**
 * Represents an object that can be converted to an HTML string.
 */
interface HtmlRepresentable
{
    /**
     * Convert the object into an HTML representation.
     *
     * @return string The HTML string representation of the object.
     */
    public function toHtml(): string;
}
