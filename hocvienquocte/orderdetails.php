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

	if (isset($_GET['deletedid'])) {
	    $id          = $_GET['deletedid'];
	    $time        = $_GET['time'];
	    $price       = $_GET['price'];
	    $deleted_shifted = $ct->deleted_shifted($id, $time, $price);
	}	

	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }
?>

	<main class="bg_gray">
		<div class="container margin_30" style="padding-bottom: 70px;">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Trang chủ</a></li>
					<li>Kiểm tra khóa học</li>
				</ul>
			</div>
			<h1>Khóa học đã đăng ký</h1>
		</div>
		<!-- /page_header -->
						<?php
							$customer_id = Session::get('customer_id');
							$check_order = $ct->check_order($customer_id);
							if($check_order==true){

						?>

						<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th style="width: 25%">
										Sản phẩm
									</th>

									<th style="width: 15%">
										Ngày đăng ký
									</th>

									<th style="width: 15%">
										Lịch Học
									</th>

									<th style="width: 15%">
										Tổng tiền
									</th>
									
									<th style="width: 15%">
										Trạng thái
									</th>

									<th style="width: 15%">
										Thao tác
									</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$customer_id = Session::get('customer_id');
								$get_cart_ordered = $ct->get_cart_ordered($customer_id);
								if($get_cart_ordered){
									$i = 0;
									$qty = 0;
									$total = 0;
									while($result = $get_cart_ordered->fetch_assoc()){
										$i++;
										$total = $result['price']*$result['quantity'];
										?>

								<tr>
									<td>
										<div class="thumb_cart">
											<img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/>
										</div>
										<a href="details.php?coursesid=<?php echo $result['coursesId'] ?>">
											<span class="item_cart"><?php echo $result['coursesName'] ?></span>
										</a>
										
									</td>

									<td>
										<?php echo $fm->formatDate($result['date_order']) ?>
									</td>
									
									<td>
										<strong><?php echo $result['timelearn'] ?></strong>
									</td>

									<td>
										<strong><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></strong>
									</td>

									<td>
										<?php
										if($result['status']=='0'){
											echo 'Chưa thanh toán';
										}elseif($result['status']==1){ 
											?>
											<span>Đã thanh toán</span>
											
											<?php
										}elseif($result['status']==2){
											echo 'Đã nhận';
										}

										?>


									</td>

									<!-- <td class="options">
										<strong>N/A</strong>
										<a onclick="return confirm('Bạn có muốn xóa không?');" href="?cartid=<?php echo $result['cartId'] ?>">
											<i class="ti-trash"></i>
										</a>
									</td> -->

									
									<?php
									if($result['status']=='0'){
										?>
										<td>
											<a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" class="btn_1" style="width: 100%" href="?deletedid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">
												Huỷ đăng ký
											</a>
										</td>
										<?php
									}else{
										?>
										<td><?php echo 'Cảm ơn bạn đã thanh toán'; ?></td>
										<?php
									}	
									?>
									
								</tr>
								
								<?php
								
									}
								}
								?>
								
							</tbody>

						</table>

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
							<div class="col-sm-4 text-right">
								<a href="index.php">
									<button type="button" class="btn_1 outline">Tiếp tục mua hàng</button>
								</a>
							</div>
							
						</div>
						<?php
					}else{
						echo '<p class="lead">Bạn không có khoá học đã đăng ký nào!';
					}
					?>
					<!-- /cart_actions -->
	
		</div>

	</main>
	<!--/main-->
	
<?php
	include 'inc/footer.php';
?>