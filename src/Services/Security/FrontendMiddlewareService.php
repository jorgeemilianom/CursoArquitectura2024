<?php
declare(strict_types=1);

namespace Core\Services\Security;

use Core\Contracts\Interface\IMiddleware;

final class FrontendMiddlewareService implements IMiddleware
{
    public function run($callback): void
    {
        return;
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Su cuenta se suspenderá por falta de pago. Contacte con administracion
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
}