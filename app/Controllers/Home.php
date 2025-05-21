<?php

namespace App\Controllers;
use App\Models\PostModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public function index(): string
    {
        //Get Model
        $model = new PostModel();
        //get all data from postforum and user
        $data['postforum'] = $model->join('users', 'users.id = postforum.userID')->findAll();
        return view('dashboard',$data);
    }
    public function post(): string
    {
        return view('post');
    }
    public function profile(): string
    {
        //Get Model
        $model = new PostModel();
        //Get Session ID
        $session = session();
        $userID = $session->get('id');
        //get all data from postforum with userID
        $data['postforum'] = $model->where('userID', $userID)->findAll();
        return view('dashboard_profile',$data);
    }
}
