
<?php

require('backends/connection-pdo.php');


if (isset($_REQUEST['id'])) {

	$sql = 'SELECT * FROM food WHERE cat_id = "'.$_REQUEST['id'].'"';
	
} else {

	$sql = 'SELECT * FROM food';

}

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

$id=Null;



?>


<section class="fcategories">

	<div class="container">


	 <!-- Modal -->
	 <!-- Modal Trigger -->
 

  <!-- Order Model -->
 <div class="row">
 <div id="modal-order" class="modal col s8 m8">
  <form action="backends/order-food.php" type="post">
    <div class="modal-content">
		<div class="row">
		
			<div class=" col s6">
			<label class="active col s8 m8 offset-m4 offset-s4" for="quantity">Put The Quantity</label><br>
			<label id="decrease" onclick="decrease()" class="btn col m3 s3 flow-text"> - Decrease</label><input  class="col m6 s6" id="quantity" name="quantity" type="number" readonly onchange="calculate()" class="validate"><label id="increase" onclick="increase()" class="btn col m3 s3 flow-text"> +  Increase</label><br>
			<span class="col m12 s12">Total Price(in $):</span><input type="number" id="total" name="total" readonly>
			<input id="food_id" name="food_id" type="hidden" >
			</div>
		</div>
    </div>
    <div class="modal-footer">
      <button type="submit" class="modal-close waves-effect waves-green btn" style="background: #564D80; margin-left:auto;margin-right:auto;">Place Order</button>
    </div>
	</form>
  </div>
 </div>
  <!--End Order Modal-->
 



		<?php

			if (isset($_SESSION['msg'])) {
				echo '<div class="section pink center" style="margin: 10px; padding: 3px 10px; margin-top: 35px; border: 2px solid black; border-radius: 5px; color: white;">
						<p><b>'.$_SESSION['msg'].'</b></p>
					</div>';

				unset($_SESSION['msg']);
			}
		?>

		<div class="section white center">
			<h3 class="header">Foods Area!</h3>
		</div>

		<?php if (count($arr_all) == 0) {
	echo '<div class="section gray center" style="border: 1px solid black; border-radius: 5px;">
			<p class="header">Sorry No Categories to Display!</p>
		</div>';
} else {  ?>

<?php for ($i=1; $i <= count($arr_all); ) { ?>
		
		<div class="row">
			
			<?php for ($j=1; $j <= 3; $j++) { ?>


				<?php if ($i+$j-2 == count($arr_all)) {
					break;
				}  ?>

			<div class="col s12 m4">
				<div class="card">
				    <div class="card-image waves-effect waves-block waves-light">
				      <img class="activator responsive-img" style="max-height:25vh;min-height:25vh;width:100%;" src="<?php echo $arr_all[$i+$j-2]['image']; ?>">
				    </div>
				    <div class="card-content">
				      <span class="card-title activator grey-text text-darken-4"><a class="black-text" href=""><?php echo $arr_all[$i+$j-2]['fname']; ?></a><i class="material-icons right">more_vert</i></span>
					  <p><?php echo $arr_all[$i+$j-2]['description']; ?></p>
						<div class="row">
						<p class="col s12 m6 offset-s7 offset-m8" ><span >Price:  </span><?php echo $arr_all[$i+$j-2]['price']; ?>$</p>
						</div>
				      <div class="">
					  
			       
			        </div>
					
			        <div class="card-content center"> 
					  <button style="background: #564D80; margin-left:auto;margin-right:auto;" data-target="modal-order" onclick="orderFunction(<?php echo $arr_all[$i+$j-2]['id']; ?> ,<?php echo $arr_all[$i+$j-2]['price']; ?>)" class="btn modal-trigger">Order Now!</button>
					
			        </div>
				    </div>
				    <div class="card-reveal">
				      <span class="card-title grey-text text-darken-4"><?php echo $arr_all[$i+$j-2]['fname']; ?><i class="material-icons right">close</i></span>
				      <p><?php echo $arr_all[$i+$j-2]['long_description']; ?></p>
				    </div>
				  </div>
			</div>

			<?php } ?>

			<?php $i = $i + 3; ?>


		</div>

		<?php
				}
			} 
		?>




	</div>
	
</section>