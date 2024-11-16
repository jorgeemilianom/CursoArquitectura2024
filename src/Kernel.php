<?php
declare(strict_types= 1);

namespace Core;

use Core\Controllers\FrontController;

final class Kernel
{
    public function __construct() {
        $this->ImportDepenencies();

        # Run the application
        $this->RunApplication();
    }

    public function RunApplication(): void 
    {
        $FrontController = new FrontController();
    }

    public function ImportDepenencies(): void
    {
        # Config
        require './src/Configuration/defines.php';
        require './src/Configuration/functions.php';

    }

}