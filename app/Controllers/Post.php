<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\NotificationModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SavedPostModel;

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

        // Create notification for successful post creation
        $notificationModel = new NotificationModel();
        $notificationData = [
            'userID' => session()->get('id'),
            'type' => 'post',
            'message' => 'Your post titled "' . $data['titlePost'] . '" has been successfully added.',
            'isRead' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $notificationModel->insert($notificationData);

        return redirect()->to('/home')->with('success', 'Post Created Successfully');
        
    }
    public function createPostfromProfilePage(){
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

        // Create notification for successful post creation
        $notificationModel = new NotificationModel();
        $notificationData = [
            'userID' => session()->get('id'),
            'type' => 'post',
            'message' => 'Your post titled "' . $data['titlePost'] . '" has been successfully added.',
            'isRead' => 0,
            'created_at' => date('Y-m-d H:i:s')
        ];
        $notificationModel->insert($notificationData);

        //return to the profile page with $name
        $session = session();
        $userID = $session->get('id');
        $userModel = new UserModel();
        $data['userID'] = $userModel->where('id', $userID)->first();
        $name = $data['userID']['name'];
        return redirect()->to('profile/'.$name)->with('success', 'Post Created Successfully');
        
    }

    public function getPostsLikedByOthers()
    {
        $currentUserID = session()->get('id');

        $likeModel = new \App\Models\LikeModel();

        $builder = $likeModel->builder();
        $builder->select('postforum.*');
        $builder->join('postforum', 'postforum.postID = likes.postID');
        $builder->where('likes.userID !=', $currentUserID);
        $builder->where('postforum.userID !=', $currentUserID);
        $builder->groupBy('postforum.postID');

        $posts = $builder->get()->getResultArray();

        // Return posts as JSON or pass to a view as needed
        return $this->response->setJSON($posts);
    }
    public function savePost($postID)
{
    if (!session()->get('id')) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Please log in to save posts.'
        ]);
    }

    $savePostModel = new SavedPostModel();

    $existing = $savePostModel->where('user_id', session()->get('id'))
                              ->where('post_id', $postID)
                              ->first();

    if ($existing) {
        return $this->response->setJSON([
            'status' => 'info',
            'message' => 'You have already saved this post.'
        ]);
    }

    if ($savePostModel->insert([
        'user_id' => session()->get('id'),
        'post_id' => $postID,
        'saved_at' => date('Y-m-d H:i:s')
    ])) {
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Post saved successfully!'
        ]);
    } else {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Error saving post'
        ]);
    }
}

public function viewSavedPosts()
{
    $savedPostModel = new \App\Models\SavedPostModel();
    $postModel = new \App\Models\PostModel();

    // Ambil semua saved post untuk user ini
    $savedPosts = $savedPostModel
                    ->where('user_id', session()->get('id'))
                    ->findAll();

    $posts = [];
    foreach ($savedPosts as $saved) {
        $post = $postModel->find($saved['post_id']);
        if ($post) {
            $posts[] = $post;
        }
    }

    return view('saved_posts', ['posts' => $posts]);
}


}
