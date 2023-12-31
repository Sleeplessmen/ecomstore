<?php
include("partials/connect.php");
session_start();
?>
<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">

			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar" style="font-family: 'Open Sans', sans-serif;">
						Miễn phí vận chuyển cho tất cả các đơn hàng tiêu chuẩn trên 2.000.000đ
					</div>

					<div class="right-top-bar flex-w h-full">

						<?php if (empty($_SESSION['customer_id'])) { ?>
				
							<a href="customerforms.php" class="flex-c-m trans-04" style="border: 0; font-family: 'Open Sans', sans-serif;">
								<strong>Đăng Nhập/Đăng Ký</strong>
							</a>
						<?php } else { ?>
							<div>
								<a href="handler/logout.php" class="flex-c-m trans-04 p-lr-25" style="border: 0; font-family: 'Open Sans', sans-serif;">
									<strong>Đăng Xuất</strong>
								</a>
							</div>	
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/icons/logo-03.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							
							<li>
								<a href="index.php" style="font-family: 'Open Sans', sans-serif;">Trang chủ</a>
							</li>

							<li>
								<a href="product.php?category=0" style="font-family: 'Open Sans', sans-serif;">Cửa hàng</a>
							</li> 

							<li>
								<a href="about.php" style="font-family: 'Open Sans', sans-serif;">Về chúng tôi</a>
							</li>

							<li>
								<a href="contact.php" style="font-family: 'Open Sans', sans-serif;">Liên hệ</a>
							</li>

						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						


						<!-- Cart Icon -->
						<?php 
						if(!empty($_SESSION['cart'])) {
							$qty = count($_SESSION['cart']); ?>
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" onclick="location.href='cart.php'" 
							data-notify="<?php echo $qty ?>">
						<?php } else { ?>
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" onclick="location.href='cart.php'" 
							data-notify="0">
						<?php } ?>
 							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</div>
				</nav>
			</div>	
		</div>
  
		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logo-03.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<!-- Search Icon -->
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<!-- Cart Icon -->
				<?php 
				if(!empty($_SESSION['cart'])) {
					$qty = count($_SESSION['cart']); ?>
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" onclick="location.href='cart.php'" 
					data-notify="<?php echo $qty ?>">
				<?php } else { ?>
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" onclick="location.href='cart.php'" 
					data-notify="0">
				<?php } ?>
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile"> 

			<ul class="main-menu-m">
				<li>
					<a href="index.php" style="font-family: 'Open Sans', sans-serif;">Trang chủ</a>
				</li>

				<li>
					<a href="product.php?category=0" style="font-family: 'Open Sans', sans-serif;">Cửa hàng</a>
				</li>

				<li>
					<a href="about.php" style="font-family: 'Open Sans', sans-serif;">Về chúng tôi</a>
				</li>

				<li>
					<a href="contact.php" style="font-family: 'Open Sans', sans-serif;">Liên hệ</a>
				</li>
			</ul>
			
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" id="searchForm">
					<button class="flex-c-m trans-04" type="submit">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" id="searchInput" placeholder="Tìm kiếm">
				</form>

				<script>
					document.addEventListener("DOMContentLoaded", function() {
						const searchForm = document.getElementById('searchForm');
						searchForm.addEventListener('submit', function(event) {
							event.preventDefault(); // Prevent form submission

							const searchTerm = document.getElementById('searchInput').value.trim();
							if (searchTerm !== "") {
								const encodedSearchTerm = encodeURIComponent(searchTerm);
								// Redirect to the desired URL
								window.location.href = 'http://localhost/ecomstore/product.php?search-product=' + encodedSearchTerm;
							}
						});
					});
				</script>
			</div>
		</div>

		
	</header>

	<!-- Cart
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: 
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="cart2.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
