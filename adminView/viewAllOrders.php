<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>I.D.</th>
        <th>Customer</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Item Name</th>
        <th> Price </th>
        <th>Quantity</th>
        <th>Total Price</th>
     
        <!-- <th>Total Price</th> -->
        <!-- <th>OrderDate</th> -->
        <!-- <th>Payment Method</th> -->
        <!-- <th></th> -->
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>Action</th>
     </tr>
    </thead>
     <?php
      include_once "../config/dbconnect.php";
      $sql = "SELECT 
      io.item_id,
      io.Item_Name,
      io.Price,
      io.Quantity,
      u.fname,
      u.email,
      u.phone_number,
      io.pay_status,
      io.order_status,
      u.complete_address
  FROM 
      item_order io
  JOIN 
      users u ON io.users_id = u.users_id";
  

      $result=$conn-> query($sql);
      
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
          $totalPrice = $row["Price"] * $row["Quantity"];
    ?>
       <tr>
          <td><?=$row["item_id"]?></td>
          <td><?=$row["fname"]?></td>
          <td><?=$row["phone_number"]?></td>
          <td><?=$row["complete_address"]?></td>
          <td><?=$row["Item_Name"]?></td>
          <td>₱<?=$row["Price"]?></td>
          <td><?=$row["Quantity"]?></td>
          <td>₱<?=number_format($totalPrice, 2)?></td> 
          <!-- <td><?=$row[""]?></td> -->
          <!-- <td><?=$row["pay_status"]?></td> -->
           <?php 
                if($row["pay_status"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangePay('<?=$row['item_id']?>')">Unpaid </button></td>
            <?php
                        
                }else if ($row["pay_status"]==1){
            ?>
                <td><button class="btn btn-success" onclick="ChangePay('<?=$row['item_id']?>')">Paid</button></td>
              
            <?php
            }
                if($row["order_status"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangeOrderStatus('<?=$row['item_id']?>')">Pending</button></td>
            <?php
                        
            }else if($row["order_status"]==1){
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$row['item_id']?>')">Delivered </button></td>
            <?php
                }
            ?>
              <td><button class="btn btn-danger" style="height:40px"  onclick="orderDetailsDelete('<?=$row['item_id']?>')">Delete</button></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>

</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="customer_manage-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.customer_manage-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>