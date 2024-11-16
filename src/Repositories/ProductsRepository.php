<?php
declare(strict_types = 1);

namespace Core\Repositories;

use Core\Services\Storage\MySQLPDOService;

abstract class ProductsRepository 
{
    public function getUsers(): array
    {
        $DB = new MySQLPDOService();
        $data = $DB->query("SELECT * FROM users");

        return $data;
    }
}