<?php
	ob_start(); 
	include 'inc/header.php';
?>

<?php
	$db = new Database();
	if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->del_courses_cart($cartid);
    }
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];

        $query = "SELECT * FROM tbl_courses WHERE coursesId = '$id'";
        $result = $db->select($query)->fetch_assoc();

        if ($result)
        {
        	if ($result['quantity'] >= $quantity)
        	{
        		$update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
        	} else {
        		echo " <script>alert('Số lượng sản phẩm không đủ!'); location.href=window.location.href;</script>";
        	}
        }
        
        if($quantity <= 0){
        	$delcart = $ct->del_courses_cart($cartId);
        }
    }
?>

<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>


	<main class="bg_gray">
		<div class="container margin_30" style="padding-bottom: 70px;">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Trang chủ</a></li>
					<li>Giỏ hàng</li>
				</ul>
			</div>
			<h1>Giỏ hàng</h1>
		</div>
		<!-- /page_header -->
		<?php
		if(isset($update_quantity_cart)){
			echo $update_quantity_cart;
		}
		?>

		<?php
		$check_cart = $ct->check_cart();
		if($check_cart){
			?>

		<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th style="width: 37%">
										Khoá học
									</th>
									<th style="width: 15%">
										Mã lớp
									</th>
									<th style="width: 15%">
										Ngày khai giảng
									</th>
									<th style="width: 20%">
										Lịch học
									</th>
									<th style="width: 15%">
										Học phí
									</th>
									<th>
										
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
										<strong><?php echo $result['coursesCode'] ?></strong>
									</td>
									<td>
										<strong><?php echo $fm->formatDate2($result['dateedit']) ?></strong>
									</td>
									<td>
										<strong><?php echo $result['timelearn'] ?></strong>
									</td>
									<td style="display:none;">
										<strong><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></strong>
									</td>
									<td style="display:none;">
										<form action="" method="post">
											<input type="hidden" name="id" value="<?php echo $result['coursesId'] ?>"/>
											<input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
											<input class="form-control text-center me-3" name="quantity" type="number" value="<?php echo $result['quantity'] ?>" min="0" style="max-width: 11rem; float: left; margin-bottom: 10px" />
											<input class="them-vao-gio-hang" type="submit" name="submit" value="Cập nhật" style="float: left;" />
										</form>
									</td>
									<td>
										<strong>
											<?php
											$total = $result['price'] * $result['quantity'];
											echo $fm->format_currency($total)." "."VNĐ";
											?>
										</strong>
									</td>
									<td class="options">
										<a onclick="return confirm('Bạn có muốn xóa không?');" href="?cartid=<?php echo $result['cartId'] ?>">
											<i class="ti-trash"></i>
										</a>
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

						<div class="row add_top_30 flex-sm-row-reverse cart_actions">
							<div class="col-sm-4 text-right">
								<a href="index.php">
									<button type="button" class="btn_1 outline">Tiếp tục mua hàng</button>
								</a>
							</div>
							
						</div>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		<div class="box_cart">
			<div class="container">
			<div class="row justify-content-end">
				<div class="col-xl-4 col-lg-4 col-md-6">
			<ul>
				<li>
					<span>Tổng tiền</span> 
					<?php 
					echo $fm->format_currency($subtotal)." "."VNĐ"; 
					Session::set('sum',$subtotal);
					Session::set('qty',$qty);
					?>
				</li>
			</ul>
			<a href="payment.php" class="btn_1 full-width cart">Thanh toán</a>
					</div>
				</div>
			</div>
		</div>
		<!-- /box_cart -->
		
		<?php
	}else{
		echo '<p class="lead">Không có sản phẩm nào trong giỏ hàng!';
	}
	?>

	</main>
	<!--/main-->
	
<?php
	include 'inc/footer.php';
?>