<!DOCTYPE html>
<html>

<?php 
include("admin_partials/session.php");
include("admin_partials/head.php"); 
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    
    <!-- Header -->
    <?php include ("admin_partials/header.php") ?>

    <!-- Aside -->
    <?php include ("admin_partials/aside.php") ?>
        
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("admin_partials/footer.php");  ?>
</body>
</html>
