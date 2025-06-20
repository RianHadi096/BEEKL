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

        //translating genre to english
        $data['postforum'] = array_map(function($post) {
            switch ($post['genre']) {
                case 'Olahraga':
                    $post['genre'] = 'Sports';
                    break;
                case 'Anime':
                    $post['genre'] = 'Anime';
                    break;
                case 'Politik':
                    $post['genre'] = 'Politics';
                    break;
                case 'Film':
                    $post['genre'] = 'Movies';
                    break;
                case 'Berita':
                    $post['genre'] = 'News';
                    break;
                case 'Komedi':
                    $post['genre'] = 'Comedy/Humors';
                    break;
                case 'Buku':
                    $post['genre'] = 'Book';
                    break;
                case 'Teknologi':
                    $post['genre'] = 'Technology';
                    break;
                default:
                    $post['genre'] = 'Others';
            }
            return $post;
        }, $data['postforum']);

        $userModel = new UserModel();
        $session = session();
        $userID = session()->get('id');
        $user = null;
        if ($session->has('id')) {
            $user = $userModel->find($session->get('id'));
        }
        $data['user'] = $user;
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
        
        //translating genre to english
        $data['postforum'] = array_map(function($post) {
            switch ($post['genre']) {
                case 'Olahraga':
                    $post['genre'] = 'Sports';
                    break;
                case 'Anime':
                    $post['genre'] = 'Anime';
                    break;
                case 'Politik':
                    $post['genre'] = 'Politics';
                    break;
                case 'Film':
                    $post['genre'] = 'Movies';
                    break;
                case 'Berita':
                    $post['genre'] = 'News';
                    break;
                case 'Komedi':
                    $post['genre'] = 'Comedy/Humors';
                    break;
                case 'Buku':
                    $post['genre'] = 'Book';
                    break;
                case 'Teknologi':
                    $post['genre'] = 'Technology';
                    break;
                default:
                    $post['genre'] = 'Others';
            }
            return $post;
        }, $data['postforum']);

        $userModel = new UserModel();
        $session = session();
        $userID = session()->get('id');
        $user = null;
        if ($session->has('id')) {
            $user = $userModel->find($session->get('id'));
        }
        $data['user'] = $user;
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
