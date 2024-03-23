<?php

namespace App\Controllers;


class Login extends BaseController
{
    public function index(): string
    {
        // Start the session before any output
        //session_start();
        $MemberUser = new \App\Models\MemberUser();
        // Check if the form has been submitted
        $login = $this->request->getPost('login');
        if ($login) {
            // Retrieve user input from the form
            $emailOrPhone = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            if ($emailOrPhone == "" or $password == ""){
                $err = "Silahkan masukkan username/email dan password";
            }

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
                return redirect->to("member");
            }
            if ($err){
                session()->setFlashdata('email', $emailOrPhone);
                session()->setFlashdata('error', $err);
                return redirect()->to('login');
            }
        }

        // Load the login view
        return view('login_view');
    }

    

    // Authentication logic - replace this with your actual authentication logic
    // private function authenticate(string $emailOrPhone, string $password): bool
    // {
    //     // Your authentication logic goes here
    //     // This is just a placeholder for demonstration purposes
    //     $validEmailOrPhone = 'email'; // Example valid email or phone
    //     $validPassword = 'password'; // Example valid password

    //     if ($emailOrPhone === $validEmailOrPhone && $password === $validPassword) {
    //         // Authentication successful
    //         return true;
    //     } else {
    //         // Authentication failed
    //         return false;
    //     }
    // }

}
