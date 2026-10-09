<?php helper('url'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>POS System</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Welcome to our Cookies' POS System</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('about') ?>">About</a> |
        <a href="<?= base_url('products') ?>">Products</a> |
        <a href="<?= site_url('customers') ?>">Customers</a> |
        <a href="<?= site_url('users') ?>">Users</a> | 
        <a href="<?= base_url('logout') ?>">  Logout</a>
    </nav>

    <p><br>Welcome to our Cookies' POS System!<br>
     This is a simple point of sale system for a cookie shop.<br> 
      This project demonstrates routing, controllers, views, and CRUD in CodeIgniter.

    </p>
</body>
</html>