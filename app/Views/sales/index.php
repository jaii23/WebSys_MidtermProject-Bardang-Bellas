<!DOCTYPE html>
<html>
<head>
    <title>Sales History</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<h1>Sales History</h1>

<a href="<?= base_url('sales/new') ?>">Record Sale</a> |
<a href="<?= base_url('products') ?>">Products</a> |
<a href="<?= base_url('customers') ?>">Customers</a> |
<a href="<?= base_url('users') ?>">Users</a> |
<a href="<?= base_url('logout') ?>">Logout</a>

<hr>

<?php if (session()->getFlashdata('message')): ?>
    <p style="color: green;">
        <?= esc(session()->getFlashdata('message')) ?>
    </p>
<?php endif; ?>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Customer</th>
        <th>Staff Member</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Date</th>
    </tr>

    <?php foreach ($sales as $sale): ?>
        <tr>
            <td><?= esc($sale['id']) ?></td>
            <td><?= esc($sale['product_name']) ?></td>
            <td>
                <?= esc($sale['customer_name'] ?? 'Walk-in Customer') ?>
            </td>
            <td><?= esc($sale['staff_name']) ?></td>
            <td><?= esc($sale['quantity']) ?></td>
            <td>₱<?= number_format($sale['total_price'], 2) ?></td>
            <td><?= esc($sale['created_at']) ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>