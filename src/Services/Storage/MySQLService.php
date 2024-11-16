<?php
declare(strict_types= 1);

namespace Core\Services\Storage;

use Exception;
use mysqli;

final class MySQLService
{
    private $connection;

    public function __construct()
    {
        try {

            $connection = new mysqli('localhost', 'root', '', 'curso');
            if ($connection->connect_error)
                throw new Exception('Could not connect to database.');

            $this->connection = $connection;
        } catch (\Throwable $th) {
            
        }
    }

    public function query(string $query): array
    {
        try {
            $response = mysqli_query($this->connection, $query);

            if(!$response) return [];

            return $response ? $response->fetch_all(MYSQLI_ASSOC) : [];
        } catch (\Throwable $th) {
            return [];
        }
    }
}