<?php

namespace App\Model\Core;

class Validator
{
    /**
     * Dependency container provided by Slim
     * @var \Slim\Container
     */
    protected $container;

    /**
     * Generated errors
     * @var array
     */
    private $errors = array();

    /**
     * Save dependency container
     * @param \Slim\App $app slim application
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function addError($message)
    {
        $this->errors[] = $message;
    }

    public function error()
    {
        return (boolean) count($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
