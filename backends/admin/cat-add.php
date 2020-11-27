<?php

session_start();
try {

    if (!file_exists('../connection-pdo.php' ))
        throw new Exception();
    else
        require_once('../connection-pdo.php' ); 
		
} catch (Exception $e) {

	$_SESSION['msg'] = 'There were some problem in the Server! Try after some time!';

	header('location: ../../admin/category-list.php');

	exit();
	
}

if (!isset($_POST['name']) || !isset($_POST['short_desc']) || !isset($_POST['long_desc'])) {

	$_SESSION['msg'] = 'Invalid POST variable keys! Refresh the page!';

	header('location: ../../admin/category-list.php');

	exit();
}

$regex = '/^[(A-Z)?(a-z)?(0-9)?\-?\_?\.?\,?\s*]+$/';


if (!preg_match($regex, $_POST['name']) || !preg_match($regex, $_POST['short_desc']) || !preg_match($regex, $_POST['long_desc'])) {

	$_SESSION['msg'] = 'Whoa! Invalid Inputs!';

	header('location: ../../admin/category-list.php');

	exit();

} else {

	$name = $_POST['name'];
	$short_desc = $_POST['short_desc'];
	$long_desc = $_POST['long_desc'];
	$image="";
	$image_name=$_FILES['image']['name'];
	$image_type=$_FILES['image']['type'];
	$image_temp_name=$_FILES['image']['tmp_name'];
	$image_ext=explode('.',$image_name);
	$actual_ext=strtolower(end($image_ext));
	if ($_FILES['error']===0){
		echo "There Was An Error Uploading The Image Try Again";
	}else{
		$image_final_name=uniqid('',true).'.'.$actual_ext;
		$destination='../../images/'.$image_final_name;
		print_r( $image_temp_name);
		move_uploaded_file($image_temp_name,$destination);
		$image=$image_final_name;
	}


	$sql = "INSERT INTO categories(name,short_desc,long_desc,image) VALUES(?,?,?,?)";
    $query  = $pdoconn->prepare($sql);
    if ($query->execute([$name, $short_desc, $long_desc,$image])) {

    	$_SESSION['msg'] = 'Category Added!';

		header('location: ../../admin/category-list.php');
    	
    } else {

    	$_SESSION['msg'] = 'There were some problem in the server! Please try again after some time!';

		header('location: ../../admin/category-list.php');

    }


}