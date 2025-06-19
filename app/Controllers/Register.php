<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Register extends BaseController
{
    // Define your encryption key here
    protected $encryptionKey = 'your-secret-key';

    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }
 
    public function save()
    {
        helper(['form']);
        $rules = [
            'regist_name'     => 'required|min_length[3]|max_length[20]',
            'regist_email'    => 'required|valid_email',
            'regist_password' => 'required|min_length[6]',
            'confpassword'    => 'matches[regist_password]'
        ];

        if (!$this->validate($rules)) {
            return view('register', [
                'validation' => $this->validator
            ]);
        }

        $model = new UserModel();
        $email = $this->request->getVar('regist_email');
        $encryptedEmail = openssl_encrypt($email, 'AES-128-ECB', $this->encryptionKey);
        $password = $this->request->getVar('regist_password');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $model->save([
            'name'     => $this->request->getVar('regist_name'),
            'email'    => $encryptedEmail,
            'password' => $hashedPassword
        ]);

        return redirect()->to('/login')->with('msg', 'Registration successful! Please login.');
    }
}
