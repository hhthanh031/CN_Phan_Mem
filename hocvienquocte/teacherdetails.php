<?php
	ob_start(); 
	include 'inc/header.php';
?>

<?php
	$db = new Database();
	
	if(!isset($_GET['teacherid']) || $_GET['teacherid']==NULL){
       //echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['teacherid']; 
    }
 	$customer_id = Session::get('customer_id');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {

        $teacherid = $_POST['teacherid'];
        $insertWishlist = $teacher->insertWishlist($teacherid, $customer_id);
        
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $quantity = $_POST['quantity'];

        $query = "SELECT * FROM tbl_teacher WHERE teacherId = '$id'";
        $result = $db->select($query)->fetch_assoc();

        if ($result)
        {
        	if ($result['quantity'] >= $quantity)
        	{
        		$insertCart = $ct->add_to_cart($quantity, $id);	
        	} else {
        		echo " <script>alert('Số lượng khoá học không đủ!'); location.href=window.location.href;</script>";
        	}
        }        
        
    }
    
?>

<style>
	.hinhanh{
		max-width:100%;
		height:150px;
		vertical-align: middle;
    	border-style: none;
	}
</style>

	<main>

		<?php

		$get_teacher_details = $teacher->get_details($id);
		if($get_teacher_details){
			while($result_details = $get_teacher_details->fetch_assoc()){


				?> 

	    <div class="container margin_30">
	        
	        <div class="row">

	        	 

	            <div class="col-lg-6 magnific-gallery">
	            	
	                <p>
	                    <a href="admin/uploads/<?php echo $result_details['image'] ?>" title="Photo title" data-effect="mfp-zoom-in"><img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" class="img-fluid"></a>
	                </p>
	                                	               	               
	            </div>

	            

	            <div class="col-lg-6" id="sidebar_fixed">
	                <!-- /page_header -->
	                <div class="teacherd_info">
	                	<h1 style="text-align: center;">THÔNG TIN</h1>
	                    
	                    <div class="prod_options" style="text-align: center;">
	                        <div class="row" style="margin: 20px; border-bottom: 1px solid;">
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6 pt-0" style="font-weight: bold;"><strong>Họ tên</strong></label>
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6"><?php echo $result_details['teacherName'] ?></label>
	                        </div>
	                        <div class="row" style="margin: 20px; border-bottom: 1px solid;">
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6 pt-0"><strong>Năm sinh</strong></label>
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6"><?php echo $fm->formatYear($result_details['datebirth']) ?></label>
	                        </div>
	                        <div class="row" style="margin: 20px; border-bottom: 1px solid;">
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6 pt-0"><strong>Số điện thoại</strong></label>
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6"><?php echo $result_details['phone'] ?></label>
	                        </div>
	                        <div class="row" style="margin: 20px; border-bottom: 1px solid;">
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6 pt-0"><strong>Email</strong></label>
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6"><?php echo $result_details['email'] ?></label>
	                        </div>
	                        <div class="row" style="margin: 20px; border-bottom: 1px solid;">
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6 pt-0"><strong>Bằng cấp</strong></label>
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6"><?php echo $result_details['degree'] ?></label>
	                        </div>
	                        <div class="row" style="margin: 20px; border-bottom: 1px solid;">
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6 pt-0"><strong>Ngành</strong></label>
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6"><?php echo $result_details['catName'] ?></label>
	                        </div>
	                        <div class="row" style="margin: 20px; border-bottom: 1px solid;">
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6 pt-0"><strong>Môn</strong></label>
	                            <label class="col-xl-6 col-lg-6  col-md-6 col-6"><?php echo $result_details['catsubName'] ?></label>
	                        </div>
	                    </div>
	                    
	                </div>
	                <!-- /teacherd_info -->

	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	    
	    <?php
            }
        }
        ?>

        <?php
		$check_courses = $teacher->check_courses($id);
		if($check_courses){
			?>

	    <div class="container margin_60_35">
	        <div class="main_title">
	            <h2>KHOÁ HỌC CỦA GIẢNG VIÊN</h2>
	            <span>KHOÁ HỌC</span>

	        </div>

	        <div class="owl-carousel owl-theme products_carousel">

				<?php
                    $getteacher_new = $teacher->getcourses_related($id);
                    if($getteacher_new){
                        while($result = $getteacher_new->fetch_assoc()){

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
							<li><a href="details.php?teacherid=<?php echo $result['teacherId'] ?>" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Xem chi tiết"><i class="ti-shopping-cart"></i><span>Xem chi tiết</span></a></li>
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
	        
	        
	        <!-- /teachers_carousel -->
	    </div>
	    
	    <?php
			}else{
				//echo '<p class="lead">Không có sản phẩm nào trong giỏ hàng!';
			}
		?>

	    
		<!--/feat-->

	</main>
	<!-- /main -->

<?php
	include 'inc/footer.php';
?>