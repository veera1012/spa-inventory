<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the product from the database
    $sql = "DELETE FROM products WHERE product_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully!";
        header("Location: index.php");
    } else {
        echo "Error deleting product: " . $conn->error;
    }
} else {
    echo "Invalid request!";
}
?>
