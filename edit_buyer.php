<?php include 'db.php'; ?>
<link rel="stylesheet" href="style.css">

<?php
$id = $_GET['id'];
$sql = "SELECT * FROM buyers WHERE id=$id";
$result = $conn->query($sql);
$buyer = $result->fetch_assoc();

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $location = $_POST['location'];

    $update = "UPDATE buyers SET name='$name', email='$email', location='$location' WHERE id=$id";
    if($conn->query($update) === TRUE){
        echo "<script>alert('Buyer Updated Successfully!'); window.location='buyers.php';</script>";
    } else {
        echo "Error updating record: ".$conn->error;
    }
}
?>

<div class="edit-form">
    <h2>Edit Buyer</h2>
    <form method="POST">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $buyer['name']; ?>" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $buyer['email']; ?>" required>
        </div>
        <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" value="<?php echo $buyer['location']; ?>" required>
        </div>
        <button type="submit" name="update">Update Buyer</button>
    </form>
    <br>
    <a href="buyers.php" class="back-btn">← Back</a>
</div>
