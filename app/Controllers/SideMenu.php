<?php

namespace App\Controllers;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SideMenu extends BaseController
{
    
    public function likePost($id=null)
    {
        //update the like count
        $postModel = new PostModel();
        $data['postID']=$postModel->where('postID', $id)->first();
        $data['postID']['likes'] += 1;
        $postModel->update($id, $data['postID']);
        //return to the profile page with $name
        $session = session();
        $userID = $session->get('id');
        $userModel = new UserModel();
        $data['userID'] = $userModel->where('id', $userID)->first();
        $name = $data['userID']['name'];
        return redirect()->to('profile/'.$name)->with('success', 'Post Liked Successfully');
    }
    public function likePost_atHomePage($id=null)
    {
        //update the like count
        $postModel = new PostModel();
        $data['postID']=$postModel->where('postID', $id)->first();
        $data['postID']['likes'] += 1;
        $postModel->update($id, $data['postID']);
        //return to the profile page with $name
        $session = session();
        $userID = $session->get('id');
        $userModel = new UserModel();
        $data['userID'] = $userModel->where('id', $userID)->first();
        $name = $data['userID']['name'];
        return redirect()->to('/')->with('success', 'Post Liked Successfully');
    }
    //delete post
    public function deletePost($id=null)
    {
        $postModel = new PostModel();
        $data['postID']=$postModel->where('postID', $id)->first();
        $postModel->delete($id);
        //return to the profile page with $name
        $session = session();
        $userID = $session->get('id');
        $userModel = new UserModel();
        $data['userID'] = $userModel->where('id', $userID)->first();
        $name = $data['userID']['name'];
        return redirect()->to('profile/'.$name)->with('success', 'Post Deleted Successfully');
        
    }
}
