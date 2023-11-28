<!DOCTYPE html>
<html lang="en">
<?php include ("partials/head.php") ?>

<body class="animsition">
	
	<!-- Header -->
	<?php include ("partials/header.php") ?>	
	<!-- Slider -->
	<?php include ("partials/slider.php") ?>
	<!-- Banner -->
	<?php include ("partials/banner.php") ?>

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5" style="font-family: 'Open Sans', sans-serif;">
					Tổng quan về sản phẩm
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" 
					style="font-family: 'Open Sans', sans-serif;" data-filter="*">
						<strong>Tất cả sản phẩm</strong>
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" 
					style="font-family: 'Open Sans', sans-serif;" data-filter=".1">
						<strong>Đồ Chơi<strong>
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" 
					style="font-family: 'Open Sans', sans-serif;" data-filter=".2">
						<strong>Phương Tiện Di Chuyển</strong>
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" 
					style="font-family: 'Open Sans', sans-serif;" data-filter=".3">
						<strong>Đồ Điện Tử</strong>
					</button>

					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" 
					style="font-family: 'Open Sans', sans-serif;" data-filter=".4">
						<strong>Nhà Sách Online</strong>
					</button>
				</div>
			</div>

		<div class="row isotope-grid">
			<?php
			include("partials/connect.php");
			$sql = "SELECT * FROM products ORDER BY RAND() LIMIT 20";
			$result = $connect->query($sql);

			while ($final = $result->fetch_assoc()) :
			?>
				<div class="col-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php $final['categoryID'] ?>">
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $final['productPicture']?>" alt="Product Image - <?php echo $final['productName']; ?>" style="max-height: 400px; max-width: 400px; margin-bottom: 5px;">

							<a href="details.php?detail_id=<?php echo $final['productID'] ?>" 
							class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"
							style="font-family: 'Open Sans', sans-serif;">
								Chi tiết
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l">
								<a href="details.php?detail_id=<?php echo $final['productID']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-family: 'Open Sans', sans-serif;">
									<?php echo $final['productName'] ?>
								</a>

								<span class="stext-105 cl3" style="font-family: 'Open Sans', sans-serif;">
									<?php echo number_format($final['productPrice'], 0, ',', '.') . 'đ'; ?>
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

		<!-- Load more -->
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="product.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04"
			style="font-family: 'Open Sans', sans-serif;">
				Xem thêm
			</a>
		</div>
	</div>
	</section>
	
<!-- Footer -->
<?php include ("partials/footer.php") ?>

</body>
</html>