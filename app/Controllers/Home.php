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

    private function getTrendingWords(int $limit = 10): array
    {
        $model = new PostModel();
        // Fetch recent posts (e.g., last 30 days)
        $thirtyDaysAgo = date('Y-m-d H:i:s', strtotime('-30 days'));
        $posts = $model->where('created_at >=', $thirtyDaysAgo)->findAll();

        $wordCounts = [];
        $stopWords = ['the', 'and', 'a', 'to', 'of', 'in', 'is', 'it', 'you', 'that', 'on', 'for', 'with', 'as', 'this', 'are', 'was', 'but', 'be', 'at', 'by', 'an'];

        foreach ($posts as $post) {
            // Extract words from title and content
            $text = strtolower($post['titlePost'] . ' ' . $post['content']);
            // Remove non-alphanumeric characters
            $text = preg_replace('/[^a-z0-9\s]/', '', $text);
            $words = explode(' ', $text);
            foreach ($words as $word) {
                $word = trim($word);
                if ($word === '' || in_array($word, $stopWords)) {
                    continue;
                }
                if (!isset($wordCounts[$word])) {
                    $wordCounts[$word] = 0;
                }
                $wordCounts[$word]++;
            }
        }
        // Sort words by frequency descending
        arsort($wordCounts);
        // Return top $limit words with counts
        return array_slice($wordCounts, 0, $limit, true);
    }

    public function index(): string
    {
        //Get Model
        $model = new PostModel();
        $commentModel = new CommentModel();
        //get all data from postforum and user
        $data['postforum'] = $model->join('users', 'users.id = postforum.userID')->findAll();
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


        //get all data from postforum with comments
        $data['comments'] = $model->select('postforum.*, COUNT(comments.commentID) as commentCount')
            ->join('comments', 'comments.postID = postforum.postID', 'left')
            ->groupBy('postforum.postID')
            ->findAll();

        $data['trendingWords'] = $this->getTrendingWords();

        //return to dashboard page
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
        $data['postforum'] = $model->join('users', 'users.id = postforum.userID')
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
        //get all data from postforum with comments
        $data['comments'] = $model->select('postforum.*, COUNT(comments.commentID) as commentCount')
            ->join('comments', 'comments.postID = postforum.postID', 'left')
            ->groupBy('postforum.postID')
            ->findAll();
        return view('dashboard_profile',$data);
    }
}
