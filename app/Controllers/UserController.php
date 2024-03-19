<?php

namespace App\Controllers;

use App\Models\ModelUser; // Sesuaikan dengan namespace Anda

class UserController extends BaseController
{
    public function getUserProfile($userId)
    {
        // Load the User model
        $userModel = new ModelUser();

        // Get user data from the database
        $userData = $userModel->getUserWhere(['id' => $userId])->row_array();

        // Check if user exists
        if (!empty($userData)) {
            // Pass user data to the view
            $data['userData'] = $userData;

            // Load the user profile view
            return view('admin_page', $data);
        } else {
            // User not found, redirect or show error message
            return redirect()->to('/error_page');
        }
    }

    public function getUserList()
    {
        // Load the User model
        $userModel = new ModelUser();

        // Get user list from the database
        $userList = $userModel->getUserLimit()->result_array();

        // Pass user list to the view
        $data['userList'] = $userList;

        // Load the user list view
        return view('user_list', $data);
    }

    public function logout()
    {
        // Hapus sesi atau token otentikasi
        session()->destroy();

        // Redirect pengguna ke halaman login
        return redirect()->to('/login');
    }
}
