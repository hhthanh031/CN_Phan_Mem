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
	 if(isset($_GET['proid'])){
	 	$customer_id = Session::get('customer_id');
         $proid = $_GET['proid']; 
         $delwlist = $product->del_wlist($proid,$customer_id);
     }
?>

	<main class="bg_gray">
		<div class="container margin_30" style="padding-bottom: 90px;">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="index.php">Trang chủ</a></li>
					<li>Mục yêu thích</li>
				</ul>
			</div>
			<h1>Mục yêu thích</h1>
		</div>
		<!-- /page_header -->

		<?php
		$customer_id = Session::get('customer_id');
		$check_wishlist = $product->check_wishlist($customer_id);
		if($check_wishlist==true){

			?>

		<table class="table table-striped cart-list">
							<thead>
								<tr>
									<th>
										Sản phẩm
									</th>
									<th>
										Giá
									</th>
									<th>
										
									</th>
									<th>
										
									</th>
									
								</tr>
							</thead>
							<tbody>

								<?php
								$customer_id = Session::get('customer_id');
								$get_wishlist = $product->get_wishlist($customer_id);
								if($get_wishlist){
									$i = 0;
									while($result = $get_wishlist->fetch_assoc()){
										$i++;
										?>

								<tr>
									<td>
										<div class="thumb_cart">
											<img src="admin/uploads/<?php echo $result['image'] ?>" alt=""/>
										</div>
										<a href="details.php?proid=<?php echo $result['productId'] ?>">
											<span class="item_cart"><?php echo $result['productName'] ?></span>
										</a>
									</td>
									<td>
										<strong><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></strong>
									</td>

									<td class="options">
										<a class="btn_1" href="details.php?proid=<?php echo $result['productId'] ?>">Xem chi tiết</a>
									</td>
									
									<td class="options">
										<a href="?proid=<?php echo $result['productId'] ?>"><i class="ti-trash"></i></a>
									</td>

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
						echo '<p class="lead">Bạn không có sản phẩm yêu thích nào!';
					}
					?>
					<!-- /cart_actions -->
	
		</div>
		<!-- /container -->
		
		
		<!-- /box_cart -->
		
	</main>
	<!--/main-->

<?php
	include 'inc/footer.php';
?>