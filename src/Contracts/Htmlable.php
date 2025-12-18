<?php

namespace Nacosvel\Support\Contracts;

interface Htmlable
{
    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    #[TentativeType]
    public function toHtml(): string;
}
