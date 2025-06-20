<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Database\Config;

class CheckMigration extends Controller
{
    public function index()
    {
        $db = Config::connect();
        $fields = $db->getFieldData('users');
        $columns = [];
        foreach ($fields as $field) {
            $columns[] = $field->name;
        }
        return $this->response->setJSON($columns);
    }
}
