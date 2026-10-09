<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

    <h1>Login</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;">
            <?= session()->getFlashdata('error') ?>
        </p>
    <?php endif; ?>

    <form action="<?= base_url('login') ?>" method="post">
        <?= csrf_field() ?>

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>

        <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>

        <br><br>

        <button type="submit">Login</button>
    </form>

</body>
</html>