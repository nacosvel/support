<?php

namespace Nacosvel\Support\Concerns;

use Nacosvel\Support\Contracts\ArrayRepresentable;
use Nacosvel\Support\Contracts\HtmlRepresentable;
use Nacosvel\Support\Contracts\JsonRepresentable;
use Nacosvel\Support\Contracts\ResponseRepresentable;
use Nacosvel\Support\Contracts\StringRepresentable;

trait HasRenderable
{
    /**
     * @inheritdoc
     * @return string
     */
    public function render(): string
    {
        return match (true) {
            $this instanceof HtmlRepresentable => $this->toHtml(),
            $this instanceof JsonRepresentable => $this->toJson(),
            $this instanceof StringRepresentable => $this->toString(),
            $this instanceof ArrayRepresentable => json_encode($this->toArray()),
            $this instanceof ResponseRepresentable => $this->toResponse()->getContent() ?: '',
            default => '',
        };
    }
}
