<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UserModel;

class Theme extends Controller
{
    public function set()
    {
        $session = session();
        $userId = $session->get('id');

        // Ensure user is logged in
        if (!$userId) {
            return $this->response->setJSON(['status' => 'fail', 'message' => 'User not authenticated.'])->setStatusCode(401);
        }

        // Ambil JSON payload dari AJAX
        $data = $this->request->getJSON();

        if (isset($data->theme) && is_string($data->theme)) {
            $userModel = new UserModel();
            // Save theme to the database
            $userModel->update($userId, ['theme' => $data->theme]);

            // Update the session as well
            $session->set('theme', $data->theme);

            return $this->response->setJSON(['status' => 'success', 'message' => 'Theme updated.']);
        }
        return $this->response->setJSON(['status' => 'fail', 'message' => 'Invalid theme data.'])->setStatusCode(400);
    }
}
