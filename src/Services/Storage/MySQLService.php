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
            $db_host = $_ENV['DB_HOST'];
            $db_user = $_ENV['DB_USER'];
            $db_name = $_ENV['DB_NAME'];
            $db_password = $_ENV['DB_PASSWORD'];

            $connection = new mysqli($db_host, $db_user, $db_password, $db_name);
            if ($connection->connect_error)
                throw new Exception('Could not connect to database.');

            $this->connectionManager = $connection;
        } catch (Throwable $th) {
            var_dump($th);die;
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