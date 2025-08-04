<?php
include 'db.php';
$id = $_GET['id'];

$sql = "DELETE FROM buyers WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Buyer deleted successfully'); window.location='buyers.php';</script>";
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
