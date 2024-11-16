<?php
declare(strict_types=1);

namespace Core\Services\Security;

use Core\Contracts\Interface\IMiddleware;

final class AuthMiddlewareService implements IMiddleware
{
    public function run($callback): void
    {
        if(isset($_POST['user'])) {
            $user = $_POST['user'];
            $password = $_POST['password'];

            var_dump([$user, $password]);die;
        }
    }
}