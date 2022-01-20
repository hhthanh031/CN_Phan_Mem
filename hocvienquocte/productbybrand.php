<?php
	ob_start(); 
	include 'inc/header.php';
?>

<?php

if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
  echo "<script>window.location = '404.php'</script>";
} else {
  $id = $_GET['brandid'];
}

$orderField = isset($_GET['field']) ? $_GET['field'] : "";
$orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";

?>

<main>
		<div class="top_banner">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">

				<?php
				$name_brand = $br->get_name_by_brand($id);
				if($name_brand){
					while($result_name = $name_brand->fetch_assoc()){
						?>

				<div class="container">
					
					<h1 style="font-size: 3rem;"><?php echo $result_name['brandName'] ?></h1>

				</div>

				<?php
							}
						}
						?>

			</div>
			<img style="opacity: 0.8;" src="img/plp_Ekko_banner_1617x365.jpg.jpeg" class="img-fluid" alt="">
		</div>
		<!-- /top_banner -->
			<div id="stick_here"></div>		
			<div class="toolbox elemento_stick">
				<div class="container">
				<ul class="clearfix">
					<li>
						<div class="sort_select">
							<select name="sort" id="sort" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                                    <option selected="selected">Sắp xếp</option>
                                    <option value="?brandid=<?php echo $id ?>&field=productId&sort=DESC">Mới nhất</option>
                                    <option value="?brandid=<?php echo $id ?>&field=price&sort=ASC">Giá Thấp đến Cao</option>
                                    <option value="?brandid=<?php echo $id ?>&field=price&sort=DESC">Giá Cao đến Thấp</option>
							</select>
						</div>
					</li>
					<!-- <li>
						<a href="#0"><i class="ti-view-grid"></i></a>
						<a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
					</li>
					<li>
						<a href="#0" class="open_filters">
							<i class="ti-filter"></i><span>Filters</span>
						</a>
					</li> -->
				</ul>
				</div>
			</div>
			<!-- /toolbox -->
			
			<div class="container margin_30">
			
			<div class="row">
				<aside class="col-lg-3" id="sidebar_fixed">
				    <div class="filter_col">
				        <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
				        <div class="filter_type version_2">
				            <h4><a href="#filter_1" data-toggle="collapse" class="opened">Sản phẩm</a></h4>
				            <div class="collapse show" id="filter_1">
				                <ul style="line-height: 30px;">
				                    <?php 
                                        $getall_brand = $br->show_brand_fontend();
                                        if($getall_brand){
                                            while($result_allbrand = $getall_brand->fetch_assoc()){
                                                ?>

                                        <li>
                                        	<a style="color: #2B2A29" href="productbybrand.php?brandid=<?php echo $result_allbrand['brandId'] ?>">
                                        		<?php echo $result_allbrand['brandName'] ?>
                                        	</a>
                                        </li>
                                        
                                        <?php
                                            }
                                        }
                                        ?>
				                </ul>
				            </div>
				            <!-- /filter_type -->
				        </div>
				        
				        
				        
				    </div>
				</aside>
				<!-- /col -->
				<div class="col-lg-9">
					<div class="row small-gutters">
						
						<?php
							if(!empty($orderField) && !empty($orderSort)){
								$productbybrand = $br->get_product_by_brand_order($id, $orderField, $orderSort);
								
							}else{
								$productbybrand = $br->get_product_by_brand($id);
							}

							if($productbybrand){
								while($result = $productbybrand->fetch_assoc()){
						?>
						
						<div class="col-6 col-md-4">
							<div class="grid_item">
								<!-- <span class="ribbon new">New</span> -->
								<figure>
									<a href="details.php?proid=<?php echo $result['productId'] ?>">
										<img class="img-fluid lazy" src="admin/uploads/<?php echo $result['image'] ?>" data-src="admin/uploads/<?php echo $result['image'] ?>" alt="">
									</a>
								</figure>
								<a href="details.php?proid=<?php echo $result['productId'] ?>">
									<h3><?php echo $result['productName'] ?></h3>
								</a>
								<div class="price_box">
									<span class="new_price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span>
								</div>
								<ul>
									<li><a href="details.php?proid=<?php echo $result['productId'] ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Xem chi tiết"><i class="ti-shopping-cart"></i><span>Xem chi tiết</span></a></li>
								</ul>
							</div>
							<!-- /grid_item -->
						</div>

						<?php
							}
						}else{
							echo '<p class="lead">Không có sản phẩm nào!';
						}
						?>
						
					</div>
					<!-- /row -->

					<!-- PHÂN TRANG -->

					<!-- <div class="pagination__wrapper">
						<ul class="pagination">
							<li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
							<li>
								<a href="#0" class="active">1</a>
							</li>
							<li>
								<a href="#0">2</a>
							</li>
							<li>
								<a href="#0">3</a>
							</li>
							<li>
								<a href="#0">4</a>
							</li>
							<li><a href="#0" class="next" title="next page">&#10095;</a></li>
						</ul>
					</div> -->

				</div>
				<!-- /col -->
			</div>
			<!-- /row -->			
				
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->

<?php
	include 'inc/footer.php';
?>