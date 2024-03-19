<?php

namespace App\Controllers;

use App\Models\ModelUser; // Sesuaikan dengan namespace Anda

class LoginDua extends BaseController
{
    public function index()
    {
        // Check if the form has been submitted
        if ($this->request->getMethod() === 'post') {
            // Retrieve user input from the form
            $emailOrPhone = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            session()->set('email', $emailOrPhone);
            session()->set('password', $password);

            // Perform authentication
            if ($userData = $this->authenticate($emailOrPhone, $password)) {
                // Pass user data to the profile view
                $data['userData'] = $userData;

                // Load the profile view
                return view('profile', $data);
            } else {
                // Authentication failed, set flash message or display error
                session()->getFlashdata('error', 'Invalid email/phone or password');
            }
        }

        // Load the login view
        return view('login');
    }

    // Authentication logic
    private function authenticate(string $emailOrPhone, string $password)
    {
        // Load the User model
        $userModel = new ModelUser();

        // Check if user exists
        $userData = $userModel->cekData(['email' => $emailOrPhone])->row_array();

        if (!empty($userData) && password_verify($password, $userData['password'])) {
            // Authentication successful, return user data
            return $userData;
        } else {
            // Authentication failed
            return false;
        }
    }
}
