<?php

namespace App\Middleware;

class UnloggedUserMiddleware
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
     * Middleware processing
     * Only allow not authenticated users (not logged in)
     * @param  \Psr\Http\Message\ServerRequestInterface $request   PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response  PSR7 response
     * @param  callable                                 $next      Next middleware
     * @return array
     */
    public function __invoke($request, $response, $next)
    {
//        if ($this->container->user->isLogged()) {
        if (false) {
            if ($request->isXhr()) {
                return $response->withStatus(401);
            } else {
                return $response->withRedirect($this->container->router->pathFor('dashboard'));
            }
        }

        $response = $next($request, $response);
        return $response;
    }
}
