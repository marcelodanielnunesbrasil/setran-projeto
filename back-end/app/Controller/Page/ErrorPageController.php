<?php

namespace App\Controller\Page;
class ErrorPageController extends MasterUnloggedPageController
{
    /**
     * Dependency container provided by Slim
     * @var \Slim\Container
     */
    protected $container;
    /**
     * Save dependency container
     * @param \Slim\App $app slim application
     */
    public function __construct($container)
    {
        $this->container = $container;
    }
    /**
     * Error routes
     * @param  \Psr\Http\Message\ServerRequestInterface $request   PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response  PSR7 response
     * @param  array                                    $args      Route parameters
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index($request, $response, $args)
    {
        parent::index($request, $response, $args);
        $viewData = parent::getViewData();
        return $this->container->twig->render($response, "errors/{$args['type']}.html.twig", $viewData);
    }
}