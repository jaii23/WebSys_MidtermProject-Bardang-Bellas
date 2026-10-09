<?php helper('url'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>User Accounts</h1>

    <nav>
        <a href="<?= site_url('/') ?>">Home</a> |
        <a href="<?= site_url('about') ?>">About</a> |
        <a href="<?= site_url('customers') ?>">Customers</a> |
        <a href="<?= site_url('users') ?>">Users</a>
    </nav>

    <br>

    <a href="<?= site_url('/users/new') ?>">Add New User</a>

    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>Avatar</th>
            <th>Username</th>
            <th>Full Name</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <?php
                $avatar = ! empty($user['avatar'])
                    ? $user['avatar']
                    : 'avatar.jpeg';
            ?>

            <tr>
                <td>
                    <img
                        src="<?= base_url('uploads/avatars/' . $avatar) ?>"
                        width="100"
                        height="100"
                        alt="User avatar"
                    >
                </td>

                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
                <td><?= esc($user['created_at']) ?></td>

                <td>
                    <a href="<?= site_url('/users/edit/' . $user['id']) ?>">
                        Edit
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>