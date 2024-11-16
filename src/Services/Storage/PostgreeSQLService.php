<?php
declare(strict_types= 1);

namespace Core\Services\Storage;

use Core\Contracts\Abstract\StorageAbstract;
use Core\Contracts\Interface\IStorage;
use PDO;

final class PostgreeSQLService extends StorageAbstract implements IStorage
{
    public function __construct() {
        $host = 'localhost';
        $dbName = 'curso';
        $user = 'root';
        $password = '';

        $dsn = "postgree:host=$host;dbname=$dbName";

        $connection = new PDO($dsn, $user, $password);
        $this->connectionManager = $connection;
    }

    public function query(string $query): array
    {
        $prevDato = $this->connectionManager->query($query);

        $arrayData = [];

        foreach ($prevDato as $row) {
            $arrayData[] = $row;
        }

        return $arrayData;
    }
    
}