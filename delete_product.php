<?php
include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Product deleted successfully'); window.location='index.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
