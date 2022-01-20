<?php
	ob_start(); 
	include 'inc/header.php';
?>

<?php
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $insert_contacts = $cs->insert_contacts($_POST);
        
    }
?>

	<main class="bg_gray">
	
			<div class="container margin_60">
				<div class="main_title">
					<h2>Liên Hệ</h2>
					<!-- <p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p> -->
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-support"></i>
							<h2>Điện Thoại</h2>
							<a href="#0">+84 869-321-727</a> <!-- - <a href="#0">help@SteveThanh.com</a> -->
							<!-- <small>MON to FRI 9am-6pm SAT 9am-2pm</small> -->
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-map-alt"></i>
							<h2>Địa Chỉ</h2>
							<div>75 Xuân Hồng, P.12, Q.Tân Bình, TP.HCM</div>
							<!-- <small>MON to FRI 9am-6pm SAT 9am-2pm</small> -->
						</div>
					</div>
					<div class="col-lg-4">
						<div class="box_contacts">
							<i class="ti-package"></i>
							<h2>Email</h2>
							<a href="#0">hhthanh031@gmail.com</a> <!-- - <a href="#0">order@SteveThanh.com</a> -->
							<!-- <small>MON to FRI 9am-6pm SAT 9am-2pm</small> -->
						</div>
					</div>
				</div>
				<!-- /row -->				
			</div>
			<!-- /container -->
		<div class="bg_white">
			<div class="container margin_60_35">
				<?php
				if(isset($insert_contacts)){
					echo $insert_contacts;
				}
				?>
				<h4 class="pb-3">Gửi phản hồi</h4>

				<div class="row">
					<div class="col-lg-4 col-md-6 add_bottom_25">
						<form action="" method="post">
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Họ tên *" name="contactName" required="">
							</div>
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Địa chỉ *" name="contactAddress" required="">
							</div>
							<div class="form-group">
								<input class="form-control" type="text" placeholder="Số điện thoại *" name="contactPhone" required="">
							</div>
							<div class="form-group">
								<input class="form-control" type="email" placeholder="Email *" name="contactEmail" required="">
							</div>
							<div class="form-group">
								<textarea class="form-control" style="height: 150px;" placeholder="Nội dung *" name="contactMess" required=""></textarea>
							</div>
							<div class="form-group">
								<input class="btn_1 full-width" type="submit" name="submit" value="Gửi">
							</div>
						</form>
					</div>
					

					<div class="col-lg-8 col-md-6 add_bottom_25">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2129258976342!2d106.65072281462277!3d10.794997692308932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175294a7e465341%3A0x31e1a1e0fc842f21!2zNzUgWHXDom4gSOG7k25nLCBQaMaw4budbmcgNCwgVMOibiBCw6xuaCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1622997110614!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_white -->
	</main>
	<!--/main-->

<?php
	include 'inc/footer.php';
?>