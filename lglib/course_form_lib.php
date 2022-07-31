<?php
checkAdminLogin();

$document_title = 'Add Course';

$product_id= 0 ;
$product_name = '';
$product_price = '';
$photo = '';
$description='';
$duration='';
$status = 0 ;
$new_photo= '';
$key='';
$additional_photo=array();
 
if(isset($_GET['product_id']) && !empty($_GET['product_id'])){
	$product_id = $_GET['product_id'];
	$document_title='Edit Product: '.$product_id ;
	$product_data=getProduct($product_id);
	$additional_photo = getProduct_photo($product_id);
	


	
	if($product_data ){
	$product_name = $product_data['product_name'];
    $product_price = $product_data['product_price'];	
	$photo = $product_data['photo'];
	$duration = $product_data['duration'];
	$description = $product_data['description'];
    $status = $product_data['status'];
		
	}
	else{
        addAlert('danger', 'User ID not found!');
        redirect('product.php');
    }
		}
		
			
if($_POST){

		if(isset($_POST['product_name']) && !empty ($_POST['product_name']) && isset($_POST['product_price']) && !empty ($_POST['product_price']) ){
			
		$product_name=$_POST['product_name'];
		$product_price=$_POST['product_price'];
		$duration=$_POST['duration'];
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
			if ($product_id){
				
				$sql="UPDATE products SET product_name='".$product_name ."',	product_price='". $product_price ."', duration='". $duration ."', photo='". $photo ."', description='". $description ."', status='".(int)$status ."' WHERE product_id='". $product_id ."' ";
				
				mysqli_query($con, $sql);
				addAlert('success','Course Updated successfully!');	
				 

			}else{
			
		$sql="INSERT products SET product_name='".$product_name ."',	product_price='". $product_price ."', duration='". $duration ."', photo='". $photo ."', description='". $description ."', status='".(int)$status ."'";
			addAlert('success','course added successfully!');
			$res = mysqli_query($con, $sql);
			
			 $product_id = mysqli_insert_id($con);
			 			 
			
			if(sizeof($additional_files)){
				foreach($additional_files as $addtional_file){
					
				
				 $sql_photos = "INSERT additional_photo SET product_id='".$product_id ."', filename='".$addtional_file ."', date_added=NOW()";
				 mysqli_query($con,$sql_photos);
				
				}
				
			}
				
				
				

			}
		
			 
		 redirect('course.php');			
		
				
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








function getProduct($product_id){
    global $con;
    $sql = "SELECT * FROM products WHERE product_id='".(int)$product_id ."'";
    $rs = mysqli_query($con, $sql);
    $rec = array();
	
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
    }
	
	
    return $rec;
}

function getProduct_photo($product_id){
    global $con;
    $sql = "SELECT * FROM additional_photo WHERE product_id='".(int)$product_id ."'";
    $rs = mysqli_query($con, $sql);
	
    $data = array();
	
    if(mysqli_num_rows($rs)){
        while($rec = mysqli_fetch_assoc($rs)){
			$data[]=$rec;
		}


			}
	

    return $data;
}