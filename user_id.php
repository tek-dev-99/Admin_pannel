<?php
 require_once('include/startup.php');
 require_once('lglib/userlib.php');
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
				<a href="user_add.php" class="btn btn-primary">Add User</a>
        </div>
      </div>
 <?php displayAlert(); ?>
 
 
 
     

 
      <div class="table-responsive">
        <table class="table table-striped table-sm">
	
          <thead>
            <tr>
              <th scope="col"><input type="checkbox" class="chk" onclick="$('.chk').prop('checked',$(this).is(':checked'));"></th>
              <th scope="col"><a href="user_id.php?sort=user_id&order=<?php  echo $order; ?><?php echo $page_url;?>">ID<?php if ($sort=='user_id') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?> </a></th>
              <th scope="col"><a href="user_id.php?sort=user_name&order=<?php  echo $order; ?><?php echo $page_url;?>">username<?php if ($sort=='user_name') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
              <th scope="col"><a href="user_id.php?sort=email&order=<?php  echo $order; ?><?php echo $page_url;?>">email<?php if ($sort=='email') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
              <th scope="col"><a href="user_id.php?sort=phone&order=<?php  echo $order; ?><?php echo $page_url;?>">phone<?php if ($sort=='phone') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
            
              <th scope="col"><a href="user_id.php?sort=full_name&order=<?php  echo $order; ?><?php echo $page_url;?>">full_name<?php if ($sort=='full_name') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
			  <th scope="col"><a href="user_id.php?sort=photo&order=<?php  echo $order; ?><?php echo $page_url;?>">Photo<?php if ($sort=='photo') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
              <th scope="col"><a href="user_id.php?sort=status&order=<?php  echo $order; ?><?php echo $page_url;?>">status<?php if ($sort=='status') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
              <th scope="col"><a href="user_id.php?sort=date&order=<?php  echo $order; ?><?php echo $page_url;?>">date<?php if ($sort=='date') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a> </th>
              <th scope="col">Action</th>
	        </tr>
			<tr>
				<td></td>
				<td> <input type="text" size="1" name="filter_user_id" id="filter_user_id"	value="<?php echo $filter_user_id;?>" /> </td>
				<td> <input type="text" size="5" name="filter_user_name" id="filter_user_name"	value="<?php echo $filter_user_name;?>" /> </td>
				<td> <input type="text" size="5" name="filter_email" id="filter_email"	value="<?php echo $filter_email;?>" /> </td>
				<td> <input type="text" size="5" name="filter_phone" id="filter_phone"	value="<?php echo $filter_phone;?>" /> </td>
				<td> <input type="text" size="5" name="filter_full_name" id="filter_full_name"	value="<?php echo $filter_full_name;?>" /> </td>
				<td> <input type="text" size="5" name="filter_photo" id="filter_photo"	value="<?php echo $filter_photo;?>" /> </td>
				<td><select name="filter_status" id="filter_status">
				<option value="">All</option>
				<option value="0" <?php echo ($filter_status  ==  0)?'selected':'';?> >Inactive</option>
				<option value="1" <?php echo ($filter_status  == 1)?'selected':'';?>>Active</option>
				
				</select></td> 
				
				<td><input type="date" size="5" name="filter_date" id="filter_date" value="<?php echo $filter_date; ?>" /></td>
					
					<td><button type="button" class="btn btn-info btn-sm btnFilter">Filter</button></td>
			</tr>
          </thead>
          <tbody>
		<?php if(sizeof($data_users)) { ?>
		<?php foreach($data_users as $data_user){ ?>
		 
            <tr>
		  <td><input type="checkbox" name="user_ids[]"value="<?php echo $data_user['user_id']; ?>" class="chk"/></td>
		  <td><?php echo $data_user['user_id']; ?></td>
          <td><?php echo $data_user['user_name']; ?></td>
          <td><?php echo $data_user['email']; ?></td>
          <td><?php echo $data_user['phone']; ?></td>
          <td><?php echo $data_user['full_name']; ?></td>
		  <td> <?php if (!empty($data_user['photo'])){?>  <img src="../upload/<?php echo $data_user['photo']; ?>" width="30px" class="img-thumbnail m-0 "/>  <?php } ?></td>
          <td><?php echo ($data_user['status'] == 1)?'Active':'Inactive'; ?></td>
          <td><?php echo $data_user['date']; ?></td>
          <td><a href="user_add.php ? user_id=<?php echo $data_user['user_id']; ?>" >Edit</a>
		  |  
		  <a href="user_id.php?action=delete&user_id=<?php echo $data_user['user_id']; ?>" onclick="return confirm('Are you sure want to delete this?')" >Delete</a></td>                  
                            
            </tr>
		<?php  } ?>
		<?php } else {  ?>
		<tr> <td colspan="12" class="text-center text-danger">No record found!</td>
		</tr>
		<?php } ?>
          </tbody>
        </table>
		<?php if($total_user>$page_limit){ ?>
			<nav aria-label="...">
				<ul class="pagination ">
				  
				  <?php if($page>1) { ?>
				  <li class="page-item ">
					  <a class="page-link" href="user_id.php?page=<?php echo $page-1; ?><?php echo $sort_url;?>" >Previous</a></li>
				  <?php } else { ?>
				  <li class="page-item disabled">
				    <a class="page-link" href="javascrip:void(0);" >Previous</a>
					</li>
				  <?php } ?>
					

				<?php for($n = 1; $n <= ceil($total_user / $page_limit); $n++){ ?>	
				<li class="page-item <?php echo ($page == $n)?'active':'';?>"><a class="page-link" href="user_id.php?page=<?php echo $n; ?><?php echo $sort_url;?>"><?php echo $n; ?></a></li>
			<?php } ?>
				
					  <?php if($page<$n-1) { ?>
				  <li class="page-item ">
					  <a class="page-link" href="user_id.php?page=<?php echo $page+1; ?><?php echo $sort_url;?>" >Next</a></li>
				  <?php } else { ?>
				  <li class="page-item disabled">
				    <a class="page-link" href="javascrip:void(0);" >Next</a>
					</li>
				  <?php } ?>
				
			
				</li>
			  </ul>
			</nav>
		<?php }  ?>
      </div>
	  </form>
    </main>
  </div>
