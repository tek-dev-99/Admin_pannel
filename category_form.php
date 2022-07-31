<?php
 require_once('include/startup.php');
 require_once('lglib/cate_form_lib.php');

?>
  <?php require_Once('dashbord/common/html_start.php'); ?>
  <?php require_Once('dashbord/common/custom_css.php'); ?> 
  <?php require_once('dashbord/common/body_start.php'); ?>
  <?php require_once('dashbord/common/header_.php'); ?>
 <?php require_once('dashbord/common/side_bar.php');  ?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $document_title;?></h1>
			
          

				<a href="category.php" >Back</a>
        
      </div>
	    <?php displayAlert(); ?>

 <form  method="POST" action="" enctype="multipart/form-data"  >
  <div class="mb-3">
    <label for="category_name" class="form-label">Category_name</label>
    <input type="text" name="category_name" id="category_name" class="form-control"   value="<?php echo $category_name; ?>" >
     </div>
  <div class="mb-3">
    <label for="parent_id" class="form-label">Parent_id</label>
	
	<select name="parent_id" id="parent_id" class="form-control">
		<option value="0">Top Most Parent</option>
		            
<?php makeCategory(0,$parent_id, $category_id); ?>

			  
			 

	</select>
	
  </div> 
  
  
  <div class="mb-3">
    <label for="sort" class="form-label">Sort</label>
    <input type="number" name="sort" id="sort" class="form-control" value="<?php echo $sort; ?>" >
  </div>

	 <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch"  name="status"   id="status" >
  <label class="form-check-label" name="status" for="flexSwitchCheckDefault">Active</label>
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
<script type="text/javascript">
 $('select[name="parent_id"]').val('<?php echo $parent_id; ?>');
</script>

<script src="jquery-3.6.0.min.js"></script>
<script src="jquery.validate.js"></script>

      
 <?php require_Once('dashbord/common/script_html.php'); ?>
 <?php require_Once('dashbord/common/end_html.php');?>