<?php

declare(strict_types = 1);

namespace example_app;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Laminas\Diactoros\Response\HtmlResponse;

/**
 * Simple response factory to generate error responses
 */
class ResponseFactory implements ResponseFactoryInterface
{
    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface
    {
        return new HtmlResponse("Custom error response $code: $reasonPhrase", $code);
    }
}
