<?php

declare(strict_types = 1);

namespace example_app;

use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Stream;

/**
 * PSR-15 middleware that converts response body to upper case
 */
class ScreamMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = $handler->handle($request);

        $upper = new Stream('php://memory', 'rw');

        $upper->write(strtoupper((string)$response->getBody()));

        return $response->withBody($upper);
    }
}
