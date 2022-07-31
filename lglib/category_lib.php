<?php

checkAdminLogin(); 
$document_title = 'Category';
$parent_id=''; 
$category_id='';

 
 if($_POST){
	 
	    if(isset($_POST['category_ids']) && !empty($_POST['category_ids'])){
        foreach($_POST['category_ids'] as $category_id){
            deleteCatagory($category_id);
        }
        addAlert('success', 'Category deleted successfully!');
        redirect('category.php');
    }else{
        addAlert('warning', 'Please select atleast 1 record!');
    }
}



		function makeCategory($parent_id, $selected_id =  0, $except_id=0){
			$data_category = getCategories($parent_id);
		foreach($data_category as $data_categorys){
		
			
			if($except_id !=$data_categorys['category_id']){
		echo '<tr><td><input type="checkbox" name="category_ids[]" value="'. $data_categorys['category_id'] .'"class="chk"></td><td>'.$data_categorys['category_id']. '</td><td>' .getParents($data_categorys['parent_id']).$data_categorys['category_name'] .'</td><td>'.$data_categorys['parent_id'].'</td><td>'.$data_categorys['sort'].'</td><td>'.(($data_categorys['status']==1)?'Active':'Inactive').'</td><td>'.$data_categorys['date_added'].'</td><td><a href="category_form.php ? category_id='. $data_categorys['category_id'].' " >Edit</a> |  <a href="category.php?action=delete&category_id='. $data_categorys['category_id'].'" onclick= "return confirm(\'Are you sure want to delete this?\')"" >Delete</a></td></tr>';
			}else{
				return false;
			}
			 
		makeCategory($data_categorys['category_id'], $selected_id , $except_id);		
		}
		}

		
		
	 function getParents($parent_id){
		  $data_parent = getCategory($parent_id);
		  $html='';
		  if(sizeof($data_parent)){
			  $html.=getParents($data_parent['parent_id']);
			  $html.=$data_parent['category_name'].'&raquo; ';
		  }
		  return $html;
		 
	 } 


function getCategory($category_id){
    global $con;
    $sql = "SELECT * FROM categories WHERE category_id='". (int)$category_id ."'";
    $rs = mysqli_query($con, $sql);
    $rec = array();
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
    }
    return $rec;
}


function getCategories($parent_id){
    global $con;
    $sql = "SELECT * FROM categories WHERE parent_id=" . $parent_id;
    $rs = mysqli_query($con, $sql);
    $data = array();
    if(mysqli_num_rows($rs)){
        while($rec = mysqli_fetch_assoc($rs)){
            $data[] = $rec;
        }
    }
    return $data;
}


if(isset($_GET['action']) && !empty($_GET['action'])){
	
	$action=$_GET['action'];
	switch($action){
		case 'delete':
		if(isset($_GET['category_id']) && !empty($_GET['category_id'])){
			$category_id=$_GET['category_id'];
			deleteCatagory($category_id);
			addAlert('success', 'User deleted successfully!');
            redirect('category.php');

		}
		break;
		
	}
	
	
}


$sql="SELECT * FROM categories ";
$rs = mysqli_query($con, $sql);

 $data_cate=array();
 if(mysqli_num_rows($rs)){
	while( $res= mysqli_fetch_assoc($rs)){
		$data_cate[] = $res;
	}
 } 
 
 
 function deleteCatagory($category_id){
	global $con; 
	if($category_id != 1){
	$sql="DELETE FROM categories WHERE category_id='".$category_id."'";
	
	mysqli_query($con,$sql);
	}else{
		addAlert('warning', 'You don\'t delete this!');
        redirect('category.php');
	}
}
	