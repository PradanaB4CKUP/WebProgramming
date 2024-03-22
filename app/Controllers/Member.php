<?php

namespace App\Controllers;

class Member extends BaseController
{
    public function index(): string
    {
        return view('member_view');
    }

    public function logout()
    {
        session()->destroy();
        return destroy()->to('login');
    }
}