<?php
declare(strict_types=1);


function ViewPage(string $importPage)
{
    include  "./src/Theme/Pages/$importPage.html.php";
}

function getRoutes($html, $vars): string
{
    $patron = '/\{\{(\w+)\}\}/';

    $htmlResultante = preg_replace_callback($patron, function ($matches) use($vars) {
        $variable = $matches[1];
        return isset($vars[$variable]) ? $vars[$variable] : '---------';
        // $vars['title'];
    }, $html);

    return $htmlResultante;
}