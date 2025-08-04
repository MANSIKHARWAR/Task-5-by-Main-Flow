<?php include 'db.php'; ?>
<link rel="stylesheet" href="style.css">

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id=$id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $update = "UPDATE products SET name='$name', category='$category', price='$price', quantity='$quantity', description='$description' WHERE id=$id";
    if($conn->query($update) === TRUE){
        echo "<script>alert('Product Updated Successfully!'); window.location='index.php';</script>";
    } else {
        echo "Error updating record: ".$conn->error;
    }
}
?>

<div class="edit-form">
    <h2>Edit Product</h2>
    <form method="POST">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Category:</label>
            <input type="text" name="category" value="<?php echo $product['category']; ?>" required>
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="text" name="price" value="<?php echo $product['price']; ?>" required>
        </div>
        <div class="form-group">
            <label>Quantity:</label>
            <input type="text" name="quantity" value="<?php echo $product['quantity']; ?>" required>
        </div>
        <div class="form-group">
            <label>Description:</label>
            <textarea name="description"><?php echo $product['description']; ?></textarea>
        </div>
        <button type="submit" name="update">Update Product</button>
    </form>
    <br>
    <a href="index.php" class="back-btn">← Back</a>
</div>
