<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotificationModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Notifications extends BaseController
{
    public function index()
    {
        //get all notifications with 'post' type
        $notificationModel = new NotificationModel();
        $session = session();
        $userID = $session->get('id');
        $data['notificationsPost'] = $notificationModel
            ->where('userID', $userID)
            ->where('type', 'post')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        //get all notifications with 'like' type
        $data['notificationsLike'] = $notificationModel
            ->where('type', 'like')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        //get all notifications with 'comment' type
        $data['notificationsComment'] = $notificationModel
            ->where('type', 'comment')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        //get user data
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $userID)->first();
        $data['name'] = $data['user']['name'];

        //mark notifications as read
        $notificationModel->where('userID', $userID)->set(['isRead' => 1])->update();

        //load view
        return view('notifications_page', $data);
    }
}
