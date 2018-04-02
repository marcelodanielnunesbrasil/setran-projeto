<?php

/**
 * @Class Pendente
 */

namespace App\Helper;

class Session{

    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
        if (!isset($_SESSION))
            session_start();
    }

    public static function setFlash($message, $type = 'success')
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type' => $type
        );
    }

    public static function setFlashArray($flashArray)
    {
     $i = 0;
        foreach ($flashArray as $flash)
        {
            $_SESSION['flash'][$i] = array(
                'message'=> $flash['message'],
                'type' => $flash['type']
            );
            $i++;
        }
    }

    public static function getFlash()
    {
        if(isset($_SESSION['flash']['message'])) {
            $html = "<div class='alert alert-".$_SESSION['flash']['type']." alert-dismissable'><a href='javascript:void(0);' onclick='this.parentNode.parentNode.removeChild(this.parentNode);' style='position: absolute; right: 10px;text-decoration: none;color: gray;font-size: 18px;font-weight: 800;' class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a><p>".$_SESSION['flash']['message'].'</p></div>';
            $_SESSION['flash'] = array();
            return $html;
        }
    }
}