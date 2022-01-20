<?php
	ob_start(); 
	include 'inc/header.php';
?>

<?php
	$db = new Database();
	$catsubId = "";
	if(!isset($_GET['newsid']) || $_GET['newsid']==NULL){
       //echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['newsid']; 
    }
 	$customer_id = Session::get('customer_id');

    $get_news_details = $news->get_details($id);
    if($get_news_details){
    	while($result_details = $get_news_details->fetch_assoc()){
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

		$get_news_details = $news->get_details($id);
		if($get_news_details){
			while($result_details = $get_news_details->fetch_assoc()){


				?>

	    <div class="tab_content_wrapper" style="padding-top: 10px">
	    	
	        <div class="container">
	            <div class="tab-content" role="tablist">
	                <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A" 
	                    	style="padding: 25px 0px 15px 0px; background-color: #8EC5FC;
							background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%); margin-bottom: 20px">
		                    <h1 style="text-align: center;">
	    								<?php echo $result_details['newsName'] ?>
	    					</h1>
	    				</div>

	                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
	                        <div class="card-body">
	                            <div class="row">
	                                <div class="col-md-12">
	                                    <p><?php echo $result_details['news_desc'] ?></p>
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
	            <h2>Tin tức liên quan</h2>
	            <span>tin tức</span>

	        </div>

	        <div class="owl-carousel owl-theme products_carousel">

				<?php
                    $getnews_new = $news->getnews_related($catsubId);
                    if($getnews_new){
                        while($result = $getnews_new->fetch_assoc()){

                            ?>

				<div class="item">
					<div class="grid_item">
						<span class="ribbon new">New</span>
						<figure>
							<a href="detailsnews.php?newsid=<?php echo $result['newsId'] ?>">
								<img class="hinhanh" src="admin/uploads/<?php echo $result['image'] ?>" alt="">
							</a>
						</figure>
						<div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
						<a href="detailsnews.php?newsid=<?php echo $result['newsId'] ?>">
							<h3><?php echo $result['newsName'] ?></h3>
						</a>
						
					</div>
					<!-- /grid_item -->
				</div>

				<?php
                }
            }
            ?>
				
				<!-- /item -->
			</div>
	        
	        
	        <!-- /newss_carousel -->
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