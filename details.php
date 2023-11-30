<!DOCTYPE html>
<html lang="en">
<?php include ("partials/head.php") ?>

<body class="animsition">
	
	<!-- Header -->
	<?php include ("partials/header.php") ?>

	<!-- breadcrumb -->
	<div class="container">
		
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-120 p-b-60">
		<div class="container">
			<div class="row">
				<?php
				include("partials/connect.php");
				$id=$_GET['detail_id'];
				$sql="SELECT * FROM products WHERE productID = '$id'";
				$results=$connect->query($sql);

				$final=$results->fetch_assoc();

				?>  
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								
								<div class="item-slick3" data-thumb="<?php echo $final['productPicture'] ?>">
									<div class="wrap-pic-w pos-relative" style="height: 600px">
										<img src="<?php echo $final['productPicture'] ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $final['productPicture'] ?>">
					 						<i class="fa fa-expand"></i>
										</a>
									</div>
								</div> 
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14 text-center" style="font-family:Open Sans, sans-serif;">
							<?php echo $final['productName'] ?>
						</h4>

						<div class="mtext-106 cl2 text-center" style="font-family: 'Open Sans', sans-serif;">
						<?php echo number_format($final['productPrice'], 0, ',', '.') . 'đ'; ?>
						</div>

						<p class="stext-102 cl3 p-t-23 text-center" style="font-family: 'Open Sans', sans-serif;">
							<?php echo $final['productDescription'] ?>
						</p>
						
						<!-- cart session here and  -->
						<div class="p-t-33">

							<div class="flex-w flex-r-m p-b-10 justify-content-center">
								<div class="flex-w flex-m respon6-next">
									<button onclick="location.href='carthandler.php?item_id=<?php echo $final['productID'] ?>
									&name=<?php echo $final['productName'] ?>
									&price=<?php echo $final['productPrice'] ?>'"
									class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" 
									name="cart" style="font-family: 'Open Sans', sans-serif;">
										Thêm vào giỏ hàng
									</button>
								</div>
							</div>	

						</div>
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab" style="font-family: 'Open Sans', sans-serif;">Mô tả sản phẩm</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab" style="font-family: 'Open Sans', sans-serif;">Đánh giá sản phẩm</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6 text-center" style="font-family: 'Open Sans', sans-serif;">
								<?php echo $final['productDescription'] ?>
								</p>
							</div>
						</div>


						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">

										<!-- Review Example-->
										<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="images/avatar-01.jpg" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20" style="font-family: 'Open Sans', sans-serif;">
														Nguyễn Văn Thắng
													</span>

													<span class="fs-18 cl11">
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
														<i class="zmdi zmdi-star"></i>
													</span>
												</div>

												<p class="stext-102 cl6" style="font-family: 'Open Sans', sans-serif;">
														Sản phẩm tồi.
												</p>
											</div>
										</div>
										
										<!-- Add review form-->
										<form action="review.php" method="post" class="w-full">
											<h5 class="mtext-108 cl2 p-b-7" style="font-family: 'Open Sans', sans-serif;">
												Thêm đánh giá
											</h5>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16" style="font-family: 'Open Sans', sans-serif;">
													Đánh giá của bạn
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating" required>
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" style="font-family: 'Open Sans', sans-serif;" for="review">Mô tả</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review" style="font-family: 'Open Sans', sans-serif;"></textarea>
												</div>
											</div>

											<input type="hidden" name="productID" value="<?php echo $final['productID'] ?>">
											<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10" style="font-family: 'Open Sans', sans-serif;">
												Gửi nhận xét
											</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Related Products -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center" style="font-family: 'Open Sans', sans-serif;">
					Sản phẩm liên quan có thể bạn quan tâm
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">

				<div class="slick2">
	
				</div>
			</div>
		</div>
	</section>
		

	<!-- Footer -->
	<?php include ("partials/footer.php") ?>
</body>
</html>