<?php

namespace App\Controllers;
use App\Models\PostModel;
use App\Models\UserModel;
use App\Models\LikeModel;
use App\Models\CommentModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SideMenu extends BaseController
{
    
    public function likePost($id=null)
    {
        
        //get postID
        $postModel = new PostModel();
        $data['postID']=$postModel->where('postID', $id)->first();

        //like post
        $likeModel = new LikeModel();
        $session = session();
        $userID = $session->get('id');
        $data = [
            'userID' => $userID,
            'postID' => $id,
        ];
        $likeModel->insert($data);

        //count likes
        $likeCount = $likeModel->where('postID', $id)->countAllResults();
        $postModel->update($id, ['likes' => $likeCount]);

        //return to the profile page with $name
        $session = session();
        $userID = $session->get('id');
        $userModel = new UserModel();
        $data['userID'] = $userModel->where('id', $userID)->first();
        $name = $data['userID']['name'];
        return redirect()->to('profile/'.$name)->with('success', 'Post Liked Successfully');
    }
    public function unlikePost($id=null)
    {
        //get postID
        $postModel = new PostModel();
        $data['postID']=$postModel->where('postID', $id);

        //unlike post
        $likeModel = new LikeModel();
        $session = session();
        $userID = $session->get('id');
        $data = [
            'userID' => $userID,
            'postID' => $id,
        ];
        $likeModel->where($data)->delete();

        //count likes after unlike
        $likeCount = $likeModel->where('postID', $id)->countAllResults();
        $postModel->update($id, ['likes' => $likeCount]);
        //return to the profile page with $name
        $session = session();
        $userID = $session->get('id');
        $userModel = new UserModel();
        $data['userID'] = $userModel->where('id', $userID)->first();
        $name = $data['userID']['name'];
        return redirect()->to('profile/'.$name)->with('success', 'Post Unliked Successfully');
    }
    //unlike post at home page
    public function unlikePost_atHomePage($id=null){
        //get postID
        $postModel = new PostModel();
        $data['postID']=$postModel->where('postID', $id);

        //unlike post
        $likeModel = new LikeModel();
        $session = session();
        $userID = $session->get('id');
        $data = [
            'userID' => $userID,
            'postID' => $id,
        ];
        $likeModel->where($data)->delete();

        //count likes after unlike
        $likeCount = $likeModel->where('postID', $id)->countAllResults();
        $postModel->update($id, ['likes' => $likeCount]);
        
        //return to the profile page with $name
        return redirect()->to('/')->with('success', 'Post Unliked Successfully');
    }
    public function likePost_atHomePage($id=null)
    {
        //get postID
        $postModel = new PostModel();
        $data['postID']=$postModel->where('postID', $id);

        //like post
        $likeModel = new LikeModel();
        $session = session();
        $userID = $session->get('id');
        $data = [
            'userID' => $userID,
            'postID' => $id,
        ];
        $likeModel->insert($data);

        //count likes
        $likeCount = $likeModel->where('postID', $id)->countAllResults();
        $postModel->update($id, ['likes' => $likeCount]);

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
        //delete comment first
        $commentModel = new CommentModel();
        $commentModel->where('postID', $id)->delete();
        //delete likes
        $likeModel = new LikeModel();
        $likeModel->where('postID', $id)->delete();
        //delete post
        $postModel = new PostModel();
        $postModel->where('postID', $id)->delete();
        
        //return to the profile page with $name
        $session = session();
        $userID = $session->get('id');
        $userModel = new UserModel();
        $data['userID'] = $userModel->where('id', $userID)->first();
        $name = $data['userID']['name'];
        return redirect()->to('profile/'.$name)->with('success', 'Post Deleted Successfully');
        
    }
}
