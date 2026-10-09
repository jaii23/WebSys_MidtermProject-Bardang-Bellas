<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        return view('users/index', [
            'users' => $userModel->findAll()
        ]);
    }

    public function new()
    {
        return view('users/new');
    }

    public function create()
{
    $rules = [
        'username'  => 'required|min_length[3]|max_length[50]|is_unique[users.username]',
        'full_name' => 'required|min_length[2]|max_length[100]',
        'password'  => 'required|min_length[6]|max_length[255]'
    ];

    if (! $this->validate($rules)) {
        return redirect()->back()->withInput();
    }

    $userModel = new UserModel();

    $userModel->insert([
        'username'   => $this->request->getPost('username'),
        'full_name'  => $this->request->getPost('full_name'),
        'password'   => password_hash(
            $this->request->getPost('password'),
            PASSWORD_DEFAULT
        ),
        'created_at' => date('Y-m-d H:i:s')
    ]);

    return redirect()->to('/users');
}

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            return redirect()->to('/users');
        }

        return view('users/edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $rules = [
            'username'  => "required|min_length[3]|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|min_length[2]|max_length[100]',
            'avatar'    => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $userModel = new UserModel();

        $updateData = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        $avatar = $this->request->getFile('avatar');

        if ($avatar && $avatar->isValid() && ! $avatar->hasMoved()) {
            $newFileName = $avatar->getRandomName();
            $uploadPath = FCPATH . 'uploads/avatars/';

            $avatar->move($uploadPath, $newFileName);

            service('image')
                ->withFile($uploadPath . $newFileName)
                ->fit(300, 300)
                ->save($uploadPath . $newFileName);

            $updateData['avatar'] = $newFileName;
        }

        $userModel->update($id, $updateData);

        return redirect()->to('/users');
    }
}