<!DOCTYPE html>
<html lang="en">
<?php 
include ("partials/head.php") 
?>

<body class="animsition">
	
	<!-- Header -->
	<?php include ("partials/header.php") ?>
	
	<br><br>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04" style="font-family: 'Open Sans', sans-serif;">
				Trang Chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4" style="font-family: 'Open Sans', sans-serif;">
				Giỏ hàng của bạn
			</span>

		</div>
	</div>
		

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1 text-center" style="font-family: 'Open Sans', sans-serif;" >Tên sản phẩm</th>
									<th class="column-2 text-center" style="font-family: 'Open Sans', sans-serif;" >Giá sản phẩm</th>
									<th class="column-3 text-center" style="font-family: 'Open Sans', sans-serif;" >Số lượng</th>
									<th class="column-4 text-center" style="font-family: 'Open Sans', sans-serif;" >Giá tiền</th>
									<th class="column-5 text-center" style="font-family: 'Open Sans', sans-serif;" ></th>
								</tr>


								<?php
								$total = 0;
								if(isset($_SESSION['cart'])) {
									foreach ($_SESSION['cart'] as $key => $value) {
									$subtotal=$value['price'] * $value['quantity'];
									$total+=$subtotal; 
										
								?>

								<tr class="table_row">
									
									<td class="column-1 text-center" style="font-family: 'Open Sans', sans-serif;"><?php echo $value['name'] ?></td>
									<td class="column-2 text-center" style="font-family: 'Open Sans', sans-serif;"><?php echo number_format($value['price'], 0, ',', '.') . 'đ'; ?></td>

									<td class="column-3 text-center">
									<form method="POST" action="cartupdate.php">
										<input style="width: 50px; margin: auto; font-family: 'Open Sans', sans-serif;" class="mtext-104 cl3 text-center bg8"
											type="number" min="0" name="quantity" value="<?php echo $value['quantity']; ?>">
										<input type="hidden" name="item_id" value="<?php echo $value['item_id']; ?>" >
									</form>
														
									</td>

									<td class="column-4 text-center" style="font-family: 'Open Sans', sans-serif;"><?php echo number_format($subtotal, 0, ',', '.') . 'đ'; ?></td>

									<td class="column-5 text-center" style="font-family: 'Open Sans', sans-serif;">
										<div class="">
											<form action="cartremove.php" method="post">
											<button class="btn btn-outline-danger" name="remove" style="font-family: 'Open Sans', sans-serif;">Remove</button>
											<input type="hidden" name="item_id" value="<?php echo $value['item_id'] ?>">
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

						<p class="stext-110 m-t-20 m-b-20 text-center"><a href="product.php" style="font-family: 'Open Sans', sans-serif;">
							<button>
								<!-- You can use an icon from a library like Font Awesome -->
								<!-- Example using Font Awesome's arrow-left icon -->
								<i class="fa fa-reply"></i>
								Tiếp tục mua hàng
							</button>
						</a></p>

					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30" style="font-family: 'Open Sans', sans-serif;">
							Tổng tiền hàng
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2" style="font-family: 'Open Sans', sans-serif;">
									Tiền hàng:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2" style="font-family: 'Open Sans', sans-serif;">
								    <?php echo number_format($total, 0, ',', '.') . 'đ'; ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2" style="font-family: 'Open Sans', sans-serif;">
									Tiền giao hàng:
								</span>
							</div>

							<div class="size-209 p-r-0-sm w-full-ssm">
								<span class="mtext-110 cl2" style="font-family: 'Open Sans', sans-serif;">
									<?php 
                                    $shipfee = 0;
                                    if($total < 2000000) {
                                        $shipfee = 50000;
                                    }
                                    echo number_format($shipfee, 0, ',', '.') . 'đ'; 

                                    ?>

								</span>
								
								<div class="p-t-15">
                                    <!-- ínsert into orders and orderdetails table -->
                                    <form action="handler/orderhandler.php" method="post">
									<div class="bor8 bg0 m-b-22">
										<textarea class="stext-111 cl8 plh3 size-111 p-lr-15 p-tb-8" name="address" placeholder="Địa chỉ" style="font-family: 'Open Sans', sans-serif;" required></textarea>
									</div>

                                    <div class="bor8 bg0 m-b-22">
										<textarea class="stext-111 cl8 plh3 size-111 p-lr-15 p-tb-8" name="postcode" placeholder="Mã bưu điện" style="font-family: 'Open Sans', sans-serif;" required></textarea>
									</div>

									<div class="bor8 bg0 m-b-22">
										<textarea class="stext-111 cl8 plh3 size-111 p-lr-15 p-tb-8" name="phone" placeholder="Số điện thoại" style="font-family: 'Open Sans', sans-serif;" required></textarea>
									</div>

                                    <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-22">
                                        <select class="js-select2" name="payment"required> 
                                            <option value="1">Thanh toán bằng tiền mặt</option>
                                            <option value="2">Thanh toán qua online banking</option>
                                        </select>
                                        <div class="dropDownSelect2" style="font-family: 'Open Sans', sans-serif;"></div>
									</div>
                                
                                    <div class="bor8 bg0 m-b-22">
										<textarea class="stext-111 cl8 plh3 size-111 p-lr-15 p-tb-8" name="comment" style="font-family: 'Open Sans', sans-serif;"  placeholder="Thêm ghi chú"></textarea>
									</div>
										
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2" style="font-family: 'Open Sans', sans-serif;">
									Tổng cộng:
								</span>
							</div>

							<div class="size-209 p-t-1">
						 		<span class="mtext-110 cl2" style="font-family: 'Open Sans', sans-serif;">
								<?php 
                                $total += $shipfee;
                                echo number_format($total + $shipfee, 0, ',', '.') . 'đ'; 
                                ?>
								</span>
							</div>
						</div>

                        <input type="hidden" name="total" value="<?php echo $total ?>">
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer"
                        type="submit" name="placeorder" style="font-family: 'Open Sans', sans-serif;">
							Đặt Hàng
						</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
		

	<!-- Footer -->
	<?php include ("partials/footer.php") ?>

</body>
</html>