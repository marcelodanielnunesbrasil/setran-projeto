<?php

namespace App\Controller\Page;

abstract class MasterUnloggedPageController
{
    /**
     * View data elements
     * @var array
     */
    private $viewData = [];

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
