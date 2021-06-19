<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PreflightController
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        // Do nothing here. Just return the response.
        return $response;
    }
}
