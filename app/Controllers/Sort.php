<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PostModel;
use CodeIgniter\HTTP\ResponseInterface;

class Sort extends BaseController
{
    public function index()
    {
        //
    }
    public function sortByGenre_atHomePage($genre = null){
        // Get the post model
        $postModel = new PostModel();
        // Get the user model
        $userModel = new UserModel();
        // Join the post model with the user model
        $data['postforum'] = $postModel ->join('users', 'users.id = postforum.userID')
                                        ->where('genre', $genre)
                                        ->findAll();
        //check if there are posts with the specified genre
        //if (empty($data['postforum'])) {
        //    return redirect()->to('/')->with('error', 'No posts found for this genre.');
        //}else{
            // Return the view with the sorted posts
        //    return view('sort_genre', $data);
        //}
        // Return the view with the sorted posts
            return view('sort_genre', $data);

    }
    //sort by genre at profile page
    public function sortByGenre($genre = null){

        //Get Session ID
        $session = session();
        $userID = $session->get('id');
        // Get the post model
        $postModel = new PostModel();
        // Get the user model
        $userModel = new UserModel();
        // Get Session ID
        $session = session();
        $userID = $session->get('id');
        // Join the post model with the user model
        $data['postforum'] = $postModel ->join('users', 'users.id = postforum.userID')
                                        ->where('genre', $genre)
                                        ->where('userID', $userID)
                                        ->findAll();
        //check if there are posts with the specified genre
        //if (empty($data['postforum'])) {
        //    return redirect()->to('/profile')->with('error', 'No posts found for this genre.');
        //}else{
            // Return the view with the sorted posts
        //    return view('sort_genre_profile', $data);
        //}
            return view('sort_genre_profile', $data);
    }

}
