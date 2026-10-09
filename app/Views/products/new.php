<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<h1>Add Cookie Product</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="<?= site_url('/products') ?>" method="post" enctype="multipart/form-data">

    <?= csrf_field() ?>

    <label>Cookie Name:</label><br>
    <input type="text" name="name" value="<?= old('name') ?>"><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" step="0.01" value="<?= old('price') ?>"><br><br>

    <label>Stock Quantity:</label><br>
    <input type="number" name="stock_quantity" min="0" value="<?= old('stock_quantity') ?>"><br><br>

    <label>Cookie Image:</label><br>
    <input type="file" name="image" accept=".jpg,.jpeg,.png"><br><br>

    <button type="submit">Save Product</button>
</form>

<br>

<a href="<?= site_url('/products') ?>">Back to Products</a>

</body>
</html>