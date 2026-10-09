<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<h1>Products</h1>

<a href="<?= base_url('products/new') ?>">Add a Product</a> |
<a href="<?= base_url('customers') ?>">Customers</a> |
<a href="<?= base_url('users') ?>">Users</a> |
<a href="<?= base_url('logout') ?>">Logout</a>

<hr>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Stock Quantity</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= esc($product['id']) ?></td>

            <td>
                <?php if (! empty($product['image'])): ?>
                    <img
                        src="<?= base_url('uploads/products/' . $product['image']) ?>"
                        width="100"
                        alt="<?= esc($product['name']) ?>"
                    >
                <?php else: ?>
                    No image
                <?php endif; ?>
            </td>

            <td><?= esc($product['name']) ?></td>
            <td>₱<?= number_format($product['price'], 2) ?></td>
            <td><?= esc($product['stock_quantity']) ?></td>

            <td>
                <a href="<?= base_url('products/edit/' . $product['id']) ?>">
                    Edit  
                </a> |

                <a href="<?= base_url('products/delete/' . $product['id']) ?>"
                   onclick="return confirm('Are you sure you want to delete this product?')">
                    Delete
                </a> |

                <a href="<?= base_url('sales/new') ?>">Record Sale</a> |
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>