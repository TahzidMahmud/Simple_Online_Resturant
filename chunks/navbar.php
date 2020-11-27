<section class="fnavbar">
		<div class="navbar-fixed">
		<nav class="row" name="contact-banner">
			<div class="nav-wrapper" style="background-color:#564D80!important;margin-bottom:50px!important;">
			<div class="" style="display:flex;justify-content:space-between;">
			<ul class="col s6" >
					
					<li style="display:flex;justify-content:flex-between;margin-right:10px;" ><i style="margin-right:10px;" class="tiny material-icons" >call</i>01630526907 </li>
					<li  style="display:flex;justify-content:flex-between;"><i style="margin-right:10px;" class="tiny material-icons" >email</i> sabbirahmed5869@gmail.com</li>
				</ul>
			<ul  class="col s6" style="margin-left:auto!important;display:flex;justify-content:flex-end;" >
					<li><a class="grey-text text-lighten-3"  href="https://www.facebook.com"><i class="fa fa-facebook-square" ></i></a></li>
					<li><a class="grey-text text-lighten-3" " href="https://www.instagram.com/"><i class="fa fa-instagram" ></i></a></li>
					<li><a class="grey-text text-lighten-3" " href="https://twitter.com/"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
					<li><a class="grey-text text-lighten-3" " href="https://web.whatsapp.com/"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>
			</ul>
			
			</div>
		     
		    </div>
		</nav><br><br><p></p>
		<nav>
		    <div class="nav-wrapper" style="background-color:#56B747;">
		      <a href="#" class="brand-logo">Take Away</a>
		      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
		      <ul class="right hide-on-med-and-down">
		        <li><a href="/Take_Away" class="hvr-grow">Home</a></li>
		        <li><a href="food-categories.php" class="hvr-grow">Categories</a></li>
		        <li><a href="foods.php" class="hvr-grow">Foods</a></li>
				<li><a href="about-take-away.php" class="hvr-grow">About Us</a></li>
		        <li><a href="#" class="hvr-grow" onclick="toggleModal('Contact Info', 'You can contact us directly by Mailing at This Mail-address: sabbirahmed5869@gmail.com . Check the bottom Footer Section of the website for more info.');">Contact</a></li>
		        
		        <?php

		        	if (isset($_SESSION['user'])) {
		        		echo '<li><a href="#" class="hvr-grow">Hi, '.$_SESSION['user'].'</a></li>
		        		<li><a href="logout.php" class="hvr-grow">Logout</a></li>';
		        	} else {
		        		echo '<li><a href="#" class="hvr-grow modal-trigger" data-target="modal1">Login</a></li>
		        		<li><a href="#" class="hvr-grow modal-trigger" data-target="modal2">Register</a></li>';
		        	}

		        ?>
		        
		      </ul>
		    </div>
		</nav>
		</div>

		  <ul class="sidenav" id="mobile-demo">
		    <li><a href="/Take_Away">Home</a></li>
	        <li><a href="food-categories.php">Categories</a></li>
	        <li><a href="foods.php">Foods</a></li>
			<li><a href="about-take-away.php">About Us</a></li>
	        <li><a href="#" onclick="toggleModal('Contact Info', 'You can contact us directly by Mailing at This Mail-address: sabbirahmed5869@gmail.com. Check the bottom Footer Section of the website for more info.');">Contact</a></li>

	        <?php

		        	if (isset($_SESSION['user'])) {
		        		echo '<li><a href="#">Hi, '.$_SESSION['user'].'</a></li>
		        		<li><a href="logout.php">Logout</a></li>';
		        	} else {
		        		echo '<li><a href="#" class="modal-trigger" data-target="modal1">Login</a></li>
		        		<li><a href="#" class="modal-trigger" data-target="modal2">Register</a></li>';
		        	}

		        ?>
		  </ul>
	</section>