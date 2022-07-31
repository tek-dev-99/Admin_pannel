<?php
 require_once('include/startup.php');
 require_once('lglib/dashboardlib.php');
?>
  <?php require_Once('dashbord/common/html_start.php'); ?>
  <?php require_Once('dashbord/common/custom_css.php'); ?> 
  <?php require_once('dashbord/common/body_start.php'); ?>
  <?php require_once('dashbord/common/header_.php'); ?>
 <?php require_once('dashbord/common/side_bar.php');  ?> 
 <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><?php echo $document_title; ?></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>


    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> </main>
 <?php require_Once('dashbord/common/script_html.php'); ?>
 <?php require_Once('dashbord/common/end_html.php');?>