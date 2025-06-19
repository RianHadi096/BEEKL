<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find($session->get('id'));

        $data = [
            'user' => $user,
            // You can add other data needed by the view here
        ];

        return view('dashboard_profile', $data);
    }
}
