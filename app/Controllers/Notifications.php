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
        $notificationModel = new NotificationModel();
        $userID = session()->get('id');
        $data['notifications'] = $notificationModel->where('userID', $userID)->orderBy('created_at', 'DESC')->findAll();
        
        //mark notifications as read
        $notificationModel->where('userID', $userID)->set(['isRead' => 1])->update();
        return view('notifications_page', $data);
    }

    public function delete($notificationID)
    {
        $notificationModel = new NotificationModel();
        $userID = session()->get('id');

        // Verify notification belongs to the user
        $notification = $notificationModel->where('notificationID', $notificationID)->where('userID', $userID)->first();
        if ($notification) {
            $notificationModel->delete($notificationID);
            return redirect()->to('/notifications')->with('success', 'Notification deleted successfully.');
        } else {
            return redirect()->to('/notifications')->with('error', 'Notification not found or unauthorized.');
        }
    }
}
