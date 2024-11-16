<?php
declare(strict_types=1);

namespace Core\Contracts\Interface;

interface IController
{
    public function run(): void;
}