<?php
 require_once('include/startup.php');
 require_once('lglib/user_formlib.php');
?>
  <?php require_Once('dashbord/common/html_start.php'); ?>
  <?php require_Once('dashbord/common/custom_css.php'); ?> 
  <?php require_once('dashbord/common/body_start.php'); ?>
  <?php require_once('dashbord/common/header_.php'); ?>
 <?php require_once('dashbord/common/side_bar.php');  ?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $document_title;?></h1>
			
          

				<a href="user_id.php" >Back</a>
        
      </div>
	    <?php displayAlert(); ?>

 <form  method="POST" action="" id="f1" name="frm" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="user_name"  id="user_name" class="form-control"   value="<?php echo $user_name; ?>">
     </div>
  <div class="mb-3">
    <label for="password1" class="form-label">Password</label>
    <input type="password" name="password"  id="password" class="form-control" value="<?php echo $password; ?>" >
  </div> 
  <div class="mb-3">
    <label for="confirmpassword1" class="form-label">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" >
  </div>
  <div class="mb-3">
    <label for="email1" class="form-label">Email address</label>
    <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>" >
     </div>
	 <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" name="phone" id="phone" class="form-control"value="<?php echo $phone; ?>"  >
     </div>
	 <div class="mb-3">
    <label for="fullname" class="form-label">Full Name</label>
    <input type="text" name="full_name" id="full_name" class="form-control" value="<?php echo $full_name; ?>" >
     </div>
	 
	 <div class="mb-3">
    <label for="photo" class="form-label">Photo</label>
	<?php if (!empty($photo)){?>
	<img src="../upload/<?php echo $photo;?>" width="100px" class="img-thumbnail m-3"/>
	<?php } ?>
	
    <input type="file"  name="photo" class="form-control" >
	</div>
	
	<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" <?php echo ($status == 1)?'checked':''?>>
  <label class="form-check-label" name="status" for="flexSwitchCheckDefault">Active</label>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>


<script src="jquery-3.6.0.min.js"></script>
<script src="jquery.validate.js"></script>
<script>
$('#frm').click(function(){
	
});
</script>
     

      
 <?php require_Once('dashbord/common/script_html.php'); ?>
 <?php require_Once('dashbord/common/end_html.php');?>