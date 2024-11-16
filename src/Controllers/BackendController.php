<?php
declare(strict_types= 1);

namespace Core\Controllers;

use Core\Contracts\Interface\IController;

class BackendController implements IController
{

    public function run(): void
    {
        // $db = new SQLiteService('./users.db');
        // // $db->create();
        // // $db->insert();
        // $data = $db->query("SELECT * FROM users");

        // dd($data);
    }
}