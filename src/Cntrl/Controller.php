<?php

declare(strict_types = 1);

namespace example_app\Cntrl;

use example_app\Annotations\Scream;
use inroutephp\inroute\Annotations\GET;
use inroutephp\inroute\Annotations\Pipe;
use inroutephp\inroute\Runtime\EnvironmentInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Controller
{
    /**
     * @GET(path="/foo/{name}", name="foo")
     * @Pipe(middlewares={"ScreamMiddleware"})
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
