<!DOCTYPE html>
<html lang="en">

<?php include ("partials/head.php") ?>

<body class="animsition">
	
	<!-- Header -->
	<?php include ("partials/header.php") ?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/log_bk.jpg');">
		<h2 class="ltext-105 cl0 txt-center" style="font-family: 'Open Sans', sans-serif;">
			Đăng nhập/Đăng Ký
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">

                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="handler/login.php" method="POST">
						<h4 class="mtext-105 cl2 txt-center p-b-30" style="font-family: 'Open Sans', sans-serif;">
							Đăng Nhập
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" name="email" placeholder="Tên đăng nhập" style="font-family: 'Open Sans', sans-serif;">
						</div>

						<div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" name="password" placeholder="Mật khẩu" style="font-family: 'Open Sans', sans-serif;" >
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="font-family: 'Open Sans', sans-serif;" name="login">
                            Đăng Nhập
						</button>
					</form>
				</div>

				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="handler/register.php" method="POST">
						<h4 class="mtext-105 cl2 txt-center p-b-30" style="font-family: 'Open Sans', sans-serif;">
							Tạo tài khoản
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" name="email" placeholder="Tên đăng nhập" style="font-family: 'Open Sans', sans-serif;">
						</div>

						<div class="bor8 m-b-20">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" name="phone" placeholder="Số điện thoại của bạn" style="font-family: 'Open Sans', sans-serif;">
						</div>

						<div class="bor8 m-b-20">
                            <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" name="password" placeholder="Mật khẩu" style="font-family: 'Open Sans', sans-serif;">
						</div>

                        <div class="bor8 m-b-30">
                            <input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" name="confirmpassword" placeholder="Nhập lại mật khẩu" style="font-family: 'Open Sans', sans-serif;">
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="font-family: 'Open Sans', sans-serif;">
							Đăng Ký
						</button>
					</form>
				</div>
			</div>
		</div>
	</section>	

	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="handler/change_password.php" method="POST">
						<h4 class="mtext-105 cl2 txt-center p-b-30" style="font-family: 'Open Sans', sans-serif;">
							Đổi Mật Khẩu
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="text" name="email" placeholder="Tên đăng nhập" style="font-family: 'Open Sans', sans-serif;" required>
						</div>

						<div class="bor8 m-b-20">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" name="new_password" placeholder="Mật khẩu mới" style="font-family: 'Open Sans', sans-serif;" required>
						</div>

						<div class="bor8 m-b-30">
							<input class="stext-111 cl2 plh3 size-116 p-l-20 p-r-30" type="password" name="confirm_new_password" placeholder="Nhập lại mật khẩu mới" style="font-family: 'Open Sans', sans-serif;" required>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="change" style="font-family: 'Open Sans', sans-serif;">
							Đổi Mật Khẩu
						</button>
					</form>
				</div>
			</div>
		</div>
	</section> 


	<!-- Footer -->
	<?php include("partials/footer.php"); ?>

</body>
</html>