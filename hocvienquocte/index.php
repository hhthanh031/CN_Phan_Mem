<?php
	ob_start(); 
	include 'inc/header.php';
	include 'inc/sidebar.php';
?>

<style>
	.hinhanh{
		max-width:100%;
		height:150px;
		vertical-align: middle;
    	border-style: none;
    	
	}

	.zoom{
		transform: scale(1);
		transition: all 0.5s;
	}

	.zoom:hover{
		transform: scale(1.1);
	}
</style>

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Chương Trình Đào Tạo</h2>
				<span>Chương Trình Đào Tạo</span>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
			</div>
			<div class="row small-gutters">
				
				<?php
                    $get_catsub_item = $br->get_catsub_item();
                    if($get_catsub_item){
                        while($result = $get_catsub_item->fetch_assoc()){

                            ?>

				<!-- /col -->
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						
						<figure class="zoom">
							<a href="coursesbycatsubid.php?catsubid=<?php echo $result['catsubId'] ?>">
								<img class="hinhanh" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
								<!-- <img class="img-fluid lazy" src="img/coursess/courses_placeholder_square_medium.jpg" data-src="img/coursess/shoes/5_b.jpg" alt=""> -->
							</a>
						</figure>
						
						<a href="coursesbycatsubid.php?catsubid=<?php echo $result['catsubId'] ?>">
							<h3 style="font-size: 1.25rem;"><?php echo $result['catsubName'] ?></h3>
						</a>
						
						
					</div>
					<!-- /grid_item -->
				</div>
				
				<?php
                }
            }
            ?>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Khoá Học</h2>
				<span>Khoá Học</span>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
			</div>
			<div class="row">

				<?php
                    $courses_feathered = $courses->getcourses_feathered_limit4();
                    if($courses_feathered){
                        while($result = $courses_feathered->fetch_assoc()){

                            ?>

				<div class="col-lg-6">
					<a class="box_news" href="details.php?coursesid=<?php echo $result['coursesId'] ?>">
						<figure>
							<img src="admin/uploads/<?php echo $result['image'] ?>" data-src="admin/uploads/<?php echo $result['image'] ?>" alt="" width="400" height="266" class="lazy">
							<figcaption>
								<?php echo $fm->formatDay($result['dateedit']) ?>/<?php echo $fm->formatMonth($result['dateedit']) ?>
								<?php echo $fm->formatYear($result['dateedit']) ?>
							</figcaption>
						</figure>
						<ul>
							<li>Giáo viên : <?php echo $result['teacherName'] ?></li>
							<li><?php echo $fm->formatDate1($result['dateedit']) ?></li>
						</ul>
						<h4><?php echo $result['coursesName'] ?></h4>
						<p><span style="font-weight: bold;">Thời lượng : </span><?php echo $result['totaltime'] ?> <br>
						<span style="font-weight: bold;">Thời gian học : </span><?php echo $result['timelearn'] ?> <br>
						<span style="font-weight: bold;">Giá : </span><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></p>
					</a>
				</div>
				
				<?php
                }
            }
            ?>
				
			</div>
			<!-- /row -->
		</div>

		<div class="featured lazy" data-bg="url(img/bannertest.jpg)">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
				<div class="container margin_60">
					<div class="row justify-content-center justify-content-md-start">
						<div class="col-lg-6 wow" data-wow-offset="150">
							<h3>HỌC VIỆN<br>giáo dục và đào tạo Quốc tế TP.HCM</h3>
							<!-- <p>Lightweight cushioning and durable support with a Phylon midsole</p> -->
							<!-- <div class="feat_text_block">
								<a class="btn_1" href="index.php" role="button">Mua Ngay</a>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /featured -->

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Khoá học nổi bật</h2>
				<span>Khoá học</span>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
			</div>
			<div class="row small-gutters">
				
				<?php
                    $courses_feathered = $courses->getcourses_feathered();
                    if($courses_feathered){
                        while($result = $courses_feathered->fetch_assoc()){

                            ?>

				<!-- /col -->
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon hot">Hot</span>
						<figure>
							<a href="details.php?coursesid=<?php echo $result['coursesId'] ?>">
								<img class="hinhanh" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
								<!-- <img class="img-fluid lazy" src="img/coursess/courses_placeholder_square_medium.jpg" data-src="img/coursess/shoes/5_b.jpg" alt=""> -->
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="details.php?coursesid=<?php echo $result['coursesId'] ?>">
							<h3><?php echo $result['coursesName'] ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span>
						</div>
						<ul>
							<li><a href="details.php?coursesid=<?php echo $result['coursesId'] ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Xem chi tiết"><i class="ti-shopping-cart"></i><span>Xem chi tiết</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>
				
				<?php
                }
            }
            ?>

			</div>
			<!-- /row -->
		</div>

		<div class="container margin_60_35">
			<div class="main_title">
				<h2>Khoá học mới</h2>
				<span>Khoá học</span>
				<!-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> -->
			</div>
			<div class="owl-carousel owl-theme products_carousel">

				<?php
                    $getcourses_new = $courses->getcourses_new();
                    if($getcourses_new){
                        while($result = $getcourses_new->fetch_assoc()){

                            ?>

				<div class="item">
					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="details.php?coursesid=<?php echo $result['coursesId'] ?>">
								<img class="hinhanh" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="details.php?coursesid=<?php echo $result['coursesId'] ?>">
							<h3><?php echo $result['coursesName'] ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span>
						</div>
						<ul>
							<li><a href="details.php?coursesid=<?php echo $result['coursesId'] ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Xem chi tiết"><i class="ti-shopping-cart"></i><span>Xem chi tiết</span></a></li>
						</ul>
					</div>
					<!-- /grid_item -->
				</div>

				<?php
                }
            }
            ?>
				
				<!-- /item -->
			</div>
			<!-- /products_carousel -->
		</div>
		<!-- /container -->
		
		<div class="bg_gray">
			<div class="container margin_30">
				<div id="brands" class="owl-carousel owl-theme">
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_1.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_2.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_3.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_4.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_5.png" alt="" class="owl-lazy"></a>
					</div><!-- /item -->
					<div class="item">
						<a href="#0"><img src="img/brands/placeholder_brands.png" data-src="img/brands/logo_6.png" alt="" class="owl-lazy"></a>
					</div><!-- /item --> 
				</div><!-- /carousel -->
			</div><!-- /container -->
		</div>
		<!-- /bg_gray -->

		<!-- /container -->
	</main>
	<!-- /main -->
<?php
	include 'inc/footer.php';
?>