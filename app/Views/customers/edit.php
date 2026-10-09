<?php helper(['form', 'url']); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Edit Customer</h1>

    <form method="post" action="<?= site_url('/customers/update/' . $customer['id']) ?>">
        <?= csrf_field() ?>

        <label>Full Name:</label>
        <input
            type="text"
            name="full_name"
            value="<?= old('full_name', $customer['full_name']) ?>"
        >
        <?= validation_show_error('full_name') ?>
        <br><br>

        <label>Email:</label>
        <input
            type="email"
            name="email"
            value="<?= old('email', $customer['email']) ?>"
        >
        <?= validation_show_error('email') ?>
        <br><br>

        <label>Phone:</label>
        <input
            type="text"
            name="phone"
            value="<?= old('phone', $customer['phone']) ?>"
        >
        <?= validation_show_error('phone') ?>
        <br><br>

        <button type="submit">Update Customer</button>
    </form>

    <br>

    <a href="<?= site_url('/customers') ?>">Back to Customers</a>
</body>
</html>