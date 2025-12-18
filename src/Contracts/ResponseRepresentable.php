<?php

namespace Nacosvel\Support\Contracts;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Represents an object that can be converted into an HTTP response.
 *
 * This interface is useful for objects that need to return a full HTTP response
 * based on the given request context, such as controllers, API resources, or view models.
 */
interface ResponseRepresentable
{
    /**
     * Convert the object into an HTTP response.
     *
     * @param Request|RequestInterface|null $request The current HTTP request context.
     *
     * @return Response|ResponseInterface The corresponding HTTP response object.
     */
    public function toResponse(RequestInterface|Request $request = null): ResponseInterface|Response;
}
