<?php
declare(strict_types=1);

namespace Core\Services\Security;

use Core\Contracts\Interface\IMiddleware;

final class ExceptionMiddlewareService implements IMiddleware
{
    public function run($callback): void
    {
        try {
            $callback();
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
            // dd($th->getTrace(), true);
            // echo "<h1>Estamos en mantenimiento";die;
        }
    }
}