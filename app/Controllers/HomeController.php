<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        if (session()->get('isLoggedIn')) {
            $username = session()->get('name');
            $data['name'] = $username;
            return view('pages/home/index', $data);
        } else {
            return redirect()->to('/auth/login');
        }
    }
}
