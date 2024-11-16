<?php
declare(strict_types= 1);

namespace Core\Services;

use Core\Services\ThemeImportService;

final readonly class RequestService
{

    public static function request(string $path, $callback): void
    {
        if($_SERVER['REQUEST_URI'] == $path) {
            $Theme = new ThemeImportService();
            $Theme->ImportHead();
            $Theme->ImportNav();
            $Theme->ImportBody();
            $callback();
            $Theme->ImportFooter();
            die;
        }
    }

}