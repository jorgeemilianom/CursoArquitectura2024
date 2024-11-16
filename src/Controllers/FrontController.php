<?php
declare(strict_types= 1);

namespace Core\Controllers;

use Core\Services\RequestService;
use Core\Services\Storage\ContextService;

class FrontController
{
    public function __construct() {
        
        RequestService::request('/', function () {
            $Context = ContextService::getContext();
            $Context->setData('Title', 'Hola Bienvenidos al curso!');
            ViewPage('Home');
        });

        RequestService::request('/Products', function () {
            echo 'Welcome 2';die;
        });

        
        echo 'Page Not Found';die;
    }
}