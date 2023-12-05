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
			<h4 class="ltext-103 cl5" style="font-family: 'Open Sans', sans-serif;">
				Dành riêng cho bạn
			</h4>
		</div>

		<div class="row isotope-grid">
			<?php
			include("partials/connect.php");
			$sql = "SELECT p.*
					FROM products p
					JOIN orderdetails od ON od.itemID = p.productID
					GROUP BY p.productID 
					ORDER BY SUM(od.quantity) DESC
					LIMIT 20 ";
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
			<a href="product.php?category=0" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04"
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