<?php helper(['form', 'url']); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Edit User</h1>

    <form
        method="post"
        action="<?= site_url('/users/update/' . $user['id']) ?>"
        enctype="multipart/form-data"
    >
        <?= csrf_field() ?>

        <label>Username:</label>
        <input
            type="text"
            name="username"
            value="<?= old('username', $user['username']) ?>"
        >
        <?= validation_show_error('username') ?>
        <br><br>

        <label>Full Name:</label>
        <input
            type="text"
            name="full_name"
            value="<?= old('full_name', $user['full_name']) ?>"
        >
        <?= validation_show_error('full_name') ?>
        <br><br>

        <label>Profile Picture:</label>
        <input
            type="file"
            name="avatar"
            accept=".jpg,.jpeg,.png"
        >
        <?= validation_show_error('avatar') ?>
        <br><br>

        <?php if (! empty($user['avatar'])): ?>
            <p>Current Profile Picture:</p>
            <img
                src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>"
                width="150"
                alt="Current profile picture"
            >
            <br><br>
        <?php endif; ?>

        <button type="submit">Update User</button>
    </form>

    <br>

    <a href="<?= site_url('/users') ?>">Back to Users</a>
</body>
</html>