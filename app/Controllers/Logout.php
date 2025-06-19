<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Logout extends BaseController
{
    public function index()
    {
        //Destroy the session
        session()->destroy();
        return redirect()->to('/home'); 
    }
}
