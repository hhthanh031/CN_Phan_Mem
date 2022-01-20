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
					<li><a href="#">Thông tin tài khoản</a></li>
					
				</ul>
			</div>
			<h1>Thông tin tài khoản</h1>
		</div>
		<!-- /page_header -->
		<div class="row justify-content-center">

			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Người dùng</h3> 
					
					<?php
					$id = Session::get('customer_id');
					$get_customers = $cs->show_customers($id);
					if($get_customers){
						while($result = $get_customers->fetch_assoc()){

							?>

					
						<div class="form_container">

							<div class="private box">
								<div class="row no-gutters">

									<div class="col-12">
										<div class="form-group">
											<span>Tài khoản</span>
											<input type="email" class="form-control" name="email" id="email_2" placeholder="<?php echo $result['email'] ?>" readonly="">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<span>Họ tên</span>
											<input type="text" name="name" class="form-control" placeholder="<?php echo $result['name'] ?>" readonly="">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<span>Địa chỉ</span>
											<input type="text" name="address" class="form-control" placeholder="<?php echo $result['address'] ?>" readonly="">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<span>Tỉnh / Thành phố</span>
											<input type="text" name="name" class="form-control" placeholder="<?php echo $result['_name'] ?>" readonly="">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<span>Quận / Huyện</span>
											<input type="text" name="name" class="form-control" placeholder="<?php echo $result['district'] ?>" readonly="">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<span>Số điện thoại</span>
											<input type="text" name="name" class="form-control" placeholder="<?php echo $result['phone'] ?>" readonly="">
										</div>
									</div>

								</div>
								<!-- /row -->


							</div>

							<!-- <div class="form-group">
								<span>Mật khẩu</span>
								<input type="password" class="form-control" name="password" id="password_in_2" value="" placeholder="Password*">
							</div> -->

							<!-- /company -->
							<!-- <hr>

							<div class="text-center">
								<a href="editprofile.php">
									<button class="btn_1 full-width">Cập nhật thông tin</button>
								</a>
							</div> -->


						</div>
						<!-- /form_container -->
					

					<?php
					}
				}
				?>

				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</main>
	<!--/main-->
<?php
	include 'inc/footer.php';
?>