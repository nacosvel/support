<?php

namespace Nacosvel\Support\Contracts;

interface Renderable
{
    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    #[TentativeType]
    public function render(): string;
}
