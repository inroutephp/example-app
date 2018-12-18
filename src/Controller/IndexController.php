<?php

declare(strict_types = 1);

namespace example_app\Controller;

use inroutephp\inroute\Annotations\Route;
use inroutephp\inroute\Runtime\EnvironmentInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\TextResponse;

class IndexController
{
    /**
     * @Route(
     *     path="/",
     *     method="GET",
     *     name="index"
     * )
     */
    public function index(ServerRequestInterface $request, EnvironmentInterface $env): ResponseInterface
    {
        return new TextResponse('INDEX');
    }
}
