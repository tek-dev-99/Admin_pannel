<?php
checkAdminLogin();

$document_title = 'Add Instructor';

$instructor_id= 0 ;
$name = '';
$photo = '';
$designation='';
$description='';
$status = 0 ;
$new_photo= '';
$key='';
$additional_photo=array();


 
if(isset($_GET['instructor_id']) && !empty($_GET['instructor_id'])){
	$instructor_id = $_GET['instructor_id'];
	$document_name='Edit Instructor: '.$instructor_id ;
	$product_data=getProduct($instructor_id);
	
	


	
	if($product_data ){
	$name = $product_data['name'];
   	
	$photo = $product_data['photo'];
	
	$designation = $product_data['designation'];
	$description = $product_data['description'];
    $status = $product_data['status'];
		
	}
	else{
        addAlert('danger', 'User ID not found!');
        redirect('instructor.php');
    }
		}
		
		
if($_POST){

		if(isset($_POST['name']) && !empty ($_POST['name']) ){
			
		$name=$_POST['name'];
		$designation=$_POST['designation'];
		
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
			if ($instructor_id){
				
				$sql="UPDATE instructor SET name='".$name ."', photo='". $photo ."', designation='". $designation ."',description='". $description ."', status='".(int)$status ."' WHERE instructor_id='". $instructor_id ."' ";
				
				mysqli_query($con, $sql);
				addAlert('success','Instructor Updated successfully!');	
				 

			}else{
			
		$sql="INSERT instructor SET name='".$name ."', photo='". $photo ."',designation='". $designation ."', description='". $description ."', status='".(int)$status ."'";
		
			addAlert('success','Inscturctor added successfully!');
		
			$res = mysqli_query($con, $sql);
			
			 $instructor_id = mysqli_insert_id($con);
			 			 
			
			if(sizeof($additional_files)){
				foreach($additional_files as $addtional_file){
					
				
				 $sql_photos = "INSERT additional_photo SET instructor_id='".$instructor_id ."', filename='".$addtional_file ."', date_added=NOW()";
				 mysqli_query($con,$sql_photos);
				
				}
				
			}
				
				
				

			}
		
			 
		 redirect('instructor.php');			
		
				
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








function getProduct($instructor_id){
    global $con;
    $sql = "SELECT * FROM instructor WHERE instructor_id='".(int)$instructor_id ."'";
    $rs = mysqli_query($con, $sql);
    $rec = array();
	
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
    }
	
	
    return $rec;
}

// function getProduct_photo($instructor_id){
    // global $con;
    // $sql = "SELECT * FROM additional_photo WHERE instructor_id='".(int)$instructor_id ."'";
    // $rs = mysqli_query($con, $sql);
	
    // $data = array();
	
    // if(mysqli_num_rows($rs)){
        // while($rec = mysqli_fetch_assoc($rs)){
			// $data[]=$rec;
		// }


			// }
	

    // return $data;
// }