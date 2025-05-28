<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CommentModel;
use App\Models\PostModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Comment extends BaseController
{
    public function index()
    {
        //
    }
    //add comment at home page
    public function addComment_atHomePage($id=null){
        //get postID
        $postModel = new PostModel();
        $data['postID']=$postModel->where('postID', $id);
        //add comment
        $commentModel = new CommentModel();
        $session = session();
        $userID = $session->get('id');
        $data = [
            'userID' => $userID,
            'postID' => $id,
            'content' => $this->request->getPost('content'),
        ];
        $commentModel->insert($data);
        //count comments
        $commentCount = $commentModel->where('postID', $id)->countAllResults();
        $postModel->update($id, ['comments' => $commentCount]);

        //return to the home page
        return redirect()->to('/')->with('success', 'Comment Added Successfully');
    }
    //delete comment at home page
    public function deleteComment_atHomePage($commentID=null){
        // Get the comment model
        $commentModel = new CommentModel();
        
            // Find the comment to delete
            $comment = $commentModel->find($commentID);
        
            if ($comment) {
                // Get the postID from the comment
                $postID = $comment['postID'];
      
                // Delete the comment
                $commentModel->delete($commentID);
       
                // Update the comment count in the postforum table
                $postModel = new PostModel();
                $commentCount = $commentModel->where('postID', $postID)->countAllResults();
                $postModel->update($postID, ['comments' => $commentCount]);
            // Redirect back with success message
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        } else {
            // Redirect back with error message if comment not found
            return redirect()->back()->with('error', 'Comment not found.');
        }
    }
//add comment at home page
public function addComment($id=null){
    //get postID
    $postModel = new PostModel();
    $data['postID']=$postModel->where('postID', $id);
    //add comment
    $commentModel = new CommentModel();
    $session = session();
    $userID = $session->get('id');
    $data = [
        'userID' => $userID,
        'postID' => $id,
        'content' => $this->request->getPost('content'),
    ];
    $commentModel->insert($data);
    //count comments
    $commentCount = $commentModel->where('postID', $id)->countAllResults();
    $postModel->update($id, ['comments' => $commentCount]);

        //return to the profile page with $name
        $session = session();
        $userID = $session->get('id');
        $userModel = new UserModel();
        $data['userID'] = $userModel->where('id', $userID)->first();
        $name = $data['userID']['name'];
    return redirect()->to('profile/'.$name)->with('success', 'Comment Added Successfully');
}
//delete comment at home page
public function deleteComment($commentID=null){
        // Get the comment model
        $commentModel = new CommentModel();
        
            // Find the comment to delete
            $comment = $commentModel->find($commentID);
        
            if ($comment) {
                // Get the postID from the comment
                $postID = $comment['postID'];
      
                // Delete the comment
                $commentModel->delete($commentID);
       
                // Update the comment count in the postforum table
                $postModel = new PostModel();
                $commentCount = $commentModel->where('postID', $postID)->countAllResults();
                $postModel->update($postID, ['comments' => $commentCount]);
                
                // Redirect back with success message
                $session = session();
                $userID = $session->get('id');
                $userModel = new UserModel();
                $data['userID'] = $userModel->where('id', $userID)->first();
                $name = $data['userID']['name'];
                return redirect()->to('profile/'.$name)->with('success', 'Comment deleted successfully.');
        } else {
            // Redirect back with error message if comment not found
            $session = session();
            $userID = $session->get('id');
            $userModel = new UserModel();
            $data['userID'] = $userModel->where('id', $userID)->first();
            $name = $data['userID']['name'];
            return redirect()->to('profile/'.$name)->with('error', 'Comment not found.');
        }
        
}

    //load comments at home page with json
    public function loadComments($postId){

        $commentModel = new CommentModel();
        $comments = $commentModel->where('postID', $postId)->findAll();
        return $this->response->setJSON($comments);
    }
}
