<?php
declare(strict_types= 1);

namespace Core;

use Core\Controllers\BackendController;
use Core\Controllers\FrontController;
use Core\Services\Security\AuthMiddlewareService;
use Core\Services\Security\BackendMiddlewareService;
use Core\Services\Security\ExceptionMiddlewareService;
use Dotenv\Dotenv;

final class Kernel
{
    public function __construct() {
        $this->ImportDepenencies();
        $ExceptionMiddlewareService = new ExceptionMiddlewareService();
        $ExceptionMiddlewareService->run(function () { 
            # Import environments
            $this->getDotenv();
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

    private function getDotenv(): void
    {
        $loadCustomDefines = './.env';
        if (file_exists($loadCustomDefines)) {
            $dotenv = Dotenv::createImmutable('./');
            $dotenv->load();
        }
    }

}


