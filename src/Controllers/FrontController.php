<?php
declare(strict_types= 1);

namespace Core\Controllers;

use Core\Contracts\Interface\IController;
use Core\Services\RequestService;

class FrontController implements IController
{
    public function __construct()
    {
        
    }

    public function run(): void
    {
        RequestService::request('/', function () {
            ViewPage('Home');
        });

        RequestService::request('/Products', function () {
            echo 'Welcome 2';die;
        });

        
        echo 'Page Not Found';die;
    }


}