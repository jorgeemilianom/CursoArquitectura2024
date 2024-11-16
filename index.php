<?php
declare(strict_types=1);
require './vendor/autoload.php';

use Core\Kernel;
use Core\Services\Storage\ContextService;

$Context = new ContextService();
$Kernel = new Kernel();