<!DOCTYPE html>
<html lang="en">

<?php
include("admin_partials/session.php");
include("admin_partials/head.php");
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Header -->
        <?php include("admin_partials/header.php") ?>

        <!-- Aside -->
        <?php include("admin_partials/aside.php") ?>

        <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-family: 'Open Sans', sans-serif;">
        Quản lý thông tin cá nhân
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php 
              include('../partials/connect.php');
              $sql = "SELECT * FROM admins WHERE adminID = '{$_SESSION['id']}'";
              $result = $connect->query($sql);
              $admin = $result->fetch_assoc();
              ?>
              <h3 class="profile-username text-center"><?php echo $admin['contact_firstname'] . " " . $admin['contact_lastname'] ?></h3>

              <p class="text-muted text-center"><?php echo $admin['job_title'] ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $admin['email'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Số điện thoại</b> <a class="pull-right"><?php echo $admin['phone_number'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tiền lương</b> <a class="pull-right"><?php echo number_format($admin['salary'], 0, ".", ",") . "đ" ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3"></div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    
<?php include("admin_partials/footer.php"); ?> 
</div>
</body>

</html>
