<?php
 require_once('include/startup.php');
 require_once('lglib/instructor_form_lib.php');

?>
  <?php require_Once('dashbord/common/html_start.php'); ?>
  <?php require_Once('dashbord/common/custom_css.php'); ?> 
  <?php require_once('dashbord/common/body_start.php'); ?>
  <?php require_once('dashbord/common/header_.php'); ?>
 <?php require_once('dashbord/common/side_bar.php');  ?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $document_title;?></h1>
			
          

				<a href="instructor.php" >Back</a>
        
      </div>
	    <?php displayAlert(); ?>

 <form  method="POST" action="" enctype="multipart/form-data" >
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" id="name" class=" form-control" value="<?php echo $name ?>"  >
     </div>
	 
		<div class="mb-3">
    <label for="photo" class="form-label">Photo</label>
	
	<?php if (!empty($photo)){?>
	<img src="../product_photo/<?php echo $photo;?>" width="100px" class="img-thumbnail m-3"/>
	<?php } ?>
	<input type="file" id="photo" name="photo" class="form-control" >
   </div>
   

	<?php if(sizeof($additional_photo)){?>
	<table class="table table-border table-sm">
	<tr>
	<th>ID</th>
	<th>Image</th>
	<th>Dated</th>
	<th>Action</th>
	</tr>


	<?php foreach( $additional_photo as $additional_photos_1) { ?>
	<tr>
	<td><?php echo  $additional_photos_1['instructor_id']; ?> </td>
	<td> <?php if(!empty($additional_photos_1['filename'])){?>
	<img src="../product_photo/<?php echo $additional_photos_1['filename'];?>" width="100px" class="img-thumbnail m-3"/>
	<?php } ?>  </td>
	<td><?php echo  $additional_photos_1['date_added']; ?> </td>
	<td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
	</tr>
	<?php } ?>
	
	</table>
	<?php } ?>


   <div class="additional_images" > </div>
   
   <div class="mb-3 mt-2">
   	<input type="button" value="Add More...." class="btn btn-success  btnAdd" id="btnAdd" name="btnAdd"  />
   </div>	
		
  
   <div class="mb-3">
    <label for="designation" class="form-label">Designation</label>
    <input type="text" name="designation" id="designation" class=" form-control" value="<?php echo $designation ?>"  >
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