<?php

checkAdminLogin(); 
$document_title = 'Testimonial';

$sql="SELECT * FROM testimonial  ";
$rs = mysqli_query($con, $sql);

 $data_testimonials=array();
 if(mysqli_num_rows($rs)){
	while( $res= mysqli_fetch_assoc($rs)){
		$data_testimonials[] = $res;
	}
 } 
 

if($_POST){
    if(isset($_POST['student_id']) && !empty($_POST['student_id'])){
        foreach($_POST['student_id'] as $student_id){
            deleteUser($student_id);
        }
        addAlert('success', 'Testimonial deleted successfully!');
        redirect('testimonial.php');
    }else{
        addAlert('warning', 'Please select atleast 1 record!');
    }
}

if(isset($_GET['action']) && !empty($_GET['action'])){
	$action=$_GET['action'];
	switch($action){
		case 'delete':{
			if(isset($_GET['student_id']) && !empty($_GET['student_id'])){
				$student_id=$_GET['student_id'];
				deleteUser($student_id);
					addAlert('success', 'Instructor deleted successfully!');
				redirect('testimonial.php');
			}
		}
		break;
	}
	
}

function deleteUser($student_id){
	global $con; 
	if($student_id != 1){
	$sql="DELETE FROM testimonial WHERE student_id='".$student_id."'";
	mysqli_query($con,$sql);
	}else{
		addAlert('warning', 'You don\'t delete this!');
        redirect('testimonial.php');
	}
}
 
	