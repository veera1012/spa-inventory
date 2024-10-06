<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $supplier = $_POST['supplier'];

    // Update product details
    $sql = "UPDATE products SET product_name='$product_name', category='$category', quantity=$quantity, price=$price, supplier='$supplier' WHERE product_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully!";
        header("Location: index.php");
    } else {
        echo "Error updating product: " . $conn->error;
    }
} else {
    echo "Invalid request!";
}
?>
