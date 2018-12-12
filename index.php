<?php

declare(strict_types = 1);

namespace inroutephp\example;

require "vendor/autoload.php";

use mindplay\middleman\Dispatcher;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

$router = new HttpRouter;

#$container = ...;

#$router->setContainer($container);

$request = ServerRequestFactory::fromGlobals();

$response = (new Dispatcher([$router]))->dispatch($request);

(new SapiEmitter)->emit($response);
