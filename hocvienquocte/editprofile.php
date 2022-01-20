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

<?php
 	$id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
       
        $UpdateCustomers = $cs->update_customers($_POST, $id);
        
    }
?>


<main class="bg_gray">

	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
			</div>
			<h1>Cập nhật thông tin tài khoản</h1>
		</div>
		<!-- /page_header -->
		<div class="row justify-content-center">

			<div class="col-xl-6 col-lg-6 col-md-8">
				<div class="box_account">
					<h3 class="new_client">Người dùng</h3> 

					<?php
						if(isset($UpdateCustomers)){
							echo $UpdateCustomers;
						}
						?>

					<form action="" method="post">
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
											<span>Họ tên</span>
											<input type="text" name="name" class="form-control" value="<?php echo $result['name'] ?>" >
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<span>Địa chỉ</span>
											<input type="text" name="address" class="form-control" value="<?php echo $result['address'] ?>" >
										</div>
									</div>
								</div>
								<!-- /row -->
								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<span>Thành phố</span>
											<input type="text" name="city" class="form-control" value="<?php echo $result['city'] ?>" >
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<span>Zipcode</span>
											<input type="text" name="zipcode" class="form-control" value="<?php echo $result['zipcode'] ?>" >
										</div>
									</div>
								</div>
								<!-- /row -->

								<div class="row no-gutters">
									<div class="col-6 pr-1">
										<div class="form-group">
											<div class="custom-select-form">
												<span>Khu vực</span>
												<select class="wide add_bottom_10" name="country" id="country">
													<option value="<?php echo $result['country'] ?>" selected><?php echo $result['country'] ?></option>
													<option value="Europe">Europe</option>
													<option value="United states">United states</option>
													<option value="Asia">Asia</option>
												</select>
											</div>
										</div>
									</div>
									<div class="col-6 pl-1">
										<div class="form-group">
											<span>Số điện thoại</span>
											<input type="text" name="phone" class="form-control" value="<?php echo $result['phone'] ?>" >
										</div>
									</div>
								</div>
								<!-- /row -->

							</div>

							<!-- <div class="form-group">
								<span>Email</span>
								<input type="email" class="form-control" name="email" id="email_2" value="<?php echo $result['email'] ?>" >
							</div> -->

							<!-- <div class="form-group">
								<span>Mật khẩu</span>
								<input type="password" class="form-control" name="password" id="password_in_2" value="" placeholder="Password*">
							</div> -->

							<!-- /company -->
							<hr>

							<div class="text-center">
								<input type="submit" name="save" value="Lưu thông tin" class="btn_1 full-width">
							</div>


						</div>
						<!-- /form_container -->
						<?php
					}
				}
				?>
					</form>

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