<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include ("partials/head.php") 
?>

<body class="animsition">
	
	<!-- Header -->
	<?php include ("partials/header.php") ?>
	
	<br><br>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Cart
			</span>

		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-lr-0-xl">
						<?php
						$total = 0;
						if (empty($_SESSION['cart'])) {
							// Display a message when the cart is empty
							echo '<p class="stext-110 m-t-20 m-b-20 text-center">Cart is empty.</p>
							';
						} else {
						?>
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1 text-center">Name</th>
									<th class="column-2 text-center">Price</th>
									<th class="column-3 text-center">Quantity</th>
									<th class="column-4 text-center">Total</th>
									<th class="column-5 text-center"></th>
								</tr>


								<?php
								if(isset($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $key => $value) {
									$subtotal=$value['price'] * $value['quantity'];
									$total+=$subtotal; 
										
								?>

								<tr class="table_row">
									
									<td class="column-1 text-center"><?php echo $value['name'] ?></td>
									<td class="column-2 text-center"><?php echo number_format($value['price'], 0, ',', '.') . 'đ'; ?></td>

									<td class="column-3 text-center">
									<form method="POST" action="cartupdate.php">
										<input style="width: 50px; margin: auto" class="mtext-104 cl3 text-center bg8"
											type="number" min="0" name="quantity" value="<?php echo $value['quantity']; ?>">
										<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
									</form>
														
									</td>

									<td class="column-4 text-center"><?php echo number_format($subtotal, 0, ',', '.') . 'đ'; ?></td>

									<td class="column-5 text-center">
										<div class="">
											<form action="cartremove.php" method="post">
											<button class="btn btn-outline-danger" name="remove">Remove</button>
											<input type="hidden" name="id" value="<?php echo $value['id'] ?>">
											</form>
										</div>
										
									</td>
								</tr>

								<?php 
									}
								}

								?>
							</table>
						</div>
						<?php } ?>

						<p class="stext-110 m-t-20 m-b-20 text-center"><a href="product.php">
							<button>
								<!-- You can use an icon from a library like Font Awesome -->
								<!-- Example using Font Awesome's arrow-left icon -->
								<i class="fa fa-reply"></i>
								Continue Shopping
							</button>
						</a></p>

					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
								<?php echo number_format($total, 0, ',', '.') . 'đ'; ?>
								</span>
							</div>
						</div>

						<?php if($total > 0) { ?>
							<button onclick="location.href='cart2.php'" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Proceed To Checkout
							</button>
						<?php } else { ?>
							<button onclick="location.href='product.php'" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Add Something To Your Cart
							</button>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
		

	<!-- Footer -->
	<?php include ("partials/footer.php") ?>

</body>
</html>