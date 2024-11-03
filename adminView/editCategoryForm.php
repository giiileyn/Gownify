<div class="container p-5">
    <h4>Edit Category Detail</h4>
    <?php
        include_once "../config/dbconnect.php";
        $id = $_POST['record'];
        $kweri = mysqli_query($conn, "SELECT * FROM category WHERE category_id = '$id'");
        
        // Fetch the data and assign it to $row
        $row = mysqli_fetch_assoc($kweri);
        
        if (!$row) {
            // Handle the case where the category is not found
            echo "Category not found.";
            exit();
        }
    ?>
    <form id="update-Category" onsubmit="updateCategory()">
        <div class="form-group">
            <input type="text" class="form-control" id="category_id" value="<?=$row['category_id']?>" hidden>
        </div>
        <div class="form-group">
            <label for="name">New Category Name:</label>
            <input type="text" class="form-control" id="c_name" value="<?=$row['category_name']?>" required>
        </div>
        <div class="form-group">
            <button type="submit" style="height:40px" class="btn btn-primary">Update Category</button>
        </div>
    </form>
</div>
