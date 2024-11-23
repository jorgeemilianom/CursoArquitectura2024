<?php
declare(strict_types=1);

namespace Core\Services\Security;

use Core\Contracts\Interface\IMiddleware;
use Core\Services\RequestService;
use Core\Services\Storage\ContextService;

final class AuthMiddlewareService implements IMiddleware
{
    public function run($callback): void
    {
        session_start();
        $this->validateLogin();
    }

    public function validateLogin()
    {
        
        RequestService::request('/Login', function () {
            $Context = ContextService::getContext();
            if(isset($_POST['user'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $_SESSION['User'] = $user;

                $Context->set('Sesssion:is_login', true);
            } else {
                $Context->set('Sesssion:is_login', isset($_SESSION['User']));

            }
        }, false);
    }
}