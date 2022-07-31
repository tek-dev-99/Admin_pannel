<?php

checkAdminLogin();

$document_title = 'Add User';
$user_id=0;
$name='';

$email='';
$phone='';
$photo='';
$msg='';
$status=0;

$old_photo='';


if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
	$user_id = $_GET['user_id'];
	$document_title='Edit Query: '.$user_id ;
	$user_data=getUser($user_id);
	if($user_data){
	$name = $user_data['username'];
    $email = $user_data['email'];
    $subject = $user_data['subject'];
  
    $message = $user_data['message'];
	   
    $status = $user_data['status'];
		
	}
	else{
        addAlert('danger', 'User ID not found!');
        redirect('query.php');
    }
		}

	


if($_POST){
	if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['message']) && !empty($_POST['message'])){
		
		$name=$_POST['username'];
		// $password=$_POST['password'];
		// $confirm_password=$_POST['confirm_password'];
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message'];
		$status=(isset($_POST['status']))?1:0;

		if(!alreadyExist($name, $user_id)){
			 
				
			
				 
					
				if($user_id){
					
		       $sql = "UPDATE query SET username='". $name ."', email='". $email ."', subject='". $subject ."', message='". $message ."',  status='" .(int)$status ."'  WHERE  user_id='". $user_id ."'";
			
			 addAlert('success','User Update successfully!');
			 
			 // if(!empty($password)){
				 
				 // $sql_pass="UPDATE user_form SET password='".md5($password)."' WHERE user_id='".$user_id."' ";
			  // mysqli_query($con,$sql_pass);
			// }
			 } 
				
		else{		
		$sql = "INSERT user_form SET user_name='".$user_name ."', password='".md5($password )."',
		email='". $email ."', phone='". $phone ."', full_name='". $full_name ."', photo ='". $photo ."' , status='".(int)$status ."'";
		  
		addAlert('success','User added successfully!');
		
		}
	  
       	mysqli_query($con,$sql); 
       redirect('query.php');			
		
			
		}
		else{
			addAlert('danger','Username already Exists');
		}
	
		
	}

		else
		{
		addAlert('danger','Incomplete form data!');
		}
	
}
	
	function alreadyExist($name,$user_id){
    global $con; 
    $sql = "SELECT * FROM query WHERE username='". $name ."' AND user_id!='".$user_id."'";
    $rs = mysqli_query($con, $sql);

    if(mysqli_num_rows($rs)){
        return true;
    }
    return false;
}

		
	
function getUser($user_id){
    global $con;
    $sql = "SELECT * FROM query WHERE user_id='".(int)$user_id ."'";
    $rs = mysqli_query($con, $sql);
    $rec = array();
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
    }

    return $rec;
}


function uploadFile(){
	if (isset($_FILES['photo']['name']) && !empty ($_FILES['photo']['name'])){
		$filename=time().'_'.$_FILES['photo']['name'];
		$src=$_FILES['photo']['tmp_name'];

		(copy ($src,'../upload/'.$filename));	
		 return $filename;
 
	} 
	else{
		return false;
	}
}

