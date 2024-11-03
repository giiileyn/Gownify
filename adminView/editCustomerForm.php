<div class="container p-5">
    <h4>Edit Customer Detail</h4>
    <?php
        include_once "../config/dbconnect.php";
        $users_id = $_POST['record'];
        $kweri = mysqli_query($conn, "SELECT * FROM users WHERE users_id = '$users_id'");
        
        // Fetch the data and assign it to $row
        $row = mysqli_fetch_assoc($kweri);
        
        if (!$row) {
            // Handle the case where the category is not found
            echo "Customer not found.";
            exit();
        }
    ?>
    <form id="updateCustomer" onsubmit="updateCustomer()">
        <div class="form-group">
            <input type="text" class="form-control" id="users_id" value="<?=$row['users_id']?>" hidden>
        </div>
        <div class="form-group">
            <label for="name">New Full Name:</label>
            <input type="text" class="form-control" id="fname" value="<?=$row['fname']?>" required>
        </div>
        <div class="form-group">
            <label for="email">New Email:</label>
            <input type="email" class="form-control" id="email" value="<?=$row['email']?>" required>
        </div>
        <div class="form-group">
            <label for="phone_number">New Phone Number:</label>
            <input type="number" class="form-control" id="phone_number" value="<?=$row['phone_number']?>" required>
        </div>
        <div class="form-group">
            <label for="complte_address">New Complete Address:</label>
            <input type="text" class="form-control" id="complete_address" value="<?=$row['complete_address']?>" required>
        </div>

        <div class="form-group">
            <button type="submit" style="height:40px" class="btn btn-primary">Update Customer</button>
        </div>
    </form>
</div>
