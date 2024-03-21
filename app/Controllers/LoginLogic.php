<?php

namespace App\Controllers;


class LoginLogic extends BaseController
{
    public function index(): string
    {
        // Start the session before any output
        //session_start();
        $MemberUser = new \App\Models\MemberUser();
        // Check if the form has been submitted
        if ($this->request->getMethod() === 'post') {
            // Retrieve user input from the form
            $emailOrPhone = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            // session()->set('email', $emailOrPhone);
            // session()->set('password', $password);
            
            // Perform authentication - you would replace this with your actual authentication logic
            // if ($userData = $this->authenticate($emailOrPhone, $password)) {
            //     // Store only necessary information in the session
            //     // $_SESSION['email'] = $emailData; // Retrieve email from authentication
            //     // $_SESSION['password'] = $passwordData;
            //     $data['userData'] = $userData;
            //     // Redirect to a dashboard or success page
            //     return redirect()->to('/admin', $data);
            //     //return redirect()->to('/admin');
            // }
            if (empty($err)){
                $dataUser = $MemberUser->where('email', $emailOrPhone)->first();
                if ($dataUser['password']!= md5($password))
                {
                    $err = "Password tidak sesuai";
                }
            }
            if (empty($err)){
                $dataSesi = [
                    'email' => $dataUser['email'],
                    'password' => $dataUser['password'],
                ];
                session()->set($dataSesi);
                return redirect->to("MemberUser");
            }
            if ($err){
                session()->setFlashdata('email', $emailOrPhone);
                session()->setFlashdata('error', $err);
                return redirect()->to('login');
            }
            // else {
            //     // Authentication failed, set flash message or display error
            //     $err = "Invalid email/phone or password";
            //     //session()->setFlashdata('error', 'Invalid email/phone or password');
            // }
        }

        // Load the login view
        return view('login');
    }

    

    // Authentication logic - replace this with your actual authentication logic
    private function authenticate(string $emailOrPhone, string $password): bool
    {
        // Your authentication logic goes here
        // This is just a placeholder for demonstration purposes
        $validEmailOrPhone = 'email'; // Example valid email or phone
        $validPassword = 'password'; // Example valid password

        if ($emailOrPhone === $validEmailOrPhone && $password === $validPassword) {
            // Authentication successful
            return true;
        } else {
            // Authentication failed
            return false;
        }
    }

}
