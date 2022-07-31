<?php
 require_once('include/startup.php');
 require_once('lglib/query_lib.php');
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
				<!--<a href="user_add.php" class="btn btn-primary">Add User</a>   -->
        </div> 
      </div>
 <?php displayAlert(); ?>
 
 
 
     

 
      <div class="table-responsive">
        <table class="table table-striped table-sm">
	
          <thead>
            <tr>
              <th scope="col"><input type="checkbox" class="chk" onclick="$('.chk').prop('checked',$(this).is(':checked'));"></th>
              <th scope="col"><a href="query.php?sort=user_id&order=<?php  echo $order; ?><?php echo $page_url;?>">ID<?php if ($sort=='user_id') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?> </a></th>
              <th scope="col"><a href="query.php?sort=username&order=<?php  echo $order; ?><?php echo $page_url;?>">username<?php if ($sort=='username') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
              <th scope="col"><a href="query.php?sort=email&order=<?php  echo $order; ?><?php echo $page_url;?>">email<?php if ($sort=='email') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
              <th scope="col"><a href="query.php?sort=subject&order=<?php  echo $order; ?><?php echo $page_url;?>">Subject<?php if ($sort=='subject') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
            
              <th scope="col"><a href="query.php?sort=message&order=<?php  echo $order; ?><?php echo $page_url;?>">Message<?php if ($sort=='message') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
			  
              <th scope="col"><a href="query.php?sort=status&order=<?php  echo $order; ?><?php echo $page_url;?>">status<?php if ($sort=='status') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a></th>
              <th scope="col"><a href="query.php?sort=date_added&order=<?php  echo $order; ?><?php echo $page_url;?>">date<?php if ($sort=='date_added') {?><i class="fas fa-sort-<?php echo ($order=='ASC')?'down':'up';?>"></i><?php }?></a> </th>
              <th scope="col">Action</th>
	        </tr>
			<tr>
				<td></td>
				<td> <input type="text" size="1" name="filter_user_id" id="filter_user_id"	value="<?php echo $filter_user_id;?>" /> </td>
				<td> <input type="text" size="5" name="filter_username" id="filter_username"	value="<?php echo $filter_username;?>" /> </td>
				<td> <input type="text" size="5" name="filter_email" id="filter_email"	value="<?php echo $filter_email;?>" /> </td>
				
				<td> <input type="text" size="5" name="filter_subject" id="filter_subject"	value="<?php echo $filter_subject;?>" /> </td>
				<td> <input type="text" size="5" name="filter_message" id="filter_message"	value="<?php echo $filter_message;?>" /> </td>
				
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
          <td><?php echo $data_user['username']; ?></td>
          <td><?php echo $data_user['email']; ?></td>
          <td><?php echo $data_user['subject']; ?></td>
          <td><?php echo $data_user['message']; ?></td>
          <td><?php echo ($data_user['status'] == 1)?'Active':'Inactive'; ?></td>
          <td><?php echo $data_user['date_added']; ?></td>
          <td> <!--<a href="query_form.php ? user_id=<?php echo $data_user['user_id']; ?>" >Edit</a>  -->
		  |  
		  <a href="query.php?action=delete&user_id=<?php echo $data_user['user_id']; ?>" onclick="return confirm('Are you sure want to delete this?')" >Delete</a></td>                  
                            
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
					  <a class="page-link" href="query.php?page=<?php echo $page-1; ?><?php echo $sort_url;?>" >Previous</a></li>
				  <?php } else { ?>
				  <li class="page-item disabled">
				    <a class="page-link" href="javascrip:void(0);" >Previous</a>
					</li>
				  <?php } ?>
					

				<?php for($n = 1; $n <= ceil($total_user / $page_limit); $n++){ ?>	
				<li class="page-item <?php echo ($page == $n)?'active':'';?>"><a class="page-link" href="query.php?page=<?php echo $n; ?><?php echo $sort_url;?>"><?php echo $n; ?></a></li>
			<?php } ?>
				
					  <?php if($page<$n-1) { ?>
				  <li class="page-item ">
					  <a class="page-link" href="query.php?page=<?php echo $page+1; ?><?php echo $sort_url;?>" >Next</a></li>
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
		var filter_url='query.php?';
		$('.btnFilter').click(function(){
			var filter_user_id=$('#filter_user_id').val();
			
			if(filter_user_id !=''){
				filter_url+='&filter_user_id='+filter_user_id;
								 
			}
			var filter_username=$('#filter_username').val();
			if(filter_username !=''){
				filter_url+='&filter_username='+filter_username;
			}
			
			var filter_email=$('#filter_email').val();
			if(filter_email !=''){
				filter_url+='&filter_email='+filter_email;
			}
			
			// var filter_phone=$('#filter_phone').val();
			// if(filter_phone !=''){
				// filter_url+='&filter_phone='+filter_phone;
			// }
			
			var filter_subject=$('#filter_subject').val();
			if(filter_subject !=''){
				filter_url+='&filter_subject='+filter_subject;
			}
			
			var filter_status=$('#filter_status').val();
			if(filter_status !=''){
				filter_url+='&filter_status='+filter_status;
			}
			
			var filter_message=$('#filter_message').val();
			if(filter_message !=''){
				filter_url+='&filter_message='+filter_message;
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
 