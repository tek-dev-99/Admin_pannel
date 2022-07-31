<?php
$con=mysqli_connect('localhost','root','','logindb');
if(!$con){
	
	echo 'Error: Database connection failed!';
	die;
}
if($_POST){
	
		$a=$_POST['t1'];
		$b=$_POST['t2'];
		$c=$_POST['t3'];
		$d=$_POST['pwd1'];
		$e=$_POST['r1'];
		
	$sql="INSERT INTO signtb(Fname,Lname,Email,Password,Gender)values('".$a."','".$b."','".$c."','".md5($d)."','".$e."')";

 
 $res=mysqli_query($con , $sql);
 {
 if($res==true)
	 {
	echo "<script>alert('Reocrd Saved Sucessfully')</script>";
	
	header("Location:lg.php");
}
else
echo "<script> alert(' User already Registered')</script>";
 }
}
?>


<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>SignUp!</title>
	<link type="text/css" rel="stylesheet" href="css/lg.css"/>
  </head>

<body class="main-bg">
        <div class="login-container text-c animated flipInX">
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                </div>
                    <h3 class="text-whitesmoke">Sign Up</h3>
                    
                <div class="container-content">
                    <form class="margin-t" method="post" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="t1" placeholder="Fist Name" required="">
                        </div>
						<div class="form-group">
                            <input type="text" class="form-control" name="t2" placeholder="Last Name" required="">
                        </div>
                        <div class="form-group">
                            <input type="Email" class="form-control"  name="t3" placeholder="Email or Mobile Number" required="">
                        </div>
						
						<div class="form-group">
                            <input type="password" class="form-control" name="pwd1" placeholder="Password" required="">
                        </div>
						<div class="form-group">
                            <input type="password" class="form-control" placeholder="Confirm Password" required="">
                        </div>
						
						<div class="form-group">
                            <input type="radio" name="r1" value="Male" class="mx-2 "><span class="text-whitesmoke">Male</span>
							<input type="radio" name="r1" value="Female" class="mx-2"><span class="text-whitesmoke">Female</span>
							<input type="radio" name="r1" value="transgender" class="mx-2"><span class="text-whitesmoke">Other</span>
							
                        </div>
                        <button type="submit" class="form-button button-l margin-b" name="bt1">Sign Up</button>
        
                        <a class="text-darkyellow" href="#"><small>Forgot your password?</small></a>
                        <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
                        <a class="text-darkyellow" href="lg.php"><small>Sign In</small></a>
                    </form>
       
                </div>
            </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
	

</body>