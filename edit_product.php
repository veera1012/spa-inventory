<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the product details based on the ID
    $sql = "SELECT * FROM products WHERE product_id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit();
    }
} else {
    echo "Invalid request!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Edit Product</h1>

        <!-- Form to Update Product -->
        <form action="update_product.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required>
            <input type="text" name="category" value="<?php echo $product['category']; ?>">
            <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required>
            <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
            <input type="text" name="supplier" value="<?php echo $product['supplier']; ?>">
            <input type="submit" value="Update Product">
        </form>
    </div>

</body>
</html>
