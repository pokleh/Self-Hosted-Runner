<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login(): string
    {
        if (session()->get('user_id')) {
            return redirect()->to('/tasks');
        }

        return view('auth/login');
    }

    public function attemptLogin()
    {
        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('password');

        $user = $this->userModel->where('email', $email)->first();
        if (! $user || empty($user['password_hash']) || ! password_verify($password, $user['password_hash'])) {
            return redirect()->back()->withInput()->with('errors', ['Invalid email or password.']);
        }

        session()->set([
            'user_id' => (int) $user['id'],
            'user_name' => $user['name'],
            'user_email' => $user['email'],
            'user_role' => $user['role'] ?? 'member',
        ]);

        return redirect()->to('/tasks')->with('message', 'Welcome back, ' . $user['name'] . '.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login')->with('message', 'You have been logged out.');
    }
}
