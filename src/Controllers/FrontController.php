<?php
declare(strict_types= 1);

class FrontController
{
    public function __construct() {
        
        RequestService::request('/', function () {
            ViewPage('Home');
        });

        RequestService::request('/Products', function () {
            echo 'Welcome 2';die;
        });

        
        echo 'Page Not Found';die;
    }
}