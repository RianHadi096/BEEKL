<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Register extends BaseController
{
    public function index()
    {
        //include helper form
        helper(['form']);
        $data = [];
        echo view('register', $data);
    }
 
    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'regist_name'          => 'required|min_length[3]|max_length[20]',
            'regist_email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
            'regist_password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'         => 'matches[regist_password]'
        ];
         
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'name'     => $this->request->getVar('regist_name'),
                'email'    => $this->request->getVar('regist_email'),
                'password' => password_hash($this->request->getVar('regist_password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
         
    }
}
