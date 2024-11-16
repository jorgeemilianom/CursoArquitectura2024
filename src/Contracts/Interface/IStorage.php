<?php
declare(strict_types=1);

namespace Core\Contracts\Interface;

interface IStorage
{
    
    public function query(string $query);
}