<?php
	ob_start(); 
	include 'inc/header.php';
?>


<?php
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $insertCustomers = $cs->insert_customers($_POST);
        
    }
?>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        
        $login_Customers = $cs->login_customers($_POST);
        
    }
?>


<main class="bg_gray">

	<div class="container margin_30" style="padding-bottom: 80px;">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Trang chủ</a></li>
					<li>Đăng Nhập hoặc Đăng Ký</li>
				</ul>
			</div>
			<h1>Đăng Nhập hoặc Đăng Ký tài khoản</h1>
		</div>
		<!-- /page_header -->
		<?php
		$login_check = Session::get('customer_login');
		if ($login_check==false) {
			?>

		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-6 col-md-8">


				<div class="box_account">
					<h3 class="client">Đăng Nhập</h3>
					<?php
					if(isset($login_Customers)){
						echo $login_Customers;
					}
					?>
					<form action="" method="post">
						<div class="form_container">

							<div class="form-group">
								<input type="text" class="form-control" name="email" placeholder="Tài khoản">
							</div>

							<div class="form-group">
								<input type="password" class="form-control" name="password" id="password_in" value="" placeholder="Mật khẩu">
							</div>

							<div class="text-center">
								<input type="submit" name="login" value="Đăng Nhập" class="btn_1 full-width">
							</div>

						</div>
					</form>


				</div>
				
			</div>


			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Đăng Ký</h3> <!-- <small class="float-right pt-2">* Required Fields</small> -->
					<?php
					if(isset($insertCustomers)){
						echo $insertCustomers;
					}
					?>
					<form action="" method="POST">
						<div class="form_container">

							<div class="private box">
								<div class="form-group">
									<input type="text" class="form-control" name="email"  placeholder="Tài khoản" required="">
								</div>

								<div class="form-group">
									<input type="password" class="form-control" name="password" id="password_in_2" value="" placeholder="Mật khẩu" required="">
								</div>

								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<input type="text" name="name" class="form-control" placeholder="Họ tên" required="">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<input type="text" name="address" class="form-control" placeholder="Địa chỉ" required="">
										</div>
									</div>
								</div>
								<!-- /row -->

								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<div class="tinh_thanh">
												<select class="chon_lua" name="calc_shipping_provinces" required="">
												  <option value="">Tỉnh / Thành phố</option>
												</select>
											</div>
										</div>
									</div>
									<input class="billing_address_1" name="tinh" type="hidden" value="">
								</div>

								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<div class="tinh_thanh">
												<select class="chon_lua" name="calc_shipping_district" required="">
												  <option value="">Quận / Huyện</option>
												</select>
											</div>
										</div>
									</div>
									<input class="billing_address_2" name="" type="hidden" value="">
								</div>

								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<input type="number" name="phone" class="form-control" placeholder="Số điện thoại" required="">
										</div>
									</div>
								</div>
								<!-- /row -->


							</div>



							<!-- /company -->
							<!-- <hr> -->

							<div class="text-center">
								<input type="submit" name="submit" value="Đăng Ký" class="btn_1 full-width">
							</div>


						</div>
						<!-- /form_container -->
					</form>


				</div>
				<!-- /box_account -->
			</div>
		</div>

		<?php
		} else{
			echo "<span class='success' style='margin-left: 0px !important;' >Đăng nhập thành công</span>
					<div class='row justify-content-center'>
						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='index.php'>
								<i class='ti-shopping-cart'></i>
								<h3>Trang chủ</h3>
								<p>Đi tới trang chủ để mua hàng.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='payment.php'>
								<i class='ti-wallet'></i>
								<h3>Thanh toán</h3>
								<p>Đi đến trang thanh toán đơn hàng.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='orderdetails.php'>
								<i class='ti-truck'></i>
								<h3>Khoá học của bạn</h3>
								<p>Kiểm tra những khoá học đã đăng ký.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='profile.php'>
								<i class='ti-user'></i>
								<h3>Tài khoản của bạn</h3>
								<p>Kiểm tra thông tin tài khoản của bạn.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='contacts.php'>
								<i class='ti-comments'></i>
								<h3>Liên hệ</h3>
								<p>Liên hệ với chúng tôi khi cần hỗ trợ.</p>
							</a>
						</div>
					</div>
					";

		}
		?>

		<!-- /row -->
	</div>
	<!-- /container -->
</main>
	<!--/main-->
<?php
	include 'inc/footer.php';
?>