<?php
  ob_start();
  include_once 'inc/header.php';
?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php';?>
<?php include '../classes/catsub.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/teacher.php';?>

<?php 
  ob_start(); 
  include 'connect.php';
  $loi = "";
  if(isset($_POST['coursesCode'])){
    $coursesCode = $_POST['coursesCode'];
    $coursesName = $_POST['coursesName'];
    $catId = $_POST['catId'];
    $catsubId = $_POST['catsubId'];
    $teacherId = $_POST['teacherId'];
    $courses_desc = $_POST['courses_desc'];
    $price = $_POST['price'];
    $dateedit = $_POST['dateedit'];
    $timelearn = $_POST['timelearn'];
    $totaltime = $_POST['totaltime'];
    $location = $_POST['location'];
    $level = $_POST['level'];
    $status = $_POST['status'];
    $quantity = $_POST['quantity'];

    if(isset($_FILES['image'])){
      $file = $_FILES['image'];
      $file_name = $file['name'];
      if($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' ){
        move_uploaded_file($file['tmp_name'],'uploads/'.$file_name);
      }
      else {
        echo "Không đúng định dạng";
        $file_name = '';
      }
      
    }


    $sql = "INSERT INTO tbl_courses(coursesCode,coursesName,catId,catsubId,teacherId,courses_desc,price,dateedit,timelearn,totaltime,location,image,level,status,basicquantity,quantity) VALUES('$coursesCode','$coursesName','$catId','$catsubId','$teacherId','$courses_desc','$price','$dateedit','$timelearn','$totaltime','$location','$file_name','$level','$status','$quantity','$quantity')";

    

    $query = mysqli_query($conn, $sql);

    if($query){
      header('location: courseslist.php');
    } else{
      $loi = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Thông Báo!</h4>
                Thêm mới không thành công.
            </div>";
    }

  }
?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
      if($loi){
        echo $loi;
      }
      ?>
    

    <div class="row">
      <div class="col-xs-6">
        <h1 style="font-weight: bold; padding-bottom: 5px;">
          SẢN PHẨM / THÊM MỚI
        </h1>
      </div>
      

    </div>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header" style="background-image: linear-gradient(to right, rgb(182, 244, 146), rgb(51, 139, 147));">
            <h3 class="box-title" style="font-weight: bold;">NHẬP THÔNG TIN SẢN PHẨM</h3>
        </div>
        <!-- /.box-header -->

        <form action="" method="post" enctype="multipart/form-data">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Mã sản phẩm</label>
                <input type="type" name="coursesCode" class="form-control"  placeholder="Nhập mã sản phẩm" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tên sản phẩm</label>
                <input type="type" name="coursesName" class="form-control"  placeholder="Nhập tên sản phẩm" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                <input type="type" name="coursesName" class="form-control"  placeholder="Nhập mô tả sản phẩm" required="">
              </div>
              

              <div class="form-group">
                <label>Ảnh sản phẩm</label>
                <input type="file" name="image" class="form-control" id="exampleInputFile">
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Ngày nhập hàng</label>
                <input type="date" name="dateedit" class="form-control"  placeholder="dd/mm/yyyy" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Số lượng tồn</label>
                <input type="type" name="timelearn" class="form-control"  placeholder="Nhập số lượng tồn" 
                         required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Giá nhập</label>
                <input type="number" name="quantity" class="form-control"  placeholder="Nhập giá nhập" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Giá bán</label>
                <input type="number" name="price" class="form-control"  placeholder="Nhập giá bán" required="">
              </div>

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>

          

          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

          <!-- <button type="button" class="btn btn-default" onclick="window.location.href='catelist.php';">Danh sách sản phẩm</button> 
          <button type="submit" class="btn btn-primary">Thêm mới</button> -->

          <a href="courseslist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">QUẢN LÝ SẢN PHẨM</span>
          </a>

           
          <button type="submit" class="btn btn-primary" style="margin-left: 0px; background-color: #badfb7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-plus-circle" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">THÊM MỚI</span>
          </button>

        </div>

        </form>
      </div>
    <!-- /.box -->
  </section>
  </div>

  <?php include 'inc/footer.php' ?>