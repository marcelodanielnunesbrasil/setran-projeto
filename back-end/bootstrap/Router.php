<?php
/**
 * Classe que define as rotas de acesso para os serviços
*/
namespace Bootstrap;

use App\Controller\Page\MainPageController;
use App\Middleware\UnloggedUserMiddleware;

class Router
{
    /**
     * Slim application
     * @var \Slim\App
     */
    private $app;

    /**
     * Save \Slim\App instance
     * @param \Slim\App $app slim application
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Register routes
     * @return void
     */
    public function registerRoutes()
    {
        $this->registerRoutesForUnloggedUsers();
        $this->registerRoutesForLoggedUsers();
    }

    private function registerRoutesForUnloggedUsers()
    {
        /**
         * Essa rota é para tratar varios tipos de error
         */
        $this->app->get('/erro/{type}', ErrorPageController::class . ':index')->setName('error')
        ->add(UnloggedUserMiddleware::class);
    }

    private function registerRoutesForLoggedUsers()
    {
        /**
         * Rota de Exemplo
         * @method GET
         * @response Json
        */
        $this->app->group('/noticias', function(){
            $this->get('/auth/{TOKEN_USER}/all', MainPageController::class . ':index')->setName('mainPage')->add(UnloggedUserMiddleware::class);
        });
    }

    private function registerAjaxRoutes()
    {

    }
}
