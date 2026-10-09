<!DOCTYPE html>
<html>
<head>
    <title>Record Sale</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<h1>Record Cookie Sale</h1>

<?php if (session()->getFlashdata('error')): ?>
    <p style="color: red;">
        <?= esc(session()->getFlashdata('error')) ?>
    </p>
<?php endif; ?>

<form action="<?= base_url('sales') ?>" method="post">

    <?= csrf_field() ?>

    <label>Cookie Product:</label><br>
    <select name="product_id" required>
        <option value="">Select a product</option>

        <?php foreach ($products as $product): ?>
            <option value="<?= $product['id'] ?>">
                <?= esc($product['name']) ?>
                - ₱<?= number_format($product['price'], 2) ?>
                - Stock: <?= $product['stock_quantity'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Customer:</label><br>
    <select name="customer_id">
        <option value="">Walk-in Customer</option>

        <?php foreach ($customers as $customer): ?>
            <option value="<?= $customer['id'] ?>">
                <?= esc($customer['full_name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <label>Quantity:</label><br>
    <input type="number" name="quantity" min="1" required>

    <br><br>

    <button type="submit">Record Sale</button>
</form>

<br>

<a href="<?= base_url('products') ?>">Back to Products</a>

</body>
</html>