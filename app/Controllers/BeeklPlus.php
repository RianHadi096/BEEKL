<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BeeklPlus extends BaseController
{
    protected $userModel;
    
    public function __construct()
    {
        $this->userModel = new \App\Models\UserModel();
    }

    // Middleware to check if user is premium
    protected function isPremiumUser()
    {
        $session = session();
        if (!$session->has('id')) {
            return false;
        }
        
        $user = $this->userModel->find($session->get('id'));
        return isset($user['is_premium']) && $user['is_premium'] == 1;
    }

    public function toggleDarkMode()
    {
        if (!$this->isPremiumUser()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'This feature is only available for BEEKL+ users'
            ]);
        }

        $session = session();
        $user = $this->userModel->find($session->get('id'));
        
        // Toggle dark mode
        $darkMode = !$user['dark_mode'];
        $this->userModel->update($session->get('id'), ['dark_mode' => $darkMode]);

        // Update session immediately
        $session->set('dark_mode', $darkMode);

        return $this->response->setJSON([
            'status' => 'success',
            'dark_mode' => $darkMode
        ]);
    }

    public function setAvatarFrame($frame = null)
    {
        if (!$this->isPremiumUser()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'This feature is only available for BEEKL+ users'
            ]);
        }

        if (!$frame) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No frame selected'
            ]);
        }

        $session = session();
        $this->userModel->update($session->get('id'), ['avatar_frame' => $frame]);

        // Update session immediately
        $session->set('avatar_frame', $frame);

        return $this->response->setJSON([
            'status' => 'success',
            'frame' => $frame
        ]);
    }

    public function upgradeToPremium()
    {
        $session = session();
        if (!$session->has('id')) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User not logged in'
            ])->setStatusCode(401);
        }

        try {
            // Update user to premium status
            $userId = $session->get('id');
            $this->userModel->update($userId, [
                'is_premium' => 1,
                'premium_since' => date('Y-m-d H:i:s'),
                'dark_mode' => 0, // Default dark mode off
                'avatar_frame' => 'gold' // Default gold frame
            ]);

            // Get updated user data
            $user = $this->userModel->find($userId);
            
            // Update session with premium status
            $session->set([
                'is_premium' => 1,
                'dark_mode' => 0,
                'avatar_frame' => 'gold'
            ]);

            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Successfully upgraded to BEEKL+',
                    'user' => $user
                ]);
            }

            return redirect()->to('/profile/' . $session->get('name'))
                           ->with('message', 'Welcome to BEEKL+! You now have access to premium features.');
        } catch (\Exception $e) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Subscription failed'
                ])->setStatusCode(500);
            }
            return redirect()->back()->with('error', 'Subscription failed. Please try again.');
        }
    }

    public function pricing()
    {
        $session = session();
        $user = null;
        if ($session->has('id')) {
            $user = $this->userModel->find($session->get('id'));
        }
        return view('beeklplus_pricing', ['user' => $user]);
    }
}
