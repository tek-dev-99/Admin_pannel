<?php
checkAdminLogin();

$document_title = 'Add Category';
$category_id= 0 ;
$category_name = '';
$parent_id = '';
$sort = '';
$status = 0 ;




if (isset($_GET['category_id']) && !empty($_GET['category_id'])){
	$category_id=$_GET['category_id'];
	$document_title = 'Edit Category :'  .$category_id;
	$data_category=getcategory($category_id);
	if($data_category){
		
		
	   	$category_name = $data_category['category_name'];
		$parent_id = $data_category['parent_id'];
		$sort = $data_category['sort'];
		$status =$data_category['status'];
	}else{
		addAlert('danger', 'Category ID not found!');
        redirect('category.php');
	}
}




		function makeCategory($parent_id, $selected_id =  0, $except_id=0){
			$data_category = getCategories($parent_id);
		foreach($data_category as $data_categorys){
			$selected = '';
			if( $selected_id == $data_categorys['category_id']){
				$selected = 'selected="selected"';
			}
			
			if($except_id !=$data_categorys['category_id']){
		echo '<option '. $selected .' value="'. $data_categorys['category_id'] .'">'. getParents($data_categorys['parent_id']) . $data_categorys['category_name'] .'</option>';
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



if($_POST){
	if(isset($_POST['category_name']) && !empty($_POST['category_name'])){
		$category_name = $_POST['category_name'];
		$parent_id = $_POST['parent_id'];
		$sort = $_POST['sort'];
		$status =(isset($_POST['status']))?1:0;
		
		
			if($category_id){
					
		       $sql = "Update categories SET category_name='".$category_name ."',	parent_id='". $parent_id ."', sort='". $sort ."', status='".(int)$status ."' WHERE category_id='".$category_id ."' ";
			   
			  

				
			
			 addAlert('success','Category Update successfully!');
			 
			 
			 }	else{
		
		$sql="INSERT categories SET category_name='".$category_name ."',	parent_id='". $parent_id ."', sort='". $sort ."', status='".(int)$status ."'";
			
		addAlert('success','Category added successfully!');			
			 }
			 
			
	
		 mysqli_query($con, $sql);
		 
		 
		 redirect('category.php');			
		
	}
		
		else {  
			addAlert('danger','Form incomplete!');
			}
		
	}

	
	
	
	
	function alreadyExist($parent_id){
    global $con; 
    $sql = "SELECT * FROM categories WHERE parent_id='". $parent_id ."'";
    $rs = mysqli_query($con, $sql);

    if(mysqli_num_rows($rs)){
        return true;
    }
    return false;
}
	
	
	
	


function uploadFile(){
	if (isset($_FILES['photo']['name']) && !empty ($_FILES['photo']['name'])){
		$filename=time().'_'.$_FILES['photo']['name'];
		$src=$_FILES['photo']['tmp_name'];

		(copy ($src,'../upload/'.$filename));	
		 return $filename;
 
	} 
	else{
		return false;
	}
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



