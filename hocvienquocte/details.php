<?php
	ob_start(); 
	include 'inc/header.php';
?>

<?php
	$db = new Database();
	$catsubId = "";
	if(!isset($_GET['coursesid']) || $_GET['coursesid']==NULL){
       //echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['coursesid']; 
    }
 	$customer_id = Session::get('customer_id');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {

        $coursesid = $_POST['coursesid'];
        $insertWishlist = $courses->insertWishlist($coursesid, $customer_id);
        
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $quantity = $_POST['quantity'];

        $query = "SELECT * FROM tbl_courses WHERE coursesId = '$id'";
        $result = $db->select($query)->fetch_assoc();

        if ($result)
        {
        	if ($result['quantity'] >= $quantity)
        	{
        		$insertCart = $ct->add_to_cart($quantity, $id);	
        	} else {
        		echo " <script>alert('Khoá học đã đủ người!'); location.href=window.location.href;</script>";
        	}
        }        
        
    }


    $get_courses_details = $courses->get_details($id);
    if($get_courses_details){
    	while($result_details = $get_courses_details->fetch_assoc()){
			    $catsubId = $result_details['catsubId'];

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


	th{
		text-align: center;
		vertical-align: middle !important;
		padding-top: 0.75rem !important;
		
	}

	td{
		text-align: center;

	}
</style>


	<main>

		<?php

		$get_courses_details = $courses->get_details($id);
		if($get_courses_details){
			while($result_details = $get_courses_details->fetch_assoc()){


				?> 

	    <div class="container margin_30">
	        
	        <div class="row">

	        	 

	            <div class="col-lg-6 magnific-gallery">
	            	
	                <p>
	                    <a href="admin/uploads/<?php echo $result_details['image'] ?>" title="Photo title" data-effect="mfp-zoom-in"><img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" class="img-fluid"></a>
	                </p>
	                                	               	               
	            </div>

	            

	            <div class="col-lg-6" id="sidebar_fixed">
	                <div class="breadcrumbs">
	                    <ul>
	                        <li><a href="index.php">Trang chủ</a></li>

	                        <li><a href="coursesbycatsubid.php?catsubid=<?php echo $result_details['catsubId'] ?>"><?php echo $result_details['catsubName']?></a></li>

	                        <li>Chi tiết khoá học</li>
	                    </ul>
	                </div>
	                <!-- /page_header -->
	                <div class="coursesd_info">
	                    <h3 style="margin-bottom: 1.5rem;"><?php echo $result_details['coursesName'] ?></h3>
	                    
	                    <p>Tổng thời gian khoá học:  <span style="font-weight: bold;"><?php echo $result_details['totaltime']?></span></p>

	                    <p>Lịch học:  <span style="font-weight: bold;"><?php echo $result_details['timelearn']?></span></p>

	                    <p>Địa điểm học:  <span style="font-weight: bold;"><?php echo $result_details['location']?></span></p>

	                    <p>Giảng viên: <a style="font-weight: bold;" href="teacherdetails.php?teacherid=<?php echo $result_details['teacherId'] ?>"><?php echo $result_details['teacherName']?></a> </p>
	                    
	                    <div class="coursesd_options">
	                        <div class="row">
	                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0" style="margin-right: 0px;
							    margin-left: 0px;
							    margin-top: auto;
							    margin-bottom: auto;">
	                            	<strong>GIÁ</strong>
	                            </label>
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
	                                <div class="price_main"  style="padding-top: unset;">
	                                	<span class="new_price">
	                                		<?php echo $fm->format_currency($result_details['price'])." "."VNĐ" ?>
	                                	</span>
	                                </div>
	                            </div>
	                        </div>
	                        
	                        <br>

	                        <div class="row">
	                            <!-- <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>SỐ LƯỢNG</strong></label> -->
	                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
	                            	<form action="" method="post">
	                            		<input class="form-control text-center me-3" id="inputQuantity" name="quantity" type="hidden" value="1" min="1" style="max-width: 12rem; float: left; margin-bottom: 10px" />
	                            		<input type="submit" name="submit" class="them-vao-gio-hang" value="ĐĂNG KÝ" />
	                            	</form>
	                            </div>
	                        </div>

	                        <?php
                        if(isset($insertCart)){
                            echo $insertCart;
                        }
                        ?>
                        
	                    </div>
	                    
	                </div>
	                <!-- /coursesd_info -->

	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container -->
	    
	    <?php
            }
        }
        ?>

	    <div class="tabs_courses">
	        <div class="container">
	            <ul class="nav nav-tabs" role="tablist">
	                <li class="nav-item">
	                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Mô tả</a>
	                </li>
	                <!-- <li class="nav-item">
	                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Reviews</a>
	                </li> -->
	            </ul>
	        </div>
	    </div>
	    <!-- /tabs_courses -->

	    <?php

		$get_courses_details = $courses->get_details($id);
		if($get_courses_details){
			while($result_details = $get_courses_details->fetch_assoc()){


				?>

	    <div class="tab_content_wrapper" style="padding-top: 10px">

	    	<div class="container" style="margin-top: 20px">
	            <table class="table table-striped cart-list" style="border: 1px solid">
							<thead>
								<tr>
									<th style="width: 25%; font-weight: bold;border-right: 1px solid black;">
										Mã lớp
									</th>
									<th style="width: 25%; font-weight: bold;border-right: 1px solid black;">
										Lịch học
									</th>
									<th style="width: 25%; font-weight: bold;border-right: 1px solid black;">
										Ngày khai giảng
									</th>
									<th style="width: 25%; font-weight: bold;border-right: 1px solid black;">
										Địa điểm học
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="border-right: 1px solid black;">
										<?php echo $result_details['coursesCode'] ?>
									</td>
									<td style="border-right: 1px solid black;">
										<?php echo $result_details['timelearn'] ?>
									</td>
									<td style="border-right: 1px solid black;">
										<?php echo $fm->formatDate2($result_details['dateedit']) ?>
									</td>
									<td style="border-right: 1px solid black;">
										<?php echo $result_details['location'] ?>
									</td>
								</tr>
							</tbody>
						</table>
			</div>
	    	
	        <div class="container">
	            <div class="tab-content" role="tablist">
	                <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
	                    <div class="card-header" role="tab" id="heading-A">
	                        <h5 class="mb-0">
	                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
	                                Chi tiết khoá học
	                            </a>
	                        </h5>
	                    </div>
	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
	                        <div class="card-body">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <p><?php echo $result_details['courses_desc'] ?></p>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>

	    <?php
            }
        }
        ?>

	    <div class="container margin_60_35">
	        <div class="main_title">
	            <h2>Khoá học liên quan</h2>
	            <span>khoá học</span>

	        </div>

	        <div class="owl-carousel owl-theme products_carousel">

				<?php
                    $getcourses_new = $courses->getcourses_related($catsubId);
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
	        
	        
	        <!-- /coursess_carousel -->
	    </div>
	    <!-- /container -->

	    <div class="feat">
			<div class="container">
				<ul>
					<!-- <li>
						<div class="box">
							<i class='ti-truck'></i>
							<div class="justify-content-center">
								<h3>Miễn Phí Vận Chuyển</h3>
								<p>Đối với các đơn hàng trên 300.000 VNĐ</p>
							</div>
						</div>
					</li> -->
					<li>
						<div class="box">
							<i class="ti-gift"></i>
							<div class="justify-content-center">
								<h3>Chất Lượng</h3>
								<p>Chất lượng khoá học tốt nhất</p>
							</div>
						</div>
					</li>
					<li>
						<div class="box">
							<i class="ti-headphone-alt"></i>
							<div class="justify-content-center">
								<h3>Hỗ Trợ 24/7</h3>
								<p>Hỗ trợ hàng đầu</p>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--/feat-->

	</main>
	<!-- /main -->

<?php
	include 'inc/footer.php';
?>