<?php include 'db.php'; ?>
<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Product Management</h2>
    
    <!-- Search Bar -->
    <form method="GET" action="" style="margin-bottom:20px; display:flex; gap:10px;">
        <input type="text" name="search" placeholder="Search by name or category" value="<?php echo $_GET['search'] ?? ''; ?>">
        <button type="submit">Search</button>
        <a href="index.php" class="back-btn">Clear</a>
    </form>
    
    <!-- Add New Product -->
    <a href="add_product.php" class="back-btn">+ Add New Product</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        $search = $_GET['search'] ?? '';
        $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR category LIKE '%$search%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['category']."</td>
                        <td>".$row['price']."</td>
                        <td>".$row['quantity']."</td>
                        <td>".$row['description']."</td>
                        <td>
                            <a href='edit.php?id=".$row['id']."'>Edit</a> | 
                            <a href='delete_product.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No products found</td></tr>";
        }
        ?>
    </table>
</div>
