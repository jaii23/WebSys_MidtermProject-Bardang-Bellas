<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\SaleModel;

class Sales extends BaseController
{
    public function new()
    {
        $productModel = new ProductModel();
        $customerModel = new CustomerModel();

        return view('sales/new', [
            'products'  => $productModel->findAll(),
            'customers' => $customerModel->findAll()
        ]);
    }

    public function create()
    {
        $rules = [
            'product_id' => 'required|integer|is_not_unique[products.id]',
            'customer_id' => 'permit_empty|integer|is_not_unique[customers.id]',
            'quantity' => 'required|integer|greater_than[0]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please enter valid sale details.');
        }

        $productModel = new ProductModel();
        $saleModel = new SaleModel();

        $productId = $this->request->getPost('product_id');
        $customerId = $this->request->getPost('customer_id');
        $quantity = (int) $this->request->getPost('quantity');

        $product = $productModel->find($productId);

        if (! $product) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Product not found.');
        }

        if ($quantity > $product['stock_quantity']) {
            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Not enough stock. Available quantity: ' . $product['stock_quantity']
                );
        }

        $totalPrice = $product['price'] * $quantity;

        $db = db_connect();
        $db->transStart();

        $productModel->update($productId, [
            'stock_quantity' => $product['stock_quantity'] - $quantity
        ]);

        $saleModel->insert([
            'product_id' => $productId,
            'customer_id' => $customerId ?: null,
            'sold_by' => session()->get('user_id'),
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'The sale could not be recorded.');
        }

        return redirect()->to('/sales')
            ->with('message', 'Sale recorded successfully.');
    }

    public function index()
    {
        $db = db_connect();

        $sales = $db->table('sales')
            ->select('sales.*, products.name AS product_name,
                    customers.full_name AS customer_name,
                    users.full_name AS staff_name')
            ->join('products', 'products.id = sales.product_id')
            ->join('customers', 'customers.id = sales.customer_id', 'left')
            ->join('users', 'users.id = sales.sold_by')
            ->orderBy('sales.created_at', 'DESC')
            ->get()
            ->getResultArray();

        return view('sales/index', [
            'sales' => $sales
        ]);
    }
}