<?php

namespace App\Controller\Page;


class MasterLoggedPageController
{
    /**
     * Dependency container provided by Slim
     * @var \Slim\Container
     */
    protected $container;

    /**
     * View data elements
     * @var array
     */
    private $viewData = [];


    /**
     * Save dependency container
     * @param \Slim\App $app slim application
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Get view data
     * @return array view data elements
     */
    protected function getViewData()
    {
        return $this->viewData;
    }

    /**
     * Set the master page view data
     * @param  \Psr\Http\Message\ServerRequestInterface $request   PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response  PSR7 response
     * @param  array                                    $args      Route parameters
     * @return void
     */
    protected function index($request, $response, $args)
    {

    }


}
