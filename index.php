<?php
 
 require_once('include/startup.php');
 require_once('lglib/lglib.php');


?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>SignUp!</title>
	<link type="text/css" rel="stylesheet" href="css/lg.css"/>
	<style>
		
	</style>
  </head>

<body class="main-bg">




        <div class="login-container text-c animated flipInX">
                <div>
                    <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
                </div>
                    <h3 class="text-whitesmoke">Sign In </h3>
                    
					<?php displayAlert(); ?>
                <div class="container-content">
                    <form class="margin-t" method="post" action="">
                        <div class="form-group">
                            <input type="text" name="user_name" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control" placeholder="*****" >
							<i id="eye" class="fa fa-eye"></i>
                        </div>
						<div class="form-group">
                            <input type="checkbox"  value="remember_me" name="remember_me"><span class="text-whitesmoke p-1">Remember me</span>
                        </div>
                       
						
						<button type="submit" class="form-button button-l mb-2" name="bt1">Sign In</button>
        
                        <a class="text-darkyellow" href="#"><small>Forgot your password?</small></a>
                        <p class="text-whitesmoke text-center"><small>Do not have an account?</small></p>
                        <a class="text-darkyellow" href="sign1.php"><small>Sign Up</small></a>
                    </form>
       
                </div>
            </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>

     
    $('#eye').click(function(){
        if($('#password').prop('type') == 'password'){
            $(this).addClass('fa-eye-slash');
            $('#password').attr('type','text')
        }
        else {
            $(this).removeClass('fa-eye-slash');
            $('#password').attr('type','password');
        }
    });

</script>
</body>