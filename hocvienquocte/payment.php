<?php
	ob_start(); 
	include 'inc/header.php';
?>

<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>


<main class="bg_gray">
	

	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Trang chủ</a></li>
					<li><a href="cart.php">Giỏ hàng</a></li>
					<li>Chọn phương thức thanh toán</li>
				</ul>
			</div>
			<h1>Chọn phương thức thanh toán</h1>
		</div>
		<!-- /page_header -->
		

		<div class='row justify-content-center'>
						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='offlinepayment.php'>
								<i class='ti-shopping-cart'></i>
								<h3>Thanh toán trực tiếp</h3>
								<p>Thanh toán học phí tại học viện.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='onlinepayment.php'>
								<i class='ti-wallet'></i>
								<h3>Chuyển khoản</h3>
								<p>Chuyển học phí qua tài khoản ngân hàng.</p>
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