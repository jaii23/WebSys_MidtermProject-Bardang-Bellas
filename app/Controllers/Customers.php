<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $customerModel = new CustomerModel();

        return view('customers/index', [
            'customers' => $customerModel->findAll()
        ]);
    }

    public function new()
    {
        return view('customers/new');
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => 'required|valid_email|is_unique[customers.email]',
            'phone'     => 'permit_empty|max_length[20]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $customerModel = new CustomerModel();

        $customerModel->insert([
            'full_name'  => $this->request->getPost('full_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/customers');
    }

    public function edit($id)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($id);

        if (! $customer) {
            return redirect()->to('/customers');
        }

        return view('customers/edit', [
            'customer' => $customer
        ]);
    }

    public function update($id)
    {
        $rules = [
            'full_name' => 'required|min_length[2]|max_length[100]',
            'email'     => "required|valid_email|is_unique[customers.email,id,{$id}]",
            'phone'     => 'permit_empty|max_length[20]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $customerModel = new CustomerModel();

        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone')
        ]);

        return redirect()->to('/customers');
    }
}