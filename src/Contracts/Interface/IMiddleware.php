<?php
declare(strict_types=1);

namespace Core\Contracts\Interface;

interface IMiddleware
{
    public function run($callback): void;
}