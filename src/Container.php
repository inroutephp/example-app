<?php

declare(strict_types = 1);

namespace example_app;

use Psr\Container\ContainerInterface;

/**
 * Dead simple container implementation. You may of course use any psr-11
 * compliant container.
 *
 * Container is injected into router in `app.php` and used to resolve dependencies
 * at runtime.
 */
class Container implements ContainerInterface
{
    /** @var array */
    private $services;

    public function __construct()
    {
        $this->services = [
            Cntrl\Index::CLASS => new Cntrl\Index
        ];
    }

    /**
     * Implements Psr\Container\ContainerInterface
     */
    public function get($id)
    {
        if (!$this->has($id)) {
            throw new \Exception("Unable to resolve service $id");
        }

        return $this->services[$id];
    }

    /**
     * Implements Psr\Container\ContainerInterface
     */
    public function has($id)
    {
        return isset($this->services[$id]);
    }
}
