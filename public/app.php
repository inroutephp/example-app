<?php
/**
 * Main application entry point
 *
 * This file handles appl setup, dispatch and sends response to client
 */
declare(strict_types = 1);

namespace example_app;

use inroutephp\inroute\Runtime\Middleware\Pipeline;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;

// Include the composer autoloader
require __DIR__ . "/../vendor/autoload.php";

// Create instance of the compiled router
$router = new HttpRouter;

// Inject psr-11 container to resolve runtime dependencies
$router->setContainer(new Container);

// Create a request object using zend diactoros (any psr-7 implementation will do)
$request = ServerRequestFactory::fromGlobals();

// Create a middleware pipeline for the entire application (any psr-15 compliant
// dispatcher will do). Add more application level middlewares here
$pipeline = new Pipeline($router);

// Dispatch application and get a psr-7 response object
$response = $pipeline->handle($request);

// Send response to client using zend httphandlerunner
(new SapiEmitter)->emit($response);
