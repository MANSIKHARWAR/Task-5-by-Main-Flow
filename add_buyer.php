<?php include 'db.php'; ?>
<link rel="stylesheet" href="style.css">

<div class="edit-form">
    <h2>Add Buyer</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" required>
        </div>
        <button type="submit" name="submit">Add Buyer</button>
    </form>
    <br>
    <a href="buyers.php" class="back-btn">← Back to Buyers List</a>
</div>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $location = $_POST['location'];

    $sql = "INSERT INTO buyers (name, email, location) VALUES ('$name', '$email', '$location')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Buyer added successfully'); window.location='buyers.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
