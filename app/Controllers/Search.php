<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\PostModel;
use CodeIgniter\HTTP\ResponseInterface;

class Search extends BaseController
{
    public function index()
    {
        //
    }
    public function searchAll_ByWords()
    {
        $request = service('request');
        $searchTerm = $request->getPost('search');

        $postModel = new PostModel();
        $userModel = new UserModel();
        //search Post
        $data['postforum'] = $postModel->like('titlePost', $searchTerm)
                    ->orLike('content', $searchTerm)
                    ->findAll();

        $data['users'] = $userModel->like('name', $searchTerm)
                    ->orLike('email', $searchTerm)
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

        //save searchterm variable
        $data['searchTerm'] = $searchTerm;

        // Pass results and search term to the view
        return view('search_results',$data);
    }
    public function searchBy_Trendings($search = null){
        
    }
}
