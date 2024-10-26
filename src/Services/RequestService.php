<?php
declare(strict_types= 1);

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