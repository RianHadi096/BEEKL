<?php

namespace App\Controllers;

use App\Models\LikeModel;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\CommentModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index(): string
    {
        //Get Model
        $model = new PostModel();
        $commentModel = new CommentModel();
        //get all data from postforum and user
        $data['postforum'] = $model->join('users', 'users.id = postforum.userID')->findAll();
        //get all data from postforum with comments
        $data['comments'] = $model->select('postforum.*, COUNT(comments.commentID) as commentCount')
            ->join('comments', 'comments.postID = postforum.postID', 'left')
            ->groupBy('postforum.postID')
            ->findAll();

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
        //get all data from postforum with comments
        $data['comments'] = $model->select('postforum.*, COUNT(comments.commentID) as commentCount')
            ->join('comments', 'comments.postID = postforum.postID', 'left')
            ->groupBy('postforum.postID')
            ->findAll();
        return view('dashboard_profile',$data);
    }
}
