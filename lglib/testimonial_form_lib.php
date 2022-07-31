<?php
checkAdminLogin();

$document_title = 'Add Instructor';

$student_id= 0 ;
$name = '';
$photo = '';
$profession='';
$description='';
$status = 0 ;
$new_photo= '';
$key='';
$additional_photo=array();


 
if(isset($_GET['student_id']) && !empty($_GET['student_id'])){
	$student_id = $_GET['student_id'];
	$document_name='Edit Testimonial: '.$student_id ;
	$product_data=getProduct($student_id);
	
	


	
	if($product_data ){
	$name = $product_data['name'];
   	
	$photo = $product_data['photo'];
	
	$profession = $product_data['profession'];
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
		$profession=$_POST['profession'];
		
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
			if ($student_id){
				
				$sql="UPDATE testimonial SET name='".$name ."', photo='". $photo ."', profession='". $profession ."',description='". $description ."', status='".(int)$status ."' WHERE student_id='". $student_id ."' ";
				
				mysqli_query($con, $sql);
				addAlert('success','Testimonial Updated successfully!');	
				 

			}else{
			
		$sql="INSERT testimonial SET name='".$name ."', photo='". $photo ."',profession='". $profession ."', description='". $description ."', status='".(int)$status ."'";
		
			addAlert('success','Testimonial added successfully!');
		
			$res = mysqli_query($con, $sql);
			
			 $student_id = mysqli_insert_id($con);
			 			 
			
			if(sizeof($additional_files)){
				foreach($additional_files as $addtional_file){
					
				
				 $sql_photos = "INSERT additional_photo SET student_id='".$student_id ."', filename='".$addtional_file ."', date_added=NOW()";
				 mysqli_query($con,$sql_photos);
				
				}
				
			}
				
				
				

			}
		
			 
		 redirect('testimonial.php');			
		
				
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








function getProduct($student_id){
    global $con;
    $sql = "SELECT * FROM testimonial WHERE student_id='".(int)$student_id ."'";
    $rs = mysqli_query($con, $sql);
    $rec = array();
	
    if(mysqli_num_rows($rs)){
        $rec = mysqli_fetch_assoc($rs);
    }
	
	
    return $rec;
}

// function getProduct_photo($student_id){
    // global $con;
    // $sql = "SELECT * FROM additional_photo WHERE student_id='".(int)$student_id ."'";
    // $rs = mysqli_query($con, $sql);
	
    // $data = array();
	
    // if(mysqli_num_rows($rs)){
        // while($rec = mysqli_fetch_assoc($rs)){
			// $data[]=$rec;
		// }


			// }
	

    // return $data;
// }