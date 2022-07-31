<?php

checkAdminLogin(); 
$document_title = 'Course';

$sql="SELECT * FROM products ";
$rs = mysqli_query($con, $sql);

 $data_product=array();
 if(mysqli_num_rows($rs)){
	while( $res= mysqli_fetch_assoc($rs)){
		$data_product[] = $res;
	}
 } 
 

if($_POST){
    if(isset($_POST['product_ids']) && !empty($_POST['product_ids'])){
        foreach($_POST['product_ids'] as $product_id){
            deleteUser($product_id);
        }
        addAlert('success', 'User deleted successfully!');
        redirect('course.php');
    }else{
        addAlert('warning', 'Please select atleast 1 record!');
    }
}







if(isset($_GET['action']) && !empty($_GET['action'])){
	
	$action=$_GET['action'];
	switch($action){
		case 'delete':
		if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
			$product_id=$_GET['product_id'];
			deleteUser($product_id);
			addAlert('success', 'User deleted successfully!');
            redirect('course.php');

		}
		break;
		
	}
	
	
}

 
	function deleteUser($product_id){
	global $con; 
	if($product_id != 1){
		
	$sql="DELETE FROM products WHERE product_id='".$product_id."'";
	mysqli_query($con,$sql);
	}else{
		addAlert('warning', 'You don\'t delete this!');
        redirect('course.php');
	}
}