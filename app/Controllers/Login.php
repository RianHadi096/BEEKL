<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    // Define your encryption key here
    protected $encryptionKey = 'your-secret-key';

    public function index()
    {
        return view('login');
    } 
 
    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $login_user = $this->request->getVar('login_email_username');
        $password = $this->request->getVar('login_password');

        // Encrypt email for lookup
        $encryptedEmail = openssl_encrypt($login_user, 'AES-128-ECB', $this->encryptionKey);

        // Find by encrypted email
        $user = $model->where('email', $encryptedEmail)->orWhere('name', $login_user)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id' => $user['id'],
                'name' => $user['name'],
                'logged_in' => true
            ]);
            return redirect()->to('/home');
        } else {
            return redirect()->to('/login')->with('msg', 'Invalid login credentials.');
        }
    }
}
