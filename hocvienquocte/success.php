<?php
	ob_start(); 
	include 'inc/header.php';
?>

	<main class="bg_gray">
		<div class="container">
            <div class="row justify-content-center">
				<div class="col-md-5">
					<div id="confirm" style="padding: 150px 15px 50px 15px !important;">
						<div class="icon icon--order-success svg add_bottom_15">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div>
					<h2>Đăng ký thành công!</h2>
					<p>Bạn vui lòng thanh toán trong thời gian sớm nhất</p>
					</div>
				</div>
			</div>
			<!-- /row -->
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6">
					<a class="box_topic" href="orderdetails.php" style="margin-bottom: 150px">
						<i class="ti-truck"></i>
						<h3>Thông tin đơn hàng</h3>
						<p>Xem lại thông tin đơn hàng ở đây</p>
					</a>
				</div>
			</div>
		</div>
		<!-- /container -->
		
	</main>
	<!--/main-->

<?php
	include 'inc/footer.php';
?>