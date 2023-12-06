<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="Admin Image">
        </div>
        <div class="pull-right info">
        <a href='profile.php'><?php echo $_SESSION['name'] ?></a>
        </div>
      </div>


      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="nme" class="form-control" placeholder="Tìm kiếm ... ">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li>
          <a href="admin_index.php">
            <i class="fa fa-dashboard"></i> <span style="font-family: 'Open Sans', sans-serif;">Bảng điều khiển</span>
          </a>
        </li>

        <li>
          <a href="myshop.php">
            <i class="fa fa-shopping-cart"></i> <span  style="font-family: 'Open Sans', sans-serif;">Cửa hàng của tôi</span>
          </a>
        </li>

        <li>
          <a href="">
            <i class="fa fa-bar-chart"></i> <span  style="font-family: 'Open Sans', sans-serif;">Thống kê</span>
          </a>
        </li>

        <li>
          <a href="">
            <i class="fa fa-weixin"></i> <span  style="font-family: 'Open Sans', sans-serif;">Tin nhắn</span>
          </a>
        </li>

        <li>
          <a href="admin_partials/logout.php">
            <i class="fa fa-sign-out"></i> <span  style="font-family: 'Open Sans', sans-serif;">Đăng xuất</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>