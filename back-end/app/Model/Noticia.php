<?php

namespace App\Model;

class Noticia
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


    public function getAllNoticias()
    {
        /**
         * Faz a consulta na base de dados
         * Table noticia
         * @return Object
        */
        $db = $this->container->db->prepare('SELECT * FROM noticia');
        $db->execute();
        return $db->fetchAll();
    }
}
