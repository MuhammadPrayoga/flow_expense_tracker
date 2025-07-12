<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function processRegister()
    {
        $userModel = new UserModel();

        $email    = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $confirm  = $this->request->getPost('password2'); // DISINKRON DENGAN FORM

        if ($password != $confirm) {
            return redirect()->back()->with('error', 'Password tidak cocok');
        }

        $userModel->insert([
            'email'    => $email,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/auth/login')->with('success', 'Registrasi berhasil, silakan login');
    }

    public function processLogin()
    {
        $userModel = new UserModel();

        $identity = $this->request->getPost('username'); // Bisa isi email atau username
        $password = $this->request->getPost('password');

        $user = $userModel
            ->where('username', $identity)
            ->orWhere('email', $identity)
            ->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'  => $user['id'],
                'username' => $user['username'],
                'logged_in' => true
            ]);
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Username/Email atau password salah');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
