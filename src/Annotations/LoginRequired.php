<?php

declare(strict_types = 1);

namespace example_app\Annotations;

use inroutephp\inroute\Annotations\Pipe;
use Middlewares\BasicAuthentication;

/**
 * Doctrine route annotation denoting that an user must be logged in
 *
 * @Annotation
 */
class LoginRequired extends Pipe
{
    /**
     * BasicAuthentication middleware adds http authentication
     */
    public $middlewares = [BasicAuthentication::CLASS];
}
