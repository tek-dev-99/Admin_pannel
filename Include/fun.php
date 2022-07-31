<?php
function redirect($url){
	
	header ("Location:" .$url);
	die;
}

function checkAdminLogin(){
	if(!isset($_SESSION['admin_User']) || empty($_SESSION['admin_User'])){
		header("Location: lg.php");
        die;		
	}
}

function isLogin(){
    if(!isset($_SESSION['admin_User']) || empty($_SESSION['admin_User'])){
        return false;
    }
    return true;
}

 function addAlert($type,$msg)
  {
	  $_SESSION['alert']['type']=$type;
	  $_SESSION['alert']['msg']=$msg;
  }
  

  function displayAlert()  {
					 if(isset($_SESSION['alert']) && !empty($_SESSION['alert'])){ ?>
					<div class="alert alert-<?php echo $_SESSION['alert']['type']; ?> alert-dismissible fade show" role="alert">
					<?php echo $_SESSION['alert']['msg']; ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
					</div>
					 <?php unset($_SESSION['alert']);} 
					 
  
  } 
  
  
  function LogInCommon($user_name,$password){
	  global $con;
	  	 $sql="SELECT * FROM user_form WHERE user_name='".$user_name."' AND  password='".$password."'";

	 $res=mysqli_query($con , $sql);
	 
	   

	 if (mysqli_num_rows($res))
 {
	 $rs=mysqli_fetch_assoc($res);
		$_SESSION['admin_User']=$rs;
		if(isset($_POST['remember_me']) && !empty ($_POST['remember_me'])){
			setcookie('user_name',$user_name, time()+60*60*24*10);
			setcookie('password',$password, time()+60*60*24*10);
		}
	
	redirect('dashboard.php');
	 }
	 else{
	 $_SESSION['alert']['type']='danger';
	 $_SESSION['alert']['msg']='Incorrect Login Details';
	redirect('lg.php');
	 }
  }
 

  
  