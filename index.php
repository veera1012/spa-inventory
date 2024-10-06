<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spa Inventory Management</title>
    <link rel="stylesheet" href="style.css">  <!-- Link to your CSS file -->
</head>
<body>

    <div class="container">
        <h1>Spa Inventory Management System</h1>

        <!-- Form to Add New Product -->
        <form action="add_product.php" method="POST">
            <input type="text" name="product_name" placeholder="Product Name" required>
            <input type="text" name="category" placeholder="Category">
            <input type="number" name="quantity" placeholder="Quantity" required>
            <input type="number" step="0.01" name="price" placeholder="Price" required>
            <input type="text" name="supplier" placeholder="Supplier">
            <input type="submit" value="Add Product">
        </form>

        <!-- Display the products from the database -->
        <?php
        include 'db.php';

        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        echo "<h2>Spa Inventory</h2>";
        echo "<table border='1'>
        <tr>
            <th>Product Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Supplier</th>
            <th>Actions</th>
        </tr>";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row['product_name'] . "</td>
                <td>" . $row['category'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td>" . $row['price'] . "</td>
                <td>" . $row['supplier'] . "</td>
                <td>
                    <a href='edit_product.php?id=" . $row['product_id'] . "'>Edit</a> |
                    <a href='delete_product.php?id=" . $row['product_id'] . "' onclick='return confirm(\"Are you sure you want to delete this product?\");'>Delete</a>
                </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No products found.</td></tr>";
        }

        echo "</table>";
        ?>
    </div>

</body>
</html>
