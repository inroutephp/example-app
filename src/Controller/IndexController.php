<?php

declare(strict_types = 1);

namespace inroutephp\example\Controller;

use inroutephp\inroute\Annotation\Route;
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
