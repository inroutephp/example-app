<?php

declare(strict_types = 1);

namespace example_app\Http;

use inroutephp\inroute\Annotations\GET;
use inroutephp\inroute\Runtime\EnvironmentInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Laminas\Diactoros\Response\HtmlResponse;

class Index
{
    /**
     * @GET(path="/", name="index")
     */
    public function index(ServerRequestInterface $request, EnvironmentInterface $env): ResponseInterface
    {
        // The UrlGenerator is used to generate paths from route names
        $generator = $env->getUrlGenerator();

        return new HtmlResponse(<<<END_HTML
<h1>example-app</h1>
<ul>
    <li>
        <a href="{$generator->generateUrl('index')}">This index page</a><br>
    </li>
    <li>
        <a href="{$generator->generateUrl('login')}">Login example (username:foo, password:bar)</a>
    </li>
    <li>
        <a href="{$generator->generateUrl('form')}">Form example</a>
    </li>
    <li>
        <a href="/does-not-exist">Link to a resource that does not exist</a>
    </li>
</ul>
END_HTML
);
    }
}
