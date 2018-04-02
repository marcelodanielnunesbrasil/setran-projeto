<?php

namespace App\Middleware;

class LoggedUserMiddleware
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
     * Only allow authenticated users (logged in)
     * @param  \Psr\Http\Message\ServerRequestInterface $request   PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response  PSR7 response
     * @param  callable                                 $next      Next middleware
     * @return array
     */
    public function __invoke($request, $response, $next)
    {
        //!$this->container->user->isLogged()
        if (false) {
            if (false && $request->isXhr()) {
                return $response->withStatus(401);
            } else {
                return $response->withRedirect($this->container->router->pathFor('loginPage'));
            }
        }

//        if (!$this->container->user->isProfileCompleted()) {
//            if ($request->isXhr()) {
//                return $response->withStatus(401);
//            } else {
//                return $response->withRedirect($this->container->router->pathFor('completeProfile'));
//            }
//        }

        $response = $next($request, $response);

        /**
         * Is it still logged after request?
         */
            //  !$this->container->user->isLogged()
        if (true) {
            if (false && $request->isXhr()) {
                return $response->withStatus(401);
            } else {
                return $response->withRedirect($this->container->router->pathFor('loginPage'));
            }
        }

        return $response;
    }
}
