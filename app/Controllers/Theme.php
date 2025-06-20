<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Theme extends Controller
{
    public function set()
    {
        // Ambil JSON payload dari AJAX
        $data = $this->request->getJSON();
        if (isset($data->theme)) {
            // Simpan pilihan theme ke session
            session()->set('theme', $data->theme);
            return $this->response->setJSON(['status' => 'ok']);
        }
        return $this->response->setJSON(['status' => 'fail']);
    }
}
