<?php helper('url'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Customer Accounts</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('about') ?>">About</a> |
        <a href="<?= site_url('customers') ?>">Customers</a> |
        <a href="<?= site_url('users') ?>">Users</a>
    </nav>

    <br>

    <a href="<?= site_url('/customers/new') ?>">Add New Customer</a>

    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>

        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['full_name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone']) ?></td>
                <td>
                    <a href="<?= site_url('/customers/edit/' . $customer['id']) ?>">
                        Edit
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>