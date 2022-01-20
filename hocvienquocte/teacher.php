<?php
	ob_start(); 
	include 'inc/header.php';
?>
		
	<main>
		<div class="top_banner">
			<div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
				<div class="container">
					<div class="d-flex justify-content-center"><h1>GIẢNG VIÊN</h1></div>
				</div>
			</div>
			<img src="img/bannertest.jpg" class="img-fluid" alt="">
		</div>
		<!-- /top_banner -->
		
			

			<div class="container margin_30">
			<div class="row small-gutters">

				<?php

                $teacherlist = $teacher->show_teacher();
                if($teacherlist){
                  while($result = $teacherlist->fetch_assoc()){
                    ?>
				
				<div class="col-6 col-md-4 col-xl-3">
					<div class="grid_item">
						<span class="ribbon new"><?php echo $result['catsubName'] ?></span>
						<figure>
							<a href="teacherdetails.php?teacherid=<?php echo $result['teacherId'] ?>">
								<img class="img-fluid lazy" src="admin/uploads/<?php echo $result['image'] ?>" data-src="admin/uploads/<?php echo $result['image'] ?>" alt="">
							</a>
						</figure>
						<a href="product-detail-1.html">
							<h3 style="font-size: 1.1rem;"><?php echo $result['teacherName'] ?></h3>
						</a>
						<div class="price_box">
							<span class="new_price"><?php echo $result['degree'] ?></span>
						</div>
						
					</div>
					<!-- /grid_item -->
				</div>
				<!-- /col -->

				<?php
	                  }
	                }
	            ?>

			</div>
			<!-- /row -->
				
			
				
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->
	
<?php
	include 'inc/footer.php';
?>