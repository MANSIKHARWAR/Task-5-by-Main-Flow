<?php include 'db.php'; ?>
<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Buyer Management</h2>
    
    <!-- Search Bar -->
    <form method="GET" action="" style="margin-bottom:20px; display:flex; gap:10px;">
        <input type="text" name="search" placeholder="Search by name or location" value="<?php echo $_GET['search'] ?? ''; ?>">
        <button type="submit">Search</button>
        <a href="buyers.php" class="back-btn">Clear</a>
    </form>
    
    <!-- Add New Buyer -->
    <a href="add_buyer.php" class="back-btn">+ Add New Buyer</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php
        $search = $_GET['search'] ?? '';
        $sql = "SELECT * FROM buyers WHERE name LIKE '%$search%' OR location LIKE '%$search%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['location']."</td>
                        <td>
                            <a href='edit_buyer.php?id=".$row['id']."'>Edit</a> | 
                            <a href='delete_buyer.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No buyers found</td></tr>";
        }
        ?>
    </table>
</div>
