<?php
declare(strict_types=1);


function ViewPage(string $importPage)
{
    include  "./src/Theme/Pages/$importPage.html.php";
}