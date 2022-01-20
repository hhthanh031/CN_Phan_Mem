<?php
	ob_start(); 
	include 'inc/header.php';
	$carts = [];
?>

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
				<div class="col-lg-6 col-md-6">
					<div class="step first">
						<h3>1. Thông tin nơi thanh toán</h3>

					<div class="box_general summary">
						<div class="form_container">

							<div class="private box">
								<div class="row no-gutters">
									<div class="col-12">
										<div class="form-group">
											<span>Địa chỉ</span>
											<input type="text" name="name" class="form-control" 
											placeholder="77 Xuân Hồng, P.12, Quận Tân Bình" 
											readonly="">
										</div>
									</div>

									<div class="col-12">
										<div class="form-group">
											<span>Thời gian làm việc</span>
											<input type="text" name="address" class="form-control" 
											placeholder="Thứ 2 đến Thứ 6 hằng tuần: từ 7g30 đến 19g00" 
											readonly="">
											<input type="text" name="address" class="form-control" 
											placeholder="Thứ 7 đến Chủ nhật hằng tuần: từ 7g30 đến 17g00" 
											readonly="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
						<!-- /form_container -->
						
					</div>
					<!-- /step -->
				</div>
				
				<div class="col-lg-6 col-md-6">
					<div class="step last">
						<h3>2. Thông tin đơn hàng</h3>

						
					<div class="box_general summary">

						<?php
						$check_cart = $ct->check_cart();
						if($check_cart){
							?>

					<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th style="width: 50%">
										Sản phẩm
									</th>
									<th style="width: 25%">
										Giá
									</th>
									<th style="width: 25%">
										Tổng
									</th>
									
								</tr>
							</thead>
							<tbody>

								<?php
								$get_courses_cart = $ct->get_courses_cart();
								if($get_courses_cart){
									$subtotal = 0;
									$qty = 0;
									while($result = $get_courses_cart->fetch_assoc()){
										?>
                                    <?php
                                        $carts[] = [
                                            'coursesID' => $result['coursesId'],
                                            'qty' => $result['quantity']
                                        ]
                                    ?>
								<tr>
									<td>
										
										<a href="details.php?coursesid=<?php echo $result['coursesId'] ?>">
											<span><?php echo $result['coursesName'] ?></span>
										</a>
										
									</td>
									<td>
										<strong><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></strong>
									</td>
									<td>
										<strong>
											<?php
											$total = $result['price'] * $result['quantity'];
											echo $fm->format_currency($total)." "."VNĐ";
											?>
										</strong>
									</td>
								</tr>
								
								<?php
								$subtotal += $total;
								$qty = $qty + $result['quantity'];
									}
								}
								?>
								
							</tbody>

						</table>
						
						<br>						

						<?php 
						
						Session::set('sum',$subtotal);
						Session::set('qty',$qty);
						?>

						<!-- <ul>
							<li class="clearfix"><em><strong>Tổng</strong></em>  <span><?php echo $fm->format_currency($subtotal)." "."VNĐ";  ?></span></li>
							<li class="clearfix"><em><strong>Tiền Ship</strong></em>  <span>0 VNĐ</span></li>
						</ul> -->

						<div class="total clearfix">Tổng tiền 
							<span>
								<?php 

								$ship = 15000;
								$gtotal = $subtotal;
								echo $fm->format_currency($gtotal).' '.'VNĐ' ;
								?>
							</span>
						</div>
						
						<a href="?orderid=order" class="btn_1 full-width">HOÀN TẤT</a>

						<?php
					}else{
						echo '<p class="lead">Không có sản phẩm nào trong giỏ hàng!';
					}
					?>

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

        // if(!empty($carts)) {
        //     foreach ($carts as $item)
        //     {
        //         $sql = "UPDATE tbl_courses SET quantity = quantity - " .$item['qty']." WHERE coursesId = ". $item['coursesID'];
        //         $sql1 = "UPDATE tbl_courses SET totalquantity = totalquantity + " .$item['qty']." WHERE coursesId = ". $item['coursesID'];
        //         $db->update($sql);
        //         $db->update($sql1);
        //     }
        // }

        $delCart = $ct->del_all_data_cart();
        header('Location:success.php');
    }
?>

<?php
	include 'inc/footer.php';
?>
