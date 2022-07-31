
<?php
if(isLogin()){
    redirect('dashboard.php');
}

if(isset($_COOKIE['user_name']) &&!empty($_COOKIE['user_name']) && isset($_COOKIE['password']) &&!empty($_COOKIE['password'])){
	$user_name=$_COOKIE['user_name'];
	$password=$_COOKIE['password'];
	LogInCommon($user_name,$password);
}

 if($_POST)
 {
	 $user_name=$_POST['user_name'];
	 $password=md5($_POST['password']);
		LogInCommon($user_name,$password);
 }