</div>
<script src="jquery-3.6.0.min.js"></script>

<script type="text/javascript">
		var filter_url='user_id.php?';
		$('.btnFilter').click(function(){
			var filter_user_id=$('#filter_user_id').val();
			
			if(filter_user_id !=''){
				filter_url+='&filter_user_id='+filter_user_id;
								 
			}
			var filter_user_name=$('#filter_user_name').val();
			if(filter_user_name !=''){
				filter_url+='&filter_user_name='+filter_user_name;
			}
			
			var filter_email=$('#filter_email').val();
			if(filter_email !=''){
				filter_url+='&filter_email='+filter_email;
			}
			
			var filter_phone=$('#filter_phone').val();
			if(filter_phone !=''){
				filter_url+='&filter_phone='+filter_phone;
			}
			
			var filter_full_name=$('#filter_full_name').val();
			if(filter_full_name !=''){
				filter_url+='&filter_full_name='+filter_full_name;
			}
			
			var filter_status=$('#filter_status').val();
			if(filter_status !=''){
				filter_url+='&filter_status='+filter_status;
			}
			
			var filter_photo=$('#filter_photo').val();
			if(filter_photo !=''){
				filter_url+='&filter_photo='+filter_photo;
			}
			
			var filter_date=$('#filter_date').val();
			if(filter_date !=''){
				filter_url+='&filter_date='+filter_date;
			}
			
				
			
						
		
			window.location.href = filter_url;
		});
		
		
</script> 

 <?php require_Once('dashbord/common/script_html.php'); ?>
 <?php require_Once('dashbord/common/end_html.php');?>
 