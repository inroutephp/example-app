<?php

declare(strict_types = 1);

namespace inroutephp\example\Controller;

use inroutephp\example\Annotations\Scream;
use inroutephp\inroute\Annotation\Route;
use inroutephp\inroute\Runtime\EnvironmentInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Controller
{
    /**
     * @Route(
     *     path="/foo/{name}",
     *     method="GET",
     *     name="foobar",
     *     attributes={
     *         "scream": true
     *     }
     * )
     * @Scream
     */
    public function foo(ServerRequestInterface $request, EnvironmentInterface $env): ResponseInterface
    {
        $response = new \Zend\Diactoros\Response();

        $response->getBody()->write(
            $request->getAttribute('name')
            . ' '
            . $env->getUrlGenerator()->generateUrl('foobar', ['name' => 'baz'])
            . "\n"
        );

        return $response;
    }
}
