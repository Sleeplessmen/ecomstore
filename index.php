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
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<?php
				// Assuming you have a database connection
				include("partials/connect.php");

				// Fetch all unique categories from your database
				$sqlCategories = "SELECT categoryName FROM categories";
				$resultCategories = $connect->query($sqlCategories);
				?>
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1">
						All Products
					</button>

					<?php
					// Display category buttons dynamically
					while ($rowCategory = $resultCategories->fetch_assoc()) {
						$category = $rowCategory['categoryName'];
						echo '<button style="font-family: Arial, sans-serif" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".' . strtolower($category) . '">';
						echo $category;
						echo '</button>';
					}
					?>
				</div>

				<script>
					// JavaScript function to filter products based on category
					function filterProducts(category) {
						$.ajax({
							type: 'POST',
							url: 'filter_product.php', // Replace with the actual PHP file handling the filtering logic
							data: { category: category },
							success: function (response) {
								$('#productContainer').html(response);
							}
						});
					}
				</script>
			</div>
				
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				Daily Suggestion
			</h3>
		</div>

		<div class="row isotope-grid">
			<?php
			include("partials/connect.php");
			// show max 20
			$sql = "SELECT * FROM products ORDER BY RAND() limit 20";
			$result = $connect->query($sql);

			while ($final = $result->fetch_assoc()) :
			?>
				<div class="col-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $final['productPicture']?>" alt="Product Image - <?php echo $final['productName']; ?>" style="max-height: 400px; max-width: 400px; margin-bottom: 5px;">

							<a href="details.php?detail_id=<?php echo $final['productID'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l">
								<a href="details.php?detail_id=<?php echo $final['productID']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-family:Arial, Helvetica, sans-serif">
									<?php echo $final['productName'] ?>
								</a>

								<span class="stext-105 cl3">
									<?php echo number_format($final['productPrice'], 0, ',', '.') . 'đ'; ?>
								</span>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

		<!-- Load more -->
		<div class="flex-c-m flex-w w-full p-t-45">
			<a href="product.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Load More
			</a>
		</div>
	</div>
	</section>
	
<!-- Footer -->
<?php include ("partials/footer.php") ?>

</body>
</html>