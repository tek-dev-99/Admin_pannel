<?php

checkAdminLogin();

$document_title = 'Add User';
$user_id=0;
$user_name='';
$password='';
$confirm_password='';
$email='';
$phone='';
$photo='';
$full_name='';
$status=0;

$old_photo='';


if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
	$user_id = $_GET['user_id'];
	$document_title='Edit User: '.$user_id ;
	$user_data=getUser($user_id);
	if($user_data){
	$user_name = $user_data['user_name'];
    $email = $user_data['email'];
    $phone = $user_data['phone'];
    $full_name = $user_data['full_name'];
    $photo = $user_data['photo'];
    
   
    $status = $user_data['status'];
		
	}
	else{
        addAlert('danger', 'User ID not found!');
        redirect('user_id.php');
    }
		}

	


if($_POST){
	if(isset($_POST['user_name']) && !empty($_POST['user_name']) && isset($_POST['full_name']) && !empty($_POST['full_name'])){
		
		$user_name=$_POST['user_name'];
		$password=$_POST['password'];
		$confirm_password=$_POST['confirm_password'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$full_name=$_POST['full_name'];
		$status=(isset($_POST['status']))?1:0;

		if(!alreadyExist($user_name, $user_id)){
			if($confirm_password == $password)
							
			{  
					$new_photo = uploadFile();
			if($new_photo){
				
				if(!empty ($photo)){
					 unlink('../upload/'.$photo);
					
				}
				$photo = $new_photo ;
				
			}
			
				 
					
				if($user_id){
					
		       $sql = "UPDATE user_form SET user_name='". $user_name ."', email='". $email ."', phone='". $phone ."', full_name='". $full_name ."', photo='". $photo ."', status='" .(int)$status ."'  WHERE  user_id='". $user_id ."'";
				
			
			 addAlert('success','User Update successfully!');
			 
			 if(!empty($password)){
				 
				 $sql_pass="UPDATE user_form SET password='".md5($password)."' WHERE user_id='".$user_id."' ";
			  mysqli_query($con,$sql_pass);
			}
			 } 
				
		else{		
		$sql = "INSERT user_form SET user_name='".$user_name ."', password='".md5($password )."',
		email='". $email ."', phone='". $phone ."', full_name='". $full_name ."', photo ='". $photo ."' , status='".(int)$status ."'";
		  
		addAlert('success','User added successfully!');
		
		}
	  
       	mysqli_query($con,$sql); 
       redirect('user_id.php');			
		}
		
		else {  
			addAlert('danger','Confirm password not match!');
			}
			
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
	
	function alreadyExist($user_name,$user_id){
    global $con; 
    $sql = "SELECT * FROM user_form WHERE user_name='". $user_name ."' AND user_id!='".$user_id."'";
    $rs = mysqli_query($con, $sql);

    if(mysqli_num_rows($rs)){
        return true;
    }
    return false;
}

		
	
function getUser($user_id){
    global $con;
    $sql = "SELECT * FROM user_form WHERE user_id='".(int)$user_id ."'";
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

