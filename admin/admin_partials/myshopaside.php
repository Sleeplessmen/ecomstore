<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="Admin Image">
        </div>
        <div class="pull-left info">
          <p><?php 
          echo $_SESSION['name'];
          ?></p>
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
          <a href="myshop.php">
            <i class="fa fa-list-ul"></i> <span  style="font-family: 'Open Sans', sans-serif;">Quản lý</span>
          </a>
        </li>


        <li>
          <a href="showcategories.php">
            <i class="fa fa-server"></i> <span  style="font-family: 'Open Sans', sans-serif;">Danh mục</span>
          </a>
        </li>

        <li>
          <a href="showproducts.php">
            <i class="fa fa-cubes"></i> <span  style="font-family: 'Open Sans', sans-serif;">Sản phẩm</span>
          </a>
        </li>

        <li>
          <a href="orders.php">
            <i class="fa fa-cart-arrow-down"></i> <span  style="font-family: 'Open Sans', sans-serif;">Đơn hàng</span>
          </a>
        </li>

        <li>
          <a href="admin_index.php">
            <i class="fa fa-reply"></i> <span  style="font-family: 'Open Sans', sans-serif;">Quay lại</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>