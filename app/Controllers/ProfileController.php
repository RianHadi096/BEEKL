<?php

namespace App\Controllers;

use App\Models\UserModel;

class ProfileController extends BaseController
{
    protected UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->session = \Config\Services::session();
    }

    /**
     * Handles the profile picture change request.
     * The route for this method is protected by the 'auth' filter,
     * so we can assume the user is already logged in.
     */
    public function changeAvatar()
    {
        // Set validation rules for the uploaded file
        $rules = [
            'avatar' => [
                'label' => 'Profile Picture',
                'rules' => 'uploaded[avatar]'
                    . '|is_image[avatar]'
                    . '|mime_in[avatar,image/jpg,image/jpeg,image/png]'
                    . '|max_size[avatar,2048]', // Max 2MB
            ],
        ];

        if (! $this->validate($rules)) {
            // If validation fails, redirect back with errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Get the uploaded file
        $img = $this->request->getFile('avatar');

        if ($img->isValid() && !$img->hasMoved()) {
            // Generate a random new name for the file to avoid conflicts
            $newName = $img->getRandomName();

            // Move the file to the 'uploads/avatars' directory
            $img->move(FCPATH . 'uploads/avatars', $newName);

            // Get the path to be stored in the database
            $avatarPath = 'uploads/avatars/' . $newName;

            // Update the user's data in the database
            $userId = $this->session->get('id');

            // Temporarily disable callbacks to get the raw path from DB for file deletion
            $currentUser = $this->userModel->allowCallbacks(false)->find($userId);

            // Check if old avatar exists and delete it
            if ($currentUser && !empty($currentUser['avatar']) && file_exists(FCPATH . $currentUser['avatar'])) {
                unlink(FCPATH . $currentUser['avatar']);
            }

            // Update the database. Callbacks are automatically re-enabled.
            $this->userModel->update($userId, ['avatar' => $avatarPath]);

            // Update the session with the new avatar path
            $this->session->set('avatar', base_url($avatarPath));

            // Redirect back to the profile page with a success message
            return redirect()->to('/profile/' . $this->session->get('name'))->with('success', 'Profile picture updated successfully!');
        }

        // If something went wrong with the file move
        return redirect()->back()->with('error', 'Failed to upload the image. Please try again.');
    }
}