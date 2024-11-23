<?php
declare(strict_types= 1);

namespace Core\Controllers;

use Core\Contracts\Interface\IController;
use Core\Entities\HomePageEntity;
use Core\Entities\LoginPageEntity;
use Core\Services\RequestService;
use Core\Services\Storage\ContextService;

class FrontController implements IController
{
    private $Context;
    public function __construct()
    {
        $this->Context = ContextService::getContext();
    }

    public function run(): void
    {
        RequestService::request('/', function () {
            $page = new HomePageEntity();
            $page->viewFront();
        });

        RequestService::request('/Products', function () {
            echo 'Welcome 2';die;
        });
        
        RequestService::request('/Login', function () {
            $page = new LoginPageEntity();
            $page->viewFront();
        });

        RequestService::request('/logout', function () {
            $this->Context->set('Sesssion:is_login', false);
            session_destroy();
            header('Location: /Login');
        }, false);

        
        echo 'Page Not Found';die;
    }


}