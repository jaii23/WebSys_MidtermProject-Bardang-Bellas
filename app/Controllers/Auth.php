<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $username)
            ->first();

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'logged_in' => true,
        ]);

  

            return redirect()->to('/customers');
        }

        return redirect()->back()
            ->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()
            ->to('/login')
            ->with('message', 'You have been logged out.');
    }
}