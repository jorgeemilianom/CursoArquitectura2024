<?php
declare(strict_types= 1);

namespace Core\Services\Storage;

use Core\Contracts\Abstract\StorageAbstract;
use Core\Contracts\Interface\IStorage;
use Exception;
use mysqli;
use Throwable;

final class MySQLService extends StorageAbstract implements IStorage
{
    public function __construct()
    {
        try {

            $connection = new mysqli('localhost', 'root', '', 'curso');
            if ($connection->connect_error)
                throw new Exception('Could not connect to database.');

            $this->connectionManager = $connection;
        } catch (Throwable $th) {
            
        }
    }

    public function query(string $query): array
    {
        try {
            $response = mysqli_query($this->connectionManager, $query);

            if(!$response) return [];

            return $response ? $response->fetch_all(MYSQLI_ASSOC) : [];
        } catch (Throwable $th) {
            return [];
        }
    }
}