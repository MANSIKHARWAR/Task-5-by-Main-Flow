<?php include 'db.php'; ?>
<link rel="stylesheet" href="style.css">

<div class="edit-form">
    <h2>Add Product</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label>Category:</label>
            <input type="text" name="category" required>
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="text" name="price" required>
        </div>
        <div class="form-group">
            <label>Quantity:</label>
            <input type="text" name="quantity" required>
        </div>
        <div class="form-group">
            <label>Description:</label>
            <textarea name="description"></textarea>
        </div>
        <button type="submit" name="submit">Add Product</button>
    </form>
    <br>
    <a href="index.php" class="back-btn">← Back to Products List</a>
</div>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $sql = "INSERT INTO products (name, category, price, quantity, description) 
            VALUES ('$name', '$category', '$price', '$quantity', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Product added successfully'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
