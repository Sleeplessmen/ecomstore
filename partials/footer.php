<footer class="bg3 p-t-50 p-b-30">
		<div class="container">
			<div class="row">
				<!-- Left section -->
				<div class="col-sm-6 col-lg-6 p-b-50 text-center justify-content-center">
					<h4 class="stext-301 cl0 p-b-30" style="font-family: 'Open Sans', sans-serif;">
						Liên lạc với chúng tôi
					</h4>
					
					<p class="stext-107 cl7" style="font-family: 'Open Sans', sans-serif;">
						Nếu có bất cứ câu hỏi nào? Hãy cho chúng tôi biết tại cửa hàng ở tầng 8, 379 Hudson St, New York, NY 10018 hoặc gọi cho chúng tôi theo số (+1) 96 716 6879.
					</p>
					
					<div class="p-t-20">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-lr-12">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-lr-12">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-lr-12">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<!-- Right section section -->
				<div class="col-sm-6 col-lg-6 p-b-50 text-center">
					<h4 class="stext-301 cl0 p-b-30" style="font-family: 'Open Sans', sans-serif;">
						Nhận thông báo
					</h4>

					<form>
						<div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7 text-center" style="font-family: 'Open Sans', sans-serif;" type="text" name="email" placeholder="Email của bạn" required>
						</div>

						<div class="p-t-18 p-lr-107 d-flex justify-content-center">
							<button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04" style="font-family: 'Open Sans', sans-serif;">
								Đăng ký 
							</button>
						</div>
					</form>
				</div>
			</div>

			<div class="p-t-20 text-center">

				<p class="stext-107 cl6 txt-center" style="font-family: 'Open Sans', sans-serif;">
					Trang web được làm cho mục đích học tập.
				</p>
				<p class="stext-107 cl6 txt-center" style="font-family: 'Open Sans', sans-serif;">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Bản quyền &copy;<script>document.write(new Date().getFullYear());</script> Mọi quyền được bảo lưu | Được tạo bởi <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; phân phối bởi <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
