<!DOCTYPE html>
<html lang="en">

<?php include ("partials/head.php") ?>

<body class="animsition">
	
	<!-- Header -->
	<?php include ("partials/header.php") ?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/contact_bk1.jpg');">
		<h2 class="ltext-105 cl0 txt-center" style="font-family: 'Open Sans', sans-serif;">
			Liên hệ
		</h2>
	</section>	

	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div cl ass="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="handler/contact.php" method="POST">
						<h4 class="mtext-105 cl2 txt-center p-b-30" style="font-family: 'Open Sans', sans-serif;" >
							Gửi Lời Nhắn Tới Chúng Tôi
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-lr-28" type="text" name="email" placeholder="Nhập email của bạn" style="font-family: 'Open Sans', sans-serif;">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Chúng tôi có thể giúp gì cho bạn?" style="font-family: 'Open Sans', sans-serif;"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="font-family: 'Open Sans', sans-serif;">
							Gửi Tin Nhắn
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211 p-t-2">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2" style="font-family: 'Open Sans', sans-serif;">
								Địa chỉ
							</span>

							<p class="stext-115 cl6 size-213 p-t-10" style="font-family: 'Open Sans', sans-serif;">
								Tầng 12 của tòa nhà Capital Building, số 41 Hai Bà Trưng, Phường Tràng Tiền, Quận Hoàn Kiếm, Hà Nội
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211 p-t-2">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2" style="font-family: 'Open Sans', sans-serif;">
								Liên hệ với chúng tôi
							</span>

							<p class="stext-115 cl1 size-213 p-t-10">
								+84 867578422
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211 p-t-2">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2" style="font-family: 'Open Sans', sans-serif;">
								Bộ phận hỗ trợ bán hàng
							</span>

							<p class="stext-115 cl1 size-213 p-t-10">
								khaibk.a.1109@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	

	<!-- Footer -->
	<?php include("partials/footer.php"); ?>

</body>
</html>