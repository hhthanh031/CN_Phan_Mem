<?php
	ob_start(); 
	include 'inc/header.php';
	$carts = [];
?>

<style>
	.luuy{
    	margin-bottom: 20px;
	}

	.bang{
		text-align: center;
	}
</style>

<main class="bg_gray">
	
	<form action="" method="POST">	
	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Trang chủ</a></li>
					<li><a href="cart.php">Giỏ hàng</a></li>
					<li><a href="payment.php">Chọn phương thức thanh toán</a></li>
					<li>Thanh toán trực tiếp</li>
				</ul>
			</div>
			<h1>Thanh toán</h1>
		</div>
		<!-- /page_header -->
			<div class="row">
				
				
				<div class="col-lg-12 col-md-12">
					<div class="step last">
						<h3>1. Thông tin chuyển khoản</h3>
					<div class="box_general summary">

					<div class="luuy">
						<span>Bạn có thể đến bất kỳ ngân hàng nào ở Việt Nam (hoặc sử dụng Internet Banking) để chuyển học phí theo 
							thông tin như sau:
						</span>
					</div>

					<table class="table table-striped cart-list">
							<tbody>
								<tr>
									<td class="bang" style="width: 50%">
										<img src="img/Logo_Vietinbank.png" style="width: 180px; height: 100px;">
									</td>
									<td  style="width: 50%">
											<div>- Ngân hàng TMCP Công Thương Việt Nam - Chi nhánh TP.HCM</div>
											<div>- Tên tài khoản: Học Viện Quốc Tế</div>
											<div>- Số tài khoản: 1130 0000 1111</div>
									</td>
								</tr>
								
							</tbody>
					</table>

					<div class="luuy" style="margin-top: 20px">
						<span style="font-style: italic; font-weight: bold; text-decoration-line: underline;">Lưu ý:</span>
					</div>

					<div class="luuy" style="margin-top: 20px">
						<span>Bạn phải viết chính xác 100% tên tài khoản và số tài khoản để đảm bảo học phí được chuyển khoản đến đúng nơi</span>
					</div>

					<div class="luuy" style="margin-top: 20px; margin-bottom: 50px">
						<ul style="border-bottom: none; list-style: square !important; margin-left: 30px;">
	                                                <li style="font-weight: normal;">
		                                                - Trong khi chuyển khoản, trong phần nội dung, bạn vui lòng điền đầy đủ thông tin: Họ tên học viên (có thể khác với họ tên người chuyển khoản) Số điện thoại liên hệ - Tên khóa học (ngắn gọn) – Mã lớp vào phiếu chuyển tiền.</li>
	                                                <li style="font-weight: normal;">
		                                                - Do có rất nhiều giao dịch chuyển khoản, nên bạn nhớ giữ lại thông tin chuyển khoản và gửi email về <a href="mailto:tuvan@csc.hcmus.edu.vn">tuvan@csc.hcmus.edu.vn</a> để Bộ phận Ghi danh chúng tôi tiện đối chiếu và xuất biên lai cho bạn.</li>
	                                                <li style="font-weight: normal;">
		                                                - Trung Tâm luôn kiểm tra các giao dịch chuyển khoản mỗi ngày (từ Thứ 2 đến Thứ 6) và sẽ liên hệ với bạn ngay khi nhận được chuyển khoản của bạn tối đa khoảng 3 ngày</li>
                        </ul>
					</div>
						
						<br>						

						<a href="?orderid=order" class="btn_1 full-width">HOÀN TẤT</a>

					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
			</div>
			<!-- /row -->
		</div>

		</form>
		<!-- /container -->
	</main>
	<!--/main-->

<?php

    if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);

        if(!empty($carts)) {
            foreach ($carts as $item)
            {
                $sql = "UPDATE tbl_courses SET quantity = quantity - " .$item['qty']." WHERE coursesId = ". $item['coursesID'];
                $sql1 = "UPDATE tbl_courses SET totalquantity = totalquantity + " .$item['qty']." WHERE coursesId = ". $item['coursesID'];
                $db->update($sql);
                $db->update($sql1);
            }
        }

        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
    }
?>

<?php
	include 'inc/footer.php';
?>
