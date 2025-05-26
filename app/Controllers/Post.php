<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Post extends BaseController
{
    //get session
    protected $session;
    //initialize like count
    protected $like = 0;
    protected $helpers = ['form','url'];
    
    public function createPostfromHomePage(){
        //Get Model
        $model = new PostModel();
        
        //upload image
        $image = $this->request->getFile('images');
        if($image->isValid()) {
            $filename = $image->getRandomName();
            $image->move('../public/uploads', $filename);
            $data = [
                'postID' => $this->request->getVar('postID'),
                'userID' => session()->get('id'),
                'titlePost' => $this->request->getVar('titlePost'),
                'content' => $this->request->getVar('content'),
                'genre' => $this->request->getVar('genre'),
                'views' => $this->request->getVar('views'),
                'images' => $filename,
                'likes' => $this->like,
                'created_at' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
                'postID' => $this->request->getVar('postID'),
                'userID' => session()->get('id'),
                'titlePost' => $this->request->getVar('titlePost'),
                'content' => $this->request->getVar('content'),
                'genre' => $this->request->getVar('genre'),
                'views' => $this->request->getVar('views'),
                'images' => null,
                'likes' => $this->like,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }
        
        //Insert data to postforum
        $model->insert($data);
        return redirect()->to('/')->with('success', 'Post Created Successfully');
        
    }
    public function createPostfromProfilePage(){
        //Get Model
        $model = new PostModel();
        //upload image
        $image = $this->request->getFile('images');
        

        //upload image
        $image = $this->request->getFile('images');
        if($image->isValid()) {
            $filename = $image->getRandomName();
            $image->move('../public/uploads', $filename);
            $data = [
                'postID' => $this->request->getVar('postID'),
                'userID' => session()->get('id'),
                'titlePost' => $this->request->getVar('titlePost'),
                'content' => $this->request->getVar('content'),
                'genre' => $this->request->getVar('genre'),
                'views' => $this->request->getVar('views'),
                'images' => $filename,
                'likes' => $this->like,
                'created_at' => date('Y-m-d H:i:s')
            ];
        } else {
            $data = [
                'postID' => $this->request->getVar('postID'),
                'userID' => session()->get('id'),
                'titlePost' => $this->request->getVar('titlePost'),
                'content' => $this->request->getVar('content'),
                'genre' => $this->request->getVar('genre'),
                'views' => $this->request->getVar('views'),
                'images' => null,
                'likes' => $this->like,
                'created_at' => date('Y-m-d H:i:s')
            ];
        }

        //Insert data to postforum
        $model->insert($data);
        //return to the profile page with $name
        $session = session();
        $userID = $session->get('id');
        $userModel = new UserModel();
        $data['userID'] = $userModel->where('id', $userID)->first();
        $name = $data['userID']['name'];
        return redirect()->to('profile/'.$name)->with('success', 'Post Created Successfully');
        
    }
}
