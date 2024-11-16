<?php
declare(strict_types= 1);

namespace Core\Entities;

use Core\Repositories\ProductsRepository;
use Core\Services\Storage\ContextService;

final class ProductPageEntity extends ProductsRepository
{
    public function __construct() {
        # Logica    
        $title = 'Hola Bienvenidos al curso';
        # Setear un Titulo
        $Context = ContextService::getContext();
        $Context->set('Product:Title', $title);

        
    }

    public function viewFront()
    {
        ViewPage('Products');
    } 
}
