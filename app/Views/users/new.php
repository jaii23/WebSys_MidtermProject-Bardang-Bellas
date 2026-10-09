<?php helper(['form', 'url']); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Add New User</h1>

    <form method="post" action="<?= site_url('/users') ?>">
        <?= csrf_field() ?>

        <label>Username:</label>
        <input
            type="text"
            name="username"
            value="<?= old('username') ?>"
        >
        <?= validation_show_error('username') ?>
        <br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required>
        <br><br>

        <label>Full Name:</label>
        <input
            type="text"
            name="full_name"
            value="<?= old('full_name') ?>"
        >
        <?= validation_show_error('full_name') ?>
        <br><br>

        <button type="submit">Add User</button>
    </form>

    <br>

    <a href="<?= site_url('/users') ?>">Back to Users</a>
</body>
</html>