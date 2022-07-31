<?php
checkAdminLogin();

$document_title = 'Add Banner';

$banner_id= 0 ;
$banner_title = '';
$photo = '';
$description='';
$status = 0 ;
$new_photo= '';
$key='';
$additional_photo=array();


 
if(isset($_GET['banner_id']) && !empty($_GET['banner_id'])){
	$banner_id = $_GET['banner_id'];
	$document_banner_title='Edit Banner: '.$banner_id ;
	$product_data=getProduct($banner_id);
	
	


	
	if($product_data ){
	$banner_title = $product_data['banner_title'];
   	
	$photo = $product_data['photo'];
	
	$description = $product_data['description'];
    $status = $product_data['status'];
		
	}
	else{
        addAlert('danger', 'User ID not found!');
        redirect('banner.php');
    }
		}
		
		
if($_POST){

		if(isset($_POST['banner_title']) && !empty ($_POST['banner_title']) ){
			
		$banner_title=$_POST['banner_title'];
		
		$description=$_POST['description'];
		$status=(isset($_POST['status']))?1:0;
			
							
					$additional_files = array();
					
					if(isset($_FILES['additional_photos']) && !empty ($_FILES['additional_photos'])) {
						if(sizeof($_FILES['additional_photos']['name'])){
							foreach($_FILES['additional_photos']['name'] as $key => $val){
								
								$afile['name'] = $_FILES['additional_photos']['name'][$key];
								$afile ['type'] = $_FILES['additional_photos']['type'][$key]; 
								$afile['tmp_name'] = $_FILES['additional_photos']['tmp_name'][$key];
								$afile['error'] = $_FILES['additional_photos']['error'][$key];
								$afile['size'] = $_FILES['additional_photos']['size'][$key];
								
								$additional_files[] = uploadFile($afile);
								
							}
						}
						
					}

					
					$new_photo = uploadFile($_FILES['photo']);
			if($new_photo){
				
				if(!empty ($photo)){
					 unlink('../product_photo/'.$photo);
					
			
			}
				$photo = $new_photo ;
				
			}
			if ($banner_id){
				
				$sql="UPDATE banner SET banner_title='".$banner_title ."', photo='". $photo ."', description='". $description ."', status='".(int)$status ."' WHERE banner_id='". $banner_id ."' ";
				
				mysqli_query($con, $sql);
				addAlert('success','Product Updated successfully!');	
				 

			}else{
			
		$sql="INSERT banner SET banner_title='".$banner_title ."', photo='". $photo ."', description='". $description ."', status='".(int)$status ."'";
			addAlert('success','Product added successfully!');
		
			$res = mysqli_query($con, $sql);
			
			 $banner_id = mysqli_insert_id($con);
			 			 
			
			if(sizeof($additional_files)){
				foreach($additional_files as $addtional_file){
					
				
				 $sql_photos = "INSERT additional_photo SET banner_id='".$banner_id ."', filename='".$addtional_file ."', date_added=NOW()";
				 mysqli_query($con,$sql_photos);
				
				}
				
			}
				
				
				

			}
		
			 
		 redirect('banner.php');			
		
				
			 }
			 else{
				 addAlert('danger','Incomplete form data!');			
			 }
				
	}
	
	
	
	function uploadFile($file_var){
		if (isset($file_var['name']) && !empty ($file_var['name'])){
			$filename=time().'_'.$file_var['name'];
			$src=$file_var['tmp_name'];

			(copy ($src,'../product_photo/'.$filename));	
			 return $filename;
	 
		} 
		else{
			return false;
		}
	}








function getProduct($banner_id){
    global $con;
    $sql = "SELECT * FROM banner WHERE banner_id='".(int)$banner_id ."'";
    $rs = mysqli_query($con, $sql);
    $rec = array();
	
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
    }
	
	
    return $rec;
}

// function getProduct_photo($banner_id){
    // global $con;
    // $sql = "SELECT * FROM additional_photo WHERE banner_id='".(int)$banner_id ."'";
    // $rs = mysqli_query($con, $sql);
	
    // $data = array();
	
    // if(mysqli_num_rows($rs)){
        // while($rec = mysqli_fetch_assoc($rs)){
			// $data[]=$rec;
		// }


			// }
	

    // return $data;
// }