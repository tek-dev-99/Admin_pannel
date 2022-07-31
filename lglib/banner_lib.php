<?php

checkAdminLogin(); 
$document_title = 'Banner';

$sql="SELECT * FROM banner ";
$rs = mysqli_query($con, $sql);

 $data_product=array();
 if(mysqli_num_rows($rs)){
	while( $res= mysqli_fetch_assoc($rs)){
		$data_product[] = $res;
	}
 } 
 

if($_POST){
    if(isset($_POST['banner_id']) && !empty($_POST['banner_id'])){
        foreach($_POST['banner_id'] as $banner){
            deleteUser($banner);
        }
        addAlert('success', 'User deleted successfully!');
        redirect('banner.php');
    }else{
        addAlert('warning', 'Please select atleast 1 record!');
    }
}
function deleteUser($banner){
	global $con; 
	if($user_id != 1){
	$sql="DELETE FROM banner WHERE banner_id='".$banner."'";
	mysqli_query($con,$sql);
	}else{
		addAlert('warning', 'You don\'t delete this!');
        redirect('banner.php');
	}
}
 
	