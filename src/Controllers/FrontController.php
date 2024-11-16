<?php
declare(strict_types= 1);

namespace Core\Controllers;

use Core\Contracts\Interface\IController;
use Core\Entities\HomePageEntity;
use Core\Entities\LoginPageEntity;
use Core\Services\RequestService;

class FrontController implements IController
{
    public function __construct()
    {
        
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

        
        echo 'Page Not Found';die;
    }


}