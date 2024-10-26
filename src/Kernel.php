<?php
declare(strict_types= 1);

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

        # Services
        require './src/Services/RequestService.php';
        require './src/Services/ThemeImportService.php';

        # Controllers
        require './src/Controllers/FrontController.php';
    }

}