<?php

checkAdminLogin(); 
$document_title = 'Instructors';

$sql="SELECT * FROM instructor ";
$rs = mysqli_query($con, $sql);

 $data_instructors=array();
 if(mysqli_num_rows($rs)){
	while( $res= mysqli_fetch_assoc($rs)){
		$data_instructors[] = $res;
	}
 } 
 

if($_POST){
    if(isset($_POST['instructor_id']) && !empty($_POST['instructor_id'])){
        foreach($_POST['instructor_id'] as $instructor_id){
            deleteUser($instructor_id);
        }
        addAlert('success', 'Instructor deleted successfully!');
        redirect('instructor.php');
    }else{
        addAlert('warning', 'Please select atleast 1 record!');
    }
}

if(isset($_GET['action']) && !empty($_GET['action'])){
	$action=$_GET['action'];
	switch($action){
		case 'delete':{
			if(isset($_GET['instructor_id']) && !empty($_GET['instructor_id'])){
				$instructor_id=$_GET['instructor_id'];
				deleteUser($instructor_id);
					addAlert('success', 'Instructor deleted successfully!');
				redirect('instructor.php');
			}
		}
		break;
	}
	
}

function deleteUser($instructor_id){
	global $con; 
	if($user_id != 1){
	$sql="DELETE FROM instructor WHERE instructor_id='".$instructor_id."'";
	mysqli_query($con,$sql);
	}else{
		addAlert('warning', 'You don\'t delete this!');
        redirect('instructor.php');
	}
}
 
	