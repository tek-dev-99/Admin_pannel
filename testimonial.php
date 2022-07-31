<?php
 require_once('include/startup.php');
 require_once('lglib/testimonial_lib.php');
 
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
				<a href="testimonial_form.php" class="btn btn-primary">Add Testimonial</a>
        </div>
      </div>
 <?php displayAlert(); ?>
 
 
 
     

 
      <div class="table-responsive"> 	
        <table class="table table-striped table-sm">
	
          <thead>
            <tr>
			<th scope="col"><input type="checkbox"  onclick="$('.chk').prop('checked',$(this).is(':checked'));" /> </th>
             <th>ID</th>
             <th>Studen_Name</th>
             <th>Photo</th>
			 <th>Profession</th>
			 <th>Description</th>
             <th>Status</th>
             <th>Date_added</th>
             <th>Action</th>
			</tr>
          </thead>
          <tbody>
		  <?php foreach($data_testimonials as $data_testimonial) { ?>
		  <tr>
		  <td><input type="checkbox" name="student_id[]" value="<?php echo $data_testimonial['student_id']; ?>" class="chk"/></td>
		  
		  	<td>  <?php echo $data_testimonial['student_id']; ?> </td>
			<td>  <?php echo $data_testimonial['name']; ?> </td>
			
			<td>
			<?php if (!empty($data_testimonial['photo'])){?>  <img src="../product_photo/<?php echo $data_testimonial['photo']; ?>" width="30px" class="img-thumbnail m-0 "/>  <?php } ?> </td>
			<td>  <?php echo $data_testimonial['profession']; ?> </td>
			<td>  <?php echo $data_testimonial['description']; ?> </td>
			<td>  <?php echo ( $data_testimonial['status'] == 1 )?'Active':'Inactive'; ?> </td>
			<td>  <?php echo  $data_testimonial['date_added']; ?> </td>
			<td><a href="testimonial_form.php ? student_id=<?php echo $data_testimonial['student_id']; ?>" >Edit</a>
		  |  
		  <a href="testimonial.php?action=delete&student_id=<?php echo $data_testimonial['student_id']; ?>" onclick="return confirm('Are you sure want to delete this?')" >Delete</a></td>                  
                 
			</tr>
		  <?php } ?>
		
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
 