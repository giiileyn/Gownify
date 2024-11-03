<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>
    <script type="text/javascript" src="./assets/js/script.js"></script>
</head>
<body>
<div>
    <h2>All Customers</h2>
    <table class="table">
        <thead>
            <tr>
                <th class="text-center">I.D.</th>
                <th class="text-center">Username </th>
                <th class="text-center">Email</th>
                <th class="text-center">Contact</th>
                <th class="text-center">Address</th>
                <th class="text-center" colspan="2">Action</th>
            </tr>
        </thead>
        <?php

           include_once "../config/dbconnect.php";

        $sql = "SELECT * FROM users WHERE usertype = 'user'";

        $result = $conn->query($sql);
        $count = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        ?>
                <tr>
                    <td><?= $count ?></td>
                    <td><?= $row["username"] ?></td>
                    <td><?= $row["email"] ?></td>
                    <td><?= $row["phone_number"] ?></td>
                    <td><?= $row["complete_address"] ?></td>
                    <td><button class="btn btn-danger" style="height:40px"  onclick="customerDelete('<?=$row['users_id']?>')">Delete</button></td>
                    <td><button class="btn btn-primary" style="height:40px"  onclick="editCustomerForm('<?=$row['users_id']?>')">Edit</button></td>
                    
                    
                   
                </tr>
        <?php
                $count = $count + 1;
            }
        }
        ?>
    </table>
</div>
</body>
</html>
