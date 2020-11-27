<?php

require('../backends/connection-pdo.php');

$id=$_REQUEST['id'];

$sql = "UPDATE orders SET status = 'delivered' WHERE order_id='".$id."'" ;
$query  = $pdoconn->prepare($sql);
$query->execute();

header('location: ./order-list.php');

	



?>