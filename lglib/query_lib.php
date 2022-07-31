<?php

checkAdminLogin();
$document_title = 'Queries';

if($_POST){
    if(isset($_POST['user_ids']) && !empty($_POST['user_ids'])){ 	
        foreach($_POST['user_ids'] as $user_id){
            deleteUser($user_id);
        }
        addAlert('success', 'User deleted successfully!');
        redirect('query.php');
    }else{
        addAlert('warning', 'Please select atleast 1 record!');
    }
}







if(isset($_GET['action']) && !empty($_GET['action'])){
	
	$action=$_GET['action'];
	switch($action){
		case 'delete':
		if(isset($_GET['user_id']) && !empty($_GET['user_id'])){
			$user_id=$_GET['user_id'];
			deleteUser($user_id);
			addAlert('success', 'User deleted successfully!');
            redirect('query.php');

		}
		break;
		
	}
	
	
}

$page_start=0;
$page_limit=10;
$page=1;
$sort = 'user_id';
$order = 'ASC';
$page_url='';
$sort_url='';



$filter_user_id='';
$filter_username='';  
$filter_email='';
$filter_subject='';
$filter_message='';

$filter_status='';
$filter_date='';
$where=' WHERE 1=1 ';
if(isset($_GET['filter_user_id']) && !empty ($_GET['filter_user_id'])){
	$filter_user_id=$_GET['filter_user_id'];
	$where.="AND user_id='".(int)$filter_user_id."'";
}

if(isset($_GET['filter_username']) && !empty($_GET['filter_username'])){
	$filter_user_name=$_GET['filter_username'];
	$where.="AND username LIKE '%".$filter_user_name."%'";
	
}
if(isset($_GET['filter_email']) && !empty($_GET['filter_email'])){
	$filter_email=$_GET['filter_email'];
	$where.="AND email LIKE '%".$filter_email."%'";
	
}


if(isset($_GET['filter_subject']) && !empty($_GET['filter_subject'])){
	$filter_subject=$_GET['filter_subject'];
	$where.="AND subject LIKE '%".$filter_subject."%'";
	
}

if(isset($_GET['filter_message']) && !empty($_GET['filter_message'])){
	$filter_message=$_GET['filter_message'];
	$where.="AND message  LIKE '%".$filter_message."%'";
	
}


if(isset($_GET['filter_status'])){
	$filter_status=$_GET['filter_status'];
	$where.="AND status  ='".(int)$filter_status ."' ";

}
if(isset($_GET['filter_date']) && !empty($_GET['filter_date'])){
	$filter_date=$_GET['filter_date'];
	$where.="AND date_added = '".$filter_date."'";
}


$sql_total= "SELECT count(*) as total FROM query" .$where;
	
$rs_total=mysqli_query($con, $sql_total);
$rec_total=mysqli_fetch_assoc($rs_total);
$total_user=$rec_total['total'];

if(isset($_GET['page']) && !empty($_GET['page'])){
	$page = $_GET['page'];
    $page_start = ($page - 1) * $page_limit;
	$page_url.='&page='.$page;

}
if(isset($_GET['sort']) && !empty($_GET['sort']) && isset($_GET['order']) && !empty($_GET['order'])){
    $sort = $_GET['sort'];
    $order = $_GET['order'];
	$sort_url.='&sort='.$sort;
	$sort_url.='&order='.$order;
}


$sql = "SELECT * FROM query ".$where." ORDER BY ". $sort ." ". $order ." LIMIT ". $page_start .", " . $page_limit;

$rs=mysqli_query($con, $sql);

	$order = ($order == 'ASC')?'DESC':'ASC';

$data_users= array();
 
 if (mysqli_num_rows($rs))
 {
	 while ($rec=mysqli_fetch_assoc($rs))
	 {
		 $data_users[]=$rec;
	 }
 }


function deleteUser($user_id){
	global $con; 
	if($user_id != 1){
		
	$sql="DELETE FROM query WHERE user_id='".$user_id."'";
	mysqli_query($con,$sql);
	}else{
		addAlert('warning', 'You don\'t delete this!');
        redirect('query.php');
	}
}