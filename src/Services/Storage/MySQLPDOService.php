<?php
declare(strict_types= 1);

namespace Core\Services\Storage;

use Core\Contracts\Abstract\StorageAbstract;
use Core\Contracts\Interface\IStorage;
use PDO;

final class MySQLPDOService extends StorageAbstract implements IStorage
{
    public function __construct() {
        $db_host = $_ENV['DB_HOST'];
        $db_user = $_ENV['DB_USER'];
        $db_name = $_ENV['DB_NAME'];
        $db_password = $_ENV['DB_PASSWORD'];

        $dsn = "mysql:host=$db_host;dbname=$db_name";

        $connection = new PDO($dsn, $db_user, $db_password);
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