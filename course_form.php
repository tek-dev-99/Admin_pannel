<?php
 require_once('include/startup.php');
 require_once('lglib/course_form_lib.php');

?>
  <?php require_Once('dashbord/common/html_start.php'); ?>
  <?php require_Once('dashbord/common/custom_css.php'); ?> 
  <?php require_once('dashbord/common/body_start.php'); ?>
  <?php require_once('dashbord/common/header_.php'); ?>
 <?php require_once('dashbord/common/side_bar.php');  ?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $document_title;?></h1>
			
          

				<a href="course.php" >Back</a>
        
      </div>
	    <?php displayAlert(); ?>

 <form  method="POST" action="" enctype="multipart/form-data" >
  <div class="mb-3">
    <label for="product_name" class="form-label">Course_Name</label>
    <input type="text" name="product_name" id="product_name" class="	form-control"  value="<?php echo $product_name; ?>"  >
     </div>
	 
		<div class="mb-3">
    <label for="photo" class="form-label">Photo</label>
	
	<?php if (!empty($photo)){?>
	<img src="../product_photo/<?php echo $photo;?>" width="100px" class="img-thumbnail m-3"/>
	<?php } ?>
	<input type="file" id="photo" name="photo" class="form-control" >
   </div>
   





   <div class="additional_images" > </div>
   
   <div class="mb-3 mt-2">
   	<input type="button" value="Add More...." class="btn btn-success  btnAdd" id="btnAdd" name="btnAdd"  />
   </div>	
		
  <div class="mb-3">
    <label for="product_price" class="form-label">Course_Price</label>
	<input type="text" name="product_price" id="product_price" class="form-control"  value="<?php echo $product_price; ?>" >		
  </div> 
  <div class="mb-3">
    <label for="duration" class="form-label">Course_duration</label>
	<input type="text" name="duration" id="duration" class="form-control"  value="<?php echo $duration; ?>" >		
  </div> 
  
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>


	<textarea  rows="3"  name="description" id="description" class="form-control"  > <?php echo $description; ?></textarea>		
  </div> 
  
   
   
	 <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch"  name="status"   id="status" <?php echo ($status == 1)?'checked':''?>>
  <label class="form-check-label" name="status" for="flexSwitchCheckDefault">Active</label>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>


<script src="CKEDITOR/ckeditor.js"></script>
<script src="jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$('#btnAdd').click(function (){
	var html='<div class="mb-3"><label for="photo" class="form-label">Additional Photos</label><input type="file" class="form-control" name="additional_photos[]" /></div>';
	$('.additional_images').append(html);
});


CKEDITOR.replace('description');

</script>

      
 <?php require_Once('dashbord/common/script_html.php'); ?>
 <?php require_Once('dashbord/common/end_html.php'); ?>