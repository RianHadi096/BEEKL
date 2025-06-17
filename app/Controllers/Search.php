<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Search extends BaseController
{
    public function index()
    {
        //
    }
    public function search()
    {
        $searchTerm = $this->request->getGet('q');
        if (!$searchTerm) {
            return redirect()->back()->with('error', 'Search term cannot be empty.');
        }

        // Load the model
        $postModel = new \App\Models\PostModel();
        $userModel = new \App\Models\UserModel();

        // Search posts
        $posts = $postModel->like('title', $searchTerm)->orLike('content', $searchTerm)->findAll();

        // Search users
        $users = $userModel->like('name', $searchTerm)->orLike('email', $searchTerm)->findAll();

        // Prepare data for view
        $data = [
            'postforum' => $posts,
            'users' => $users,
            'searchTerm' => $searchTerm,
        ];

        return view('search_results', $data);
    }
}
