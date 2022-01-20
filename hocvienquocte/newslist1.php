<?php
	ob_start(); 
	include 'inc/header.php';
?>

<?php

if (!isset($_GET['catsubid']) || $_GET['catsubid'] == NULL) {
  echo "<script>window.location = '404.php'</script>";
} else {
  $id = $_GET['catsubid'];
}

$orderField = isset($_GET['field']) ? $_GET['field'] : "";
$orderSort = isset($_GET['sort']) ? $_GET['sort'] : "";

?>

<main>
		<div class="top_banner">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">

				<?php
				$name_catsub = $br->get_name_by_catsub($id);
				if($name_catsub){
					while($result_name = $name_catsub->fetch_assoc()){
						?>

				<div class="container">
					<div class="d-flex justify-content-center">
						<h1>TIN TỨC : <?php echo $result_name['catsubName'] ?></h1>
					</div>
				</div>

				<?php
					}
				}
				?>

			</div>
			<img style="opacity: 0.8;" src="img/bannertest.jpg" class="img-fluid" alt="">
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
                                    <option value="?catsubid=<?php echo $id ?>&field=newsId&sort=DESC">Mới nhất</option>
                                    <option value="?catsubid=<?php echo $id ?>&field=price&sort=ASC">Giá Thấp đến Cao</option>
                                    <option value="?catsubid=<?php echo $id ?>&field=price&sort=DESC">Giá Cao đến Thấp</option>
							</select>
						</div>
					</li>
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

				        	<?php 
                                $getall_category = $cat->show_category_fontend();
                                if($getall_category){
                                    while($result_allcategory = $getall_category->fetch_assoc()){
                            ?>

                            <?php $catid = $result_allcategory['catId'] ?>  <?php $catname = $result_allcategory['catName'] ?>

				            <h4>
				            	<a href="#filter_1" data-toggle="collapse" class="opened" style="background-color: lightgrey;">
				            		<?php echo $catname = $result_allcategory['catName'] ?>
				            	</a>
				            </h4>

				            <div class="collapse show" id="filter_1">
				                <ul style="line-height: 30px;">
				                    <?php 
                                    $getall_catsub_category = $br->show_catsub_fontend_and_category($catid);
                                    if($getall_catsub_category){
                                        while($result_allcatsub_category = $getall_catsub_category->fetch_assoc()){
                                    ?>

                                        <li>
                                        	<a style="color: #2B2A29" href="newslist1.php?catsubid=<?php echo $result_allcatsub_category['catsubId'] ?>">
                                        		<?php echo $result_allcatsub_category['catsubName'] ?>
                                        	</a>
                                        </li>
                                        
                                        <?php
                                            }
                                        }
                                        ?>
				                </ul>
				            </div>

				            <?php
                                }
                            }
                            ?>


				            <!-- /filter_type -->
				        </div>

				        
				        
				        
				        
				    </div>
				</aside>
				<!-- /col -->
				<div class="col-lg-9">
					<div class="row small-gutters">
						
						<?php
							if(!empty($orderField) && !empty($orderSort)){
								$newsbycatsub = $news->get_news_by_catsub_order($id, $orderField, $orderSort);
								
							}else{
								$newsbycatsub = $news->get_news_by_catsub($id);
							}

							if($newsbycatsub){
								while($result = $newsbycatsub->fetch_assoc()){
						?>
						
						<div class="row row_item">
		                    <div class="col-sm-4" style="display: flex;">
		                        <figure style="margin: auto;">
		                            <span class="ribbon new">New</span>
		                            <a href="detailsnews.php?newsid=<?php echo $result['newsId'] ?>">
		                                <img class="img-fluid lazy" src="admin/uploads/<?php echo $result['image'] ?>" data-src="admin/uploads/<?php echo $result['image'] ?>" alt="">
		                            </a>
		                        </figure>
		                    </div>
		                    <div class="col-sm-8">
		                        
		                        <a href="detailsnews.php?newsid=<?php echo $result['newsId'] ?>">
		                            <h3 style="margin-bottom: 20px;"><?php echo $result['newsName'] ?></h3>
		                        </a>

		                        <p><span style="font-weight: bold;">Ngày : </span><?php echo $fm->formatDate1($result['dateedit']) ?></p>

		                        <p style="all: unset;"><?php echo $fm->textShorten($result['news_desc'], 300) ?></p>

		                        <ul>
		                            <li>
		                            	<a href="detailsnews.php?newsid=<?php echo $result['newsId'] ?>" class="btn_1">
		                            		Xem thêm
		                            	</a>
		                            </li>

		                            <!-- <li><a href="#0" class="btn_1 gray tooltip-1" data-toggle="tooltip" data-placement="top" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
		                            <li><a href="#0" class="btn_1 gray tooltip-1" data-toggle="tooltip" data-placement="top" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> -->
		                        </ul>
		                    </div>
	                	</div>

						<?php
							}
						}else{
							echo '<p class="lead">Không có bài viết nào!';
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