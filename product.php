<?php
include("partials/connect.php");
// Set the number of products per page
$productsPerPage = 20;

// Get the current page number from the URL, default to page 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $productsPerPage;

// Query to get the total number of products
$totalProducts = $connect->query("SELECT COUNT(*) as total FROM products")->fetch_assoc()['total'];

// Calculate the total number of pages
$totalPages = ceil($totalProducts / $productsPerPage);

// Query to retrieve products with pagination
$sql = "SELECT * FROM products LIMIT $offset, $productsPerPage";
$result = $connect->query($sql);
?>

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
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						All Products
					</button>

					<?php
					// Assuming you have a database connection
					include("partials/connect.php");

					// Fetch all unique categories from your database
					$sqlCategories = "SELECT categoryName FROM categories";
					$resultCategories = $connect->query($sqlCategories);

					// Display category buttons dynamically
					while ($rowCategory = $resultCategories->fetch_assoc()) {
						$category = $rowCategory['categoryName'];
						echo '<button style="font-family: Open Sans, sans-serif;" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".' . strtolower($category) . '">';
						echo $category;
						echo '</button>';
					}
					?>

					<?php
					// Assuming you have a database connection
					include("partials/connect.php");
					
					// Handle the button click event
					if (isset($_GET['filter'])) {
						$filter = $_GET['filter'];

						// Check if the filter is set to "*" (All Products)
						if ($filter === '*') {
							$sqlProducts = "SELECT * FROM products";
						} else {
							// Modify this part based on your database schema
							$category = strtolower($filter);
							$sqlProducts = "SELECT p.*
											FROM products p
											JOIN categories c ON c.categoryID = p.categoryID
											WHERE c.categoryName = '$category'";
						}

						// Execute the query and fetch the products
						$resultProducts = $connect->query($sqlProducts);

						// Display the products
						while ($rowProduct = $resultProducts->fetch_assoc()) {
							$product = $rowProduct['ProductName'];
							echo '<button style="font-family: Open Sans, sans-serif;" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".' . strtolower($product) . '">';
							echo $product;
							echo '</button>';
						}
					}
					?>

					
					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
			</div>

			<div class="row isotope-grid">
				<?php

				while ($final = $result->fetch_assoc()) :
				?>
					<div class="col-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
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
									<a href="details.php?detail_id=<?php echo $final['productID']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" style="font-family: 'Open Sans', sans-serif;" >
										<?php echo $final['productName'] ?>
									</a>

									<span class="stext-105 cl3" style="font-family: 'Open Sans', sans-serif;">
										<?php echo number_format($final['productPrice'], 0, ',', '.') . 'đ'; ?>
									</span>
								</div>

							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>

		<!-- Pagination buttons -->
		<div class="flex-c-m flex-w w-full">
			<?php for ($i = 1; $i <= 4; $i++) : ?>
				<a href="product.php?page=<?php echo $i; ?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04 <?php echo $i === $page ? 'active' : ''; ?>">
					<?php echo $i; ?>
				</a>
			<?php endfor; ?>
		</div>
	</div>
		

	<!-- Footer -->
	<?php include ("partials/footer.php") ?>

</body>
</html>