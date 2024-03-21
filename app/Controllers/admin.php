<?php

namespace App\Controllers;

use App\Models\ModelUser;

class admin extends BaseController
{
    public function index(): string
    {
        return view('admin_page');
    }

    public function logout()
    {
        session()->destroy();
        return destroy()->to('login');
    }
    public function adminController()
    {
        // Load the User model
        $userModel = new ModelUser();

        // Get user data from the database
        $userData = $userModel->getUserData();

        // Pass user data to the view
        $data['userData'] = $userData;

        // Load the admin_page view
        return view('admin_page', $data);
    }
}