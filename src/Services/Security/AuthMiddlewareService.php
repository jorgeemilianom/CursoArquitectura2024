<?php
declare(strict_types=1);

namespace Core\Services\Security;

use Core\Contracts\Interface\IMiddleware;
use Core\Services\RequestService;

final class AuthMiddlewareService implements IMiddleware
{
    public function run($callback): void
    {
        $this->validateLogin();
    }

    public function validateLogin()
    {
        RequestService::request('/Login', function () {
            if(!isset($_SESSION['User'])) header('Location: /Login');
        });

        RequestService::request('/Login', function () {
            if(isset($_POST['user'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                session_start();
                $_SESSION['User'] = $user;
                var_dump([$user, $password]);die;
            }
            
            header('Location: /');
        });
    }
}