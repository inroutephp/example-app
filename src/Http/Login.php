<?php

declare(strict_types = 1);

namespace example_app\Http;

use example_app\Annotations\LoginRequired;
use inroutephp\inroute\Annotations\GET;
use inroutephp\inroute\Annotations\Pipe;
use inroutephp\inroute\Runtime\EnvironmentInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response\TextResponse;

class Login
{
    /**
     * @GET(path="/login", name="login")
     * @LoginRequired
     */
    public function login(ServerRequestInterface $request, EnvironmentInterface $env): ResponseInterface
    {
        return new TextResponse("Welcome {$request->getAttribute('username')}!");
    }
}
