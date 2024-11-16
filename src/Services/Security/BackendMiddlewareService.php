<?php
declare(strict_types=1);

namespace Core\Services\Security;

use Core\Contracts\Interface\IMiddleware;

final class BackendMiddlewareService implements IMiddleware
{
    public function run($callback): void
    {
        # Logica del middleware
        $this->runMiddleware();
        
        $callback();
    }

    public function runMiddleware()
    {

    }
}