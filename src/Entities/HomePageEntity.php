<?php
declare(strict_types= 1);

namespace Core\Entities;

use Core\Repositories\HomeRepository;
use Core\Services\Storage\ContextService;

final class HomePageEntity extends HomeRepository
{
    public function __construct() {

        $this->validateFormLogin();

        # Setear un Titulo
        $Context = ContextService::getContext();
        $Context->set('Home:Title:h1', 'Hola Bienvenidos al curso');
        $Context->set('Home:Title:h2', 'Esto es un ejemplo de desarrollo de producto');
        $Context->set('Home:Title:message_email', 'Ingrese su correo');

    }

    private function validateFormLogin()
    {
        
    } 

    public function viewFront()
    {
        ViewPage('Home');
    } 
}
