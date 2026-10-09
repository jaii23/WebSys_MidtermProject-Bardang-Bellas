<?php helper('url'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>About</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>About the POS System</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('about') ?>">About</a> |
        <a href="<?= site_url('customers') ?>">Customers</a> |
        <a href="<?= site_url('users') ?>">Users</a> |
        <a href="<?= base_url('products') ?>">Products</a>
    </nav>

    <p>
    This is the About page of our Cookies' POS System. <br>
    This system helps manage cookie products, stock quantities, customers,
    staff accounts, and sales transactions. <br>
    It was developed using CodeIgniter 4 with database management,
    validation, authentication, and image uploads.
</p>
        
    </p>
</body>
</html>