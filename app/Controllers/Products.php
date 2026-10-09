<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        return view('products/index', [
            'products' => $productModel->findAll()
        ]);
    }

    public function new()
    {
        return view('products/new');
    }

    public function create()
    {
        $rules = [
            'name'           => 'required|min_length[2]|max_length[100]',
            'price'          => 'required|decimal|greater_than[0]',
            'stock_quantity' => 'required|integer|greater_than_equal_to[0]',
            'image'          => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $productModel = new ProductModel();

        $productData = [
            'name'           => $this->request->getPost('name'),
            'price'          => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'created_at'     => date('Y-m-d H:i:s')
        ];

        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && ! $image->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/products/';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $fileName = $image->getRandomName();
            $image->move($uploadPath, $fileName);

            $productData['image'] = $fileName;
        }

        $productModel->insert($productData);

        return redirect()->to('/products')
            ->with('message', 'Product added successfully.');

    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (! $product) {
            return redirect()->to('/products');
        }

        return view('products/edit', [
            'product' => $product
        ]);
    }

    public function update($id)
    {
        $rules = [
            'name'           => 'required|min_length[2]|max_length[100]',
            'price'          => 'required|decimal|greater_than[0]',
            'stock_quantity' => 'required|integer|greater_than_equal_to[0]',
            'image'          => 'permit_empty|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $productModel = new ProductModel();

        $productData = [
            'name'           => $this->request->getPost('name'),
            'price'          => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity')
        ];

        $image = $this->request->getFile('image');

        if ($image && $image->isValid() && ! $image->hasMoved()) {
            $uploadPath = FCPATH . 'uploads/products/';

            $fileName = $image->getRandomName();
            $image->move($uploadPath, $fileName);

            $productData['image'] = $fileName;
        }

        $productModel->update($id, $productData);

        return redirect()->to('/products')
            ->with('message', 'Product updated successfully.');
    }

    public function delete($id)
{
    $productModel = new ProductModel();
    $product = $productModel->find($id);

    if (! $product) {
        return redirect()->to('/products');
    }

    if (! empty($product['image'])) {
        $imagePath = FCPATH . 'uploads/products/' . $product['image'];

        if (is_file($imagePath)) {
            unlink($imagePath);
        }
    }

    $productModel->delete($id);

    return redirect()->to('/products')
        ->with('message', 'Product deleted successfully.');
}
    
}