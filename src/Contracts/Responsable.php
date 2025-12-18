<?php

namespace Nacosvel\Support\Contracts;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface Responsable
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param Request $request
     *
     * @return Response
     */
    #[TentativeType]
    public function toResponse(Request $request): Response;
}
