<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        $session = session();

        if ($session->get('isLoggedIn')) {
            return redirect()->to('/home');
        }

        $data = [];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[8]'
            ];

            if ($this->validate($rules)) {
                $userModel = new User();
                $user = $userModel->where('email', $this->request->getPost('email'))->first();
    
                if ($user) {
                    $session->set('isLoggedIn', true);
                    $session->set('user_id', $user['id']);
                    $session->set('name', $user['name']);
                    return redirect()->to('/home');
                } else {
                    $data['error'] = 'Invalid email or password';
                }
                
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('pages/auth/login', $data);
    }

    public function signup()
    {
        $data = [];

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'name' => 'required|min_length[3]',
                'email'    => 'required|valid_email|is_unique[user.email]',
                'password' => 'required|min_length[8]'
            ];

            if ($this->validate($rules)) {
                $userData = [
                    'name' => $this->request->getVar('name'),
                    'email'    => $this->request->getVar('email'),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                ];

                $userModel = new User();
                $userModel->insert($userData);

                return redirect()->to('/auth/login')->with('success', 'Success, please Login');
            } else {
                $data['validation'] = $this->validator;
            }
        }

        return view('pages/auth/signup', $data);
    }

    public function logout()
    {
        $session = session();
        $session->remove(['isLoggedIn', 'user_id']);

        return redirect()->to('/auth/login')->with('success', 'Logout berhasil.');
    }
}
