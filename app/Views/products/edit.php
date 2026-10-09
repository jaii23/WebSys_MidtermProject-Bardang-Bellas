<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>

<h1>Edit Cookie Product</h1>

<form action="<?= site_url('/products/update/' . $product['id']) ?>"
      method="post"
      enctype="multipart/form-data">

    <?= csrf_field() ?>

    <label>Cookie Name:</label><br>
    <input type="text" name="name"
           value="<?= old('name', $product['name']) ?>"><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" step="0.01"
           value="<?= old('price', $product['price']) ?>"><br><br>

    <label>Stock Quantity:</label><br>
    <input type="number" name="stock_quantity" min="0"
           value="<?= old('stock_quantity', $product['stock_quantity']) ?>"><br><br>

    <label>Replace Image:</label><br>
    <input type="file" name="image" accept=".jpg,.jpeg,.png"><br><br>

    <?php if (! empty($product['image'])): ?>
        <p>Current image:</p>
        <img src="<?= base_url('uploads/products/' . $product['image']) ?>"
             width="100">
        <br><br>
    <?php endif; ?>

    <button type="submit">Update Product</button>
</form>

<br>

<a href="<?= site_url('/products') ?>">Back to Products</a>

</body>
</html>