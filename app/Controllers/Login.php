<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    } 
 
    public function auth()
    {
        //start session
        $session = session();
        //get variables from the form login
        $user = $this->request->getPost('login_email_username');
        $password = $this->request->getPost('login_password');
        //get the user from the database
        $userModel = new UserModel();
        $data = $userModel->where('email', $user)->orWhere('name', $user)->first();
        //check if the user exists
        if ($data) {
            //check if the password is correct
            if (password_verify($password, $data['password'])) {
                //set session data
                $session->set('id', $data['id']);
                $session->set('name', $data['name']);
                $session->set('email', $data['email']);
                //set login true
                $session->set('isLoggedIn', true);
                return redirect()->to('/')->with('success', 'Login Successfully');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->back()->with('error', 'Wrong Password');
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found or Email not Found');
            return redirect()->back()->with('error', 'User Not Found');
        }

    }
}
