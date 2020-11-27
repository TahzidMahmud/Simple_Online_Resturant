<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>


<?php

require('../backends/connection-pdo.php');

$sql = 'SELECT orders.order_id, orders.user_name, orders.timestamp,orders.bill,orders.quantity,orders.status,food.fname FROM orders LEFT JOIN food ON orders.food_id = food.id';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);



?>
						

<div class="section white-text" style="background: #B35458;">

	<div class="section">
		<h3>Orders</h3>
	</div>

  <?php

    if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
        <div class="col s12">
            <h6>'.$_SESSION['msg'].'</h6>
            </div>
        </div></div>';
        unset($_SESSION['msg']);
    }

    ?>
	
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
              <th>Order ID</th>
              <th>User Name</th>
              <th>Food Name</th>
              <th>Bill</th>
              <th>Quantity</th>
              <th>Timestamp</th>
              <th>Status</th>
              <th>Action</th>
             
          </tr>
        </thead>

        <tbody>
          <?php

            foreach ($arr_all as $key) {

          ?>
          <tr>
            <td><?php echo $key['order_id']; ?></td>
            <td><?php echo $key['user_name']; ?></td>
            <td><?php echo $key['fname']; ?></td>
            <td><?php echo $key['bill']; ?></td>
            <td><?php echo $key['quantity']; ?></td>
            <td><?php echo $key['timestamp']; ?></td>
            <td ><?php echo $key['status']; ?></td>
            <?php
              $temp =  $key['status']; 
              if($temp != "delivered") { 
              ?>

                <!-- <td><input style="display:none;" value="<?php echo $key['order_id']; ?>" id="submit" ><label class="btn" onclick="update_status()" for="submit">Done ?</label></td> -->
                <td><a href="../admin/order-list-update.php?id=<?php echo $key['order_id']; ?>" class="btn">Done ?</a><td>

              <?php
              } else { 
              ?>
                    <td><span>No-Action</span></td>

              <?php
              }
              ?>
           
          </tr>

          <?php } ?>
         
        </tbody>
      </table>
	</div>
</div>




  


<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>