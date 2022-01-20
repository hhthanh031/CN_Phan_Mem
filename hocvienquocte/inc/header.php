<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
    
    include 'lib/database.php';
    include 'helpers/format.php';

    spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
    });
        

    $db = new Database();
    $fm = new Format();
    $ct = new cart();
    $us = new user();
    $br = new catsub();
    $cat = new category();
    $cs = new customer();
    $product = new product();
    $courses = new courses();
    $teacher = new teacher();
    $news = new news();    
                
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Học Viện Quốc Tế</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css/bootstrap.custom.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/home_1.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/product_page.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/listing.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/cart.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/faq.css" rel="stylesheet">

        <!-- SPECIFIC CSS -->
    <link href="css/checkout.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/account.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/error_track.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/contact.css" rel="stylesheet">

    <!-- SPECIFIC CSS -->
    <link href="css/about.css" rel="stylesheet">

</head>

<body>
    
    <div id="page">
        
    <header class="version_1">
        <div class="layer"></div><!-- Mobile menu overlay mask -->
        <div class="main_header">
            <div class="container">
                <div class="row small-gutters">
                    <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                        <div id="logo">
                            <a href="index.php"><img src="img/logo.svg" alt="" width="100" height="35"></a>
                        </div>
                    </div>
                    <nav class="col-xl-6 col-lg-7">
                        <a class="open_close" href="javascript:void(0);">
                            <div class="hamburger hamburger--spin">
                                <div class="hamburger-box">
                                    <div class="hamburger-inner"></div>
                                </div>
                            </div>
                        </a>
                        <!-- Mobile menu button -->
                        <div class="main-menu">
                            <div id="header_menu">
                                <a href="index.php"><img src="img/logo_black.svg" alt="" width="100" height="35"></a>
                                <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                            </div>
                            <ul style="width: 800px">
                                <li>
                                    <a href="about.php">Giới thiệu</a>
                                </li>
                                

                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Danh Mục</a>
                                    <ul>

                                    <?php 
                                        $getall_category = $cat->show_category_fontend();
                                        if($getall_category){
                                        while($result_allcategory = $getall_category->fetch_assoc()){
                                    ?>

                                <?php $catid = $result_allcategory['catId'] ?>  <?php $catname = $result_allcategory['catName'] ?>

                                        <li><a href="#0">
                                                <?php echo $catname = $result_allcategory['catName'] ?>
                                            </a>

                                            <ul>

                                                <?php 
                                                $getall_catsub_category = $br->show_catsub_fontend_and_category($catid);
                                                if($getall_catsub_category){
                                                    while($result_allcatsub_category = $getall_catsub_category->fetch_assoc()){
                                                ?>

                                                <li>
                                                    <a href="coursesbycatsubid.php?catid=<?php echo $catid ?>&catsubid=<?php echo $result_allcatsub_category['catsubId'] ?>">
                                                        <?php echo $result_allcatsub_category['catsubName'] ?>
                                                    </a>
                                                </li>

                                                <?php
                                                        }
                                                    }
                                                ?>
                                                
                                            </ul>
                                            
                                        </li>

                                        <?php
                                            }
                                        }
                                    ?>

                                    </ul>
                                </li>

                                <li>
                                    <a href="teacher.php">Giảng Viên</a>
                                </li>

                                <li class="submenu">
                                    <a href="javascript:void(0);" class="show-submenu">Tin Tức</a>
                                    <ul>

                                    <?php 
                                        $getall_category = $cat->show_category_fontend();
                                        if($getall_category){
                                        while($result_allcategory = $getall_category->fetch_assoc()){
                                    ?>

                                <?php $catid = $result_allcategory['catId'] ?>  <?php $catname = $result_allcategory['catName'] ?>

                                        <li><a href="#0">
                                                <?php echo $catname = $result_allcategory['catName'] ?>
                                            </a>

                                            <ul>

                                                <?php 
                                                $getall_catsub_category = $br->show_catsub_fontend_and_category($catid);
                                                if($getall_catsub_category){
                                                    while($result_allcatsub_category = $getall_catsub_category->fetch_assoc()){
                                                ?>

                                                <li>
                                                    <a href="newslist1.php?catid=<?php echo $catid ?>&catsubid=<?php echo $result_allcatsub_category['catsubId'] ?>">
                                                        <?php echo $result_allcatsub_category['catsubName'] ?>
                                                    </a>
                                                </li>

                                                <?php
                                                        }
                                                    }
                                                ?>
                                                
                                            </ul>
                                            
                                        </li>

                                        <?php
                                            }
                                        }
                                    ?>

                                    </ul>
                                </li>
                                
                                <li>
                                    <a href="contacts.php">Liên Hệ</a>
                                </li>

                                

                                <?php
                                        $login_check = Session::get('customer_login');
                                        if ($login_check==false) {
                                            echo '
                                            <li>
                                                <a href="login.php">Đăng Nhập</a>
                                            </li>';
                                        } else{
                                            echo '
                                            <li>
                                                <a href="?customer_id='.Session::get('customer_id').'">Đăng Xuất</a>
                                            </li>
                                            ';
                                        }
                                ?>
                                
                            </ul>
                        </div>
                        <!--/main-menu -->
                    </nav>
                    <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
                        <a class="phone_top" href="tel://9438843343"><strong><span>Cần giúp đỡ?</span>+84 869-321-727</strong></a>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </div>
        <!-- /main_header -->

        <div class="main_nav Sticky">
            <div class="container">
                <div class="row small-gutters">
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <nav class="categories">
                            <ul class="clearfix">
                                <li><span>
                                        <a href="#">
                                            <span class="hamburger hamburger--spin">
                                                <span class="hamburger-box">
                                                    <span class="hamburger-inner"></span>
                                                </span>
                                            </span>
                                            Tuỳ chọn
                                        </a>
                                    </span>

                                    <!-- MENU TUỲ CHỌN -->
                                    <div id="menu">
                                        <ul>
                                            
                                            <li>
                                                <a href="about.php">Giới thiệu</a>
                                            </li>

                                            <li>
                                                <a href="index.php">Trang chủ</a>
                                            </li>

                                            <li><span><a href="#0">Sản phẩm</a></span>
                                                <ul>
                                                    <?php 
                                                    $getall_cat = $cat->show_category_fontend();
                                                    if($getall_cat){
                                                        while($result_allcat = $getall_cat->fetch_assoc()){
                                                            ?>

                                                            <li>
                                                                <a href="coursesbycatid.php?catid=<?php echo $result_allcat['catId'] ?>">

                                                                    <?php echo $result_allcat['catName'] ?>
                                                                    
                                                                </a>

                                                            </li>
                                                            
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            
                                            <li>
                                                <a href="cart.php">Giỏ hàng</a>
                                            </li>

                                            <li>
                                                <a href="contacts.php">Liên hệ</a>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                        <form action="search.php" method="post">
                            <div class="custom-search-input">
                                <input type="text" placeholder="Nhập tên sản phẩm cần tìm" name="tukhoa">
                                <!-- <input type="submit" class="btn_1" value="Tìm kiếm" name="search_product" style="position: absolute; right: 3px"> -->
                                <button type="submit"><i class="header-icon_search_custom"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-3 col-lg-2 col-md-3">
                        <ul class="top_tools">
                            <li>
                                <div class="dropdown dropdown-cart">
                                    <a href="cart.php" onclick="window.location.href='cart.php'" class="cart_bt">
                                        <strong>
                                            
                                            <?php
                                            $check_cart = $ct->check_cart();
                                            if($check_cart){
                                                $qty = Session::get("qty");
                                                echo $qty ;
                                            }else{
                                                echo '0';
                                            }

                                            ?>

                                        </strong>
                                    </a>
                                    
                                </div>
                                <!-- /dropdown-cart-->
                            </li>
                            <li>
                                
                            </li>
                            <li>
                                <?php
                                    if(isset($_GET['customer_id'])){

                                        // XOÁ SẢN PHẨM TRONG GIỎ HÀNG KHI LOGOUT ACCOUNT
                                        $delCart = $ct->del_all_data_cart();
                                        // XOÁ SẢN PHẨM TRONG GIỎ HÀNG KHI LOGOUT ACCOUNT
                                        Session::destroy();
                                    }
                                ?>
                                <div class="dropdown dropdown-access">
                                    <a href="profile.php" class="access_link"><span>Tài khoản</span></a>

                                    <?php
                                        $login_check = Session::get('customer_login');
                                        if ($login_check==false) {
                                            echo '<div class="dropdown-menu">
                                            <a href="login.php" class="btn_1">Đăng Nhập hoặc Đăng Ký</a>
                                            </div>';
                                        } else{
                                            echo '<div class="dropdown-menu">
                                            <a href="?customer_id='.Session::get('customer_id').'" class="btn_1">Đăng Xuất</a>
                                                <ul>
                                                    <li>
                                                        <a href="profile.php"><i class="ti-user"></i>Thông tin tài khoản</a>
                                                    </li>
                                                    <li>
                                                        <a href="orderdetails.php"><i class="ti-truck"></i>Kiểm tra khoá học đã đăng ký</a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>';
                                        }
                                    ?>

                                    <!-- <div class="dropdown-menu">
                                        <a href="login.php" class="btn_1">Logout</a>
                                    </div> -->


                                </div>
                                <!-- /dropdown-access-->
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="btn_search_mob"><span>Tìm kiếm</span></a>
                            </li>
                            <li>
                                <a href="#menu" class="btn_cat_mob">
                                    <div class="hamburger hamburger--spin" id="hamburger">
                                        <div class="hamburger-box">
                                            <div class="hamburger-inner"></div>
                                        </div>
                                    </div>
                                    Tuỳ chọn
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <div class="search_mob_wp">
                <form action="search.php" method="post">
                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm cần tìm" name="tukhoa">
                    <input type="submit" class="btn_1 full-width" value="Tìm kiếm" name="search_product">
                </form>
            </div>
            <!-- /search_mobile -->
        </div>
        <!-- /main_nav -->
    </header>
    <!-- /header -->