<?php
declare(strict_types= 1);

namespace Core;

use Core\Controllers\BackendController;
use Core\Controllers\FrontController;
use Core\Services\Security\AuthMiddlewareService;
use Core\Services\Security\BackendMiddlewareService;
use Core\Services\Security\ExceptionMiddlewareService;

final class Kernel
{
    public function __construct() {
        $this->ImportDepenencies();
        $ExceptionMiddlewareService = new ExceptionMiddlewareService();
        $ExceptionMiddlewareService->run(function () { 
            # Run the application
            $this->RunApplication(); 
        });
        
    }

    public function RunApplication(): void 
    {
        try {
            $Middleware = new BackendMiddlewareService();
            $Middleware->run(function () {
                $auth = new AuthMiddlewareService();
                $BackendController = new BackendController();
                $FrontController = new FrontController();

                $auth->run(function () {});
                $BackendController->run();
                $FrontController->run();
            });
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function ImportDepenencies(): void
    {
        # Config
        require './src/Configuration/defines.php';
        require './src/Configuration/functions.php';
        
    }

}


