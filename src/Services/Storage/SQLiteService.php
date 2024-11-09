<?php
declare(strict_types= 1);


final class SQLiteService
{
    private $connection;

    public function __construct(string $name_db)
    {
        try {
            $this->db = new \SQLite3($name_db);
            
        } catch (\Throwable $th) {
            throw;
        }
    }

    public function query(string $query): array
    {
        try {
            $response = $this->db->query($query);

            $dataResponse = [];
            while ($response && ($row = $response->fetchArray(SQLITE3_ASSOC))){
                $dataResponse[] = $row;
            }
            return $dataResponse;
        } catch (\Throwable $th) {
            return [];
        }
    }
}