<?php
declare(strict_types= 1);

namespace Core\Services\Storage;

use Core\Contracts\Abstract\StorageAbstract;
use Core\Contracts\Interface\IStorage;

final class SQLiteService extends StorageAbstract implements IStorage
{
    public function __construct(string $name_db)
    {
        try {
            $this->connectionManager = new \SQLite3($name_db);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function query(string $query): array
    {
        try {
            $response = $this->connectionManager->query($query);

            $dataResponse = [];
            while ($response && ($row = $response->fetchArray(SQLITE3_ASSOC))){
                $dataResponse[] = $row;
            }
            return $dataResponse;
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function insert(string $query)
    {
        $this->connectionManager->exec($query);
    }

    public function create(string $query)
    {
        $this->connectionManager->exec($query);
    }
}