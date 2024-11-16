<?php
declare(strict_types= 1);

namespace Core\Entities;

use Core\Repositories\LoginRepository;
use Core\Services\Storage\ContextService;

final class LoginPageEntity extends LoginRepository
{
    public function __construct() {

        # Setear un Titulo
        $Context = ContextService::getContext();
        $Context->set('Home:Title:h1', 'Hola Bienvenidos al curso');
        $Context->set('Home:Title:h2', 'Esto es un ejemplo de desarrollo de producto');

    }

    public function viewFront()
    {
        ViewPage('Login');
    } 
}
