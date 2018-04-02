<?php

namespace App\Controller\Page;

use App\Helper\Crypto;
use App\Model\Noticia;

class MainPageController extends MasterUnloggedPageController
{
    /**
     * Dependency container provided by Slim
     * @var \Slim\Container
     */
    protected $container;

    /**
     * Recebe um objeto da Classe App\Model\Noticia.php
    */
    private $noticia;

    /**
     * Save dependency container
     * @param \Slim\App $app slim application
     */
    public function __construct($container)
    {
        $this->container = $container;
        $this->noticia   = new Noticia($container);
    }

    /**
     * Main page route
     * @param  \Psr\Http\Message\ServerRequestInterface $request   PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response  PSR7 response
     * @param  array                                    $args      Route parameters
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function index($request, $response, $args)
    {
        parent::index($request, $response, $args);
        $viewData = parent::getViewData();


        /*
         * URL de teste
         * http://setran.localhost/noticias/auth/Y2hLa0VCT0N5MkRNZXpkYzBrSy92aWs9/all
         * Gera meu token de exemplo para acesso ao servico
         *      echo Crypto::md5_encrypt('marcelodaniel', '3sj8v24');
        */

        /**
         * Recebe os valores de retorno
        */
        $arr = array();

        /**
         * Verificação básica de token
         * Logicamente não será assim, sera feito com banco de dados para gerar um token unico de usuario
        */
        if ($args['TOKEN_USER'] == "Y2hLa0VCT0N5MkRNZXpkYzBrSy92aWs9"){
            /**
             * Retorna um Object da Model Noticia
            */
            $arr = $this->noticia->getAllNoticias();
        }else{
            /**
             * Se caso o usuario nao tive token não tem acesso as noticias
             * Logico que essas validacao teria que ser feita na camada de Middlewares pois seria feita
             * uma vez para todas as requisições
             */
            $arr = array('auth', 'false');
        }
        return $response->withJson($arr);
    }
}
