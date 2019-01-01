<?php

declare(strict_types = 1);

namespace example_app\Cntrl;

use inroutephp\inroute\Annotations\BasePath;
use inroutephp\inroute\Annotations\GET;
use inroutephp\inroute\Annotations\POST;
use inroutephp\inroute\Runtime\EnvironmentInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;

/**
 * @BasePath(path="/form")
 */
class Form
{
    /**
     * @GET(name="form")
     */
    public function get(ServerRequestInterface $request, EnvironmentInterface $env): ResponseInterface
    {
        // Display a form requesting user name
        return new HtmlResponse(<<<END_HTML
Enter name and submit form:
<form method="POST" action="{$env->getUrlGenerator()->generateUrl('form')}">
    <input name="name" type="text">
    <input type="submit" value="Login">
</form>
END_HTML
);
    }

    /**
     * @POST
     */
    public function post(ServerRequestInterface $request, EnvironmentInterface $env): ResponseInterface
    {
        // Grab the posted name and display it
        return new HtmlResponse($request->getParsedBody()['name']);
    }
}
