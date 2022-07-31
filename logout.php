<?php
require_once('include/startup.php');
unset($_SESSION['admin_User']);
setcookie('user_name',$user_name, time()-60*60*24*10);
setcookie('password',$password, time()-60*60*24*10);
		
redirect('lg.php');