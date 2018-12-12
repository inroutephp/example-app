<?php

declare(strict_types = 1);

namespace inroutephp\example;

use inroutephp\example\Annotations\Scream;
use inroutephp\inroute\Compiler\CompilerPassInterface;
use inroutephp\inroute\Runtime\RouteInterface;

class ScreamCompilerPass implements CompilerPassInterface
{
    public function processRoute(RouteInterface $route): RouteInterface
    {
        if ($route->hasAnnotation(Scream::CLASS)) {
            return $route->withMiddleware(ScreamMiddleware::CLASS);
        }

        return $route;
    }
}
