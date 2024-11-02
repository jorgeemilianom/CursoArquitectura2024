<?php
declare(strict_types=1);

class ThemeImportService
{
    const HEAD = './src/Theme/Layout/Head.html.php';
    const BODY = './src/Theme/Layout/Body.html.php';
    const FOOTER = './src/Theme/Layout/Footer.html.php';
    const NAV = './src/Theme/Layout/Nav.html.php';


    public function ImportHead()
    {
        require_once self::HEAD;
    }

    public function ImportBody()
    {
        require_once self::BODY;
    }

    public function ImportNav()
    {
        require_once self::NAV;
    }

    public function ImportFooter()
    {
        require_once self::FOOTER;
    }
}