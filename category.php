<?php
 require_once('include/startup.php');
 require_once('lglib/category_lib.php');
?>
  <?php require_Once('dashbord/common/html_start.php'); ?>
  <?php require_Once('dashbord/common/custom_css.php'); ?> 
  <?php require_once('dashbord/common/body_start.php'); ?>
  <?php require_once('dashbord/common/header_.php'); ?>
 <?php require_once('dashbord/common/side_bar.php');  ?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<form method="post" action="">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $document_title;?></h1>
        <div >
          
				<input type="submit" value="Delete" class="btn btn-danger" name="btnDelete" onclick="return confirm('Are you want to delete this?');" />
				<a href="category_form.php" class="btn btn-primary">Add Category</a>
        </div>
      </div>
 <?php displayAlert(); ?>
 
 
 
     

 
      <div class="table-responsive"> 	
        <table class="table table-striped table-sm table-bordered" >
	
          <thead>
            <tr>
			<th scope="col"><input type="checkbox" class="chk" onclick="$('.chk').prop('checked',$(this).is(':checked'));"></th>
             <th>Category_ID</th>
             <th>Category_Name</th>
             <th>Parent_ID</th>
             <th>Sort</th>
             <th>Status</th>
             <th>Date_added</th>
             <th>Action</th>
			</tr>
          </thead>
		  <tbody>
		  <?php makeCategory(0);?> 
		  </tbody>




        </table>
		
				
			
				</li>
			  </ul>
			</nav>
		
      </div>
	  </form>
    </main>
  </div>
</div>
 
<script src="jquery-3.6.0.min.js"></script>
 <?php require_Once('dashbord/common/script_html.php'); ?>
 <?php require_Once('dashbord/common/end_html.php');?>
 
 
 
 
 
 
 
 
 
 
 
<?php 
 /*          <tbody>
		  <?php foreach($data_cate as $data_cates) { ?>
		  <tr>
		  <td><input type="checkbox" name="category_ids[]"value="<?php echo $data_cates['category_id']; ?>" class="chk"/></td>
			<td>  <?php echo $data_cates['category_id']; ?> </td>
			<?php makeCategory(0);?> 
			<td>  <?php echo $data_cates['parent_id']; ?> </td>
			<td>  <?php echo $data_cates['sort']; ?> </td>
			<td>  <?php echo ( $data_cates['status'] == 1 )?'Active':'Inactive'; ?> </td>
			<td>  <?php echo $data_cates['date_added']; ?> </td>
			<td><a href="category_form.php ? category_id=<?php echo $data_cates['category_id']; ?>" >Edit</a>
		  |  
		  <a href="category.php?action=delete&category_id=<?php echo $data_cates['category_id']; ?>" onclick="return confirm('Are you sure want to delete this?')" >Delete</a></td>                  
                 
			</tr>
		  <?php } ?>
		
          </tbody> */