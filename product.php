<!DOCTYPE html>
<html lang="en">
<?php include ("partials/head.php") ?>

<body class="anim sition">
	
	<!-- Header -->
	<?php include ("partials/header.php") ?>
	<br><br>

	<!-- Product -->
	<div class="bg0 m-t-23 p-b-100">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<form method="GET" action="product.php" class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" name="category" value="0">
						All Products
					</button>

					<?php
					include("partials/connect.php");
					// Fetch all unique categories from your database
					$sqlCategories = "SELECT * FROM categories";
					$resultCategories = $connect->query($sqlCategories);

					// Display category buttons dynamically
					while ($rowCategory = $resultCategories->fetch_assoc()) : 
						$categoryID = $rowCategory['categoryID'];
						$categoryname = $rowCategory['categoryName'];
					?>

					<button type="submit" style="font-family: Open Sans, sans-serif;" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="category" value="<?php echo $categoryID ?>">
						<?php echo $categoryname ?>
					</button>

					<?php endwhile; ?>
					</form>
				</div>

				<!-- Search product -->
				<div class="panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Tìm kiếm sản phẩm" style="font-family: 'Open Sans', sans-serif;">
					</div>
				</div>


				<?php
				if (isset($_GET['category'])) {
					$categoryID = $_GET['category'];
					if($categoryID == 0) {
						$sqlProducts = "SELECT * FROM products";
					} else {
						$sqlProducts = "SELECT * FROM products WHERE categoryID = $categoryID";
					}
					// Modify this part based on your database schema
					$resultProducts = $connect->query($sqlProducts);
					// Display the products
					while ($rowProduct = $resultProducts->fetch_assoc()) : 
				?>

				<div class="col-6 col-md-4 col-lg-3 p-b-35 isotope-item">
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $rowProduct['productPicture']?>" alt="Product Image - <?php echo $rowProduct['productName']; ?>" style="max-height: 400px; max-width: 400px; margin-bottom: 5px;">

							<a href="details.php?detail_id=<?php echo $rowProduct['productID'] ?>" 
							class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"
							style="font-family: 'Open Sans', sans-serif;">
								Chi tiết
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l">
								<a href="details.php?detail_id=<?php echo $rowProduct['productID']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-family: 'Open Sans', sans-serif;" >
									<?php echo $rowProduct['productName'] ?>
								</a>

								<span class="stext-105 cl3" style="font-family: 'Open Sans', sans-serif;">
									<?php echo number_format($rowProduct['productPrice'], 0, ',', '.') . 'đ'; ?>
								</span>
							</div>

						</div>
					</div>
				</div>

				<?php endwhile; } ?>
			
			</div>
		</div>
	</div>
		

	<!-- Footer -->
	<?php include ("partials/footer.php") ?>

</body>
</html>