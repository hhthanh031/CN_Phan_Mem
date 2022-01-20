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
          KHOÁ HỌC / THÊM MỚI
        </h1>
      </div>
      
      <div class="col-xs-6" style="text-align: right;">
        <a href="courseslist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">QUẢN LÝ KHOÁ HỌC</span>
        </a>
      </div>

    </div>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header" style="background-image: linear-gradient(to right, rgb(182, 244, 146), rgb(51, 139, 147));">
            <h3 class="box-title" style="font-weight: bold;">NHẬP THÔNG TIN KHOÁ HỌC</h3>
        </div>
        <!-- /.box-header -->

        <form action="" method="post" enctype="multipart/form-data">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Mã khoá học</label>
                <input type="type" name="coursesCode" class="form-control"  placeholder="Nhập tên khoá học" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tên khoá học</label>
                <input type="type" name="coursesName" class="form-control"  placeholder="Nhập tên khoá học" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Số lượng học viên</label>
                <input type="number" name="quantity" class="form-control"  placeholder="Nhập số lượng học viên" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Giá khoá học</label>
                <input type="number" name="price" class="form-control"  placeholder="Nhập giá" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Địa điểm học</label>
                <select class="form-control select2 select2-hidden-accessible" required="" name="location" style="width: 100%;" >
                  <option value="" >-----Chọn địa điểm học-----</option>
                 
                  <option value="77 Xuân Hồng, P.12, Quận Tân Bình" selected>
                    77 Xuân Hồng, P.12, Quận Tân Bình
                  </option>
                     
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Trạng thái</label>
                <div class="radio">
                  <label style="margin-right: 10px;">
                    <input type="radio" name="status" id="optionsRadios1" value="1" checked="">
                    Mở lớp
                  </label>    
                  <label>
                    <input type="radio" name="status" id="optionsRadios2" value="0">
                    Đóng lớp
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label>Ảnh khoá học</label>
                <input type="file" name="image" class="form-control" id="exampleInputFile">
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Cấp độ khoá học</label>
                <input type="type" name="level" class="form-control"  placeholder="Nhập cấp độ khoá học" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Ngày khai giảng khoá học</label>
                <input type="date" name="dateedit" class="form-control"  placeholder="dd/mm/yyyy" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Lịch học (ngày học + thời gian học)</label>
                <input type="type" name="timelearn" class="form-control"  placeholder="Nhập lịch học" 
                         required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tổng thời gian khoá học</label>
                <input type="type" name="totaltime" class="form-control"  placeholder="Nhập tổng thời gian khoá học" 
                         required="">
              </div>

              <div class="form-group">
                <label>Ngành</label>
                <select class="form-control select2 select2-hidden-accessible" name="catId" required="" style="width: 100%;" >
                  <option value="">-----Chọn Ngành-----</option>
                  <?php
                  $cat = new category();
                  $catlist = $cat->show_category();

                  if($catlist){
                    while($result = $catlist->fetch_assoc()){
                     ?>

                     <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>

                     <?php
                   }
                 }
                 ?>
                </select>
              </div>

              <!-- /.form-group -->
              <div class="form-group">
                <label>Môn</label>
                <select class="form-control select2 select2-hidden-accessible" name="catsubId" required="" style="width: 100%;" >
                  <option value="">-----Chọn Môn-----</option>
                  <?php
                  $catsub = new catsub();
                  $catsublist = $catsub->show_catsub();

                  if($catsublist){
                    while($result = $catsublist->fetch_assoc()){
                     ?>

                    <option value="<?php echo $result['catsubId'] ?>">
                      <?php echo $result['catsubName'] ?>  /  [<?php echo $result['catName'] ?>]
                    </option>

                     <?php
                   }
                 }
                 ?>
                </select>
              </div>

              <div class="form-group">
                <label>Giảng viên</label>
                <select class="form-control select2 select2-hidden-accessible" name="teacherId" required="" style="width: 100%;" >
                  <option value="">-----Chọn Giảng Viên-----</option>
                  <?php
                  $teacher = new teacher();
                  $teacherlist = $teacher->show_teacher();

                  if($teacherlist){
                    while($result = $teacherlist->fetch_assoc()){
                     ?>

                     <option value="<?php echo $result['teacherId'] ?>">
                        <?php echo $result['teacherName'] ?> - <?php echo $result['catName'] ?> - <?php echo $result['catsubName'] ?>
                     </option>

                     <?php
                   }
                 }
                 ?>
                </select>
              </div>

              <!-- <div class="form-group">
                <label>Cấp khoá học</label>
                <select class="form-control select2 select2-hidden-accessible" name="type" style="width: 100%;" >
                  <option>-----Cấp khoá học-----</option>
                  <option value="0">Nổi bật</option>
                  <option value="1">Không nổi bật</option>
                </select>
              </div> -->

              

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Mô tả</label>
                  <textarea id="editor1" name="courses_desc" rows="10" cols="80" >
                  </textarea>
              </div>
            </div>
          </div>

          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

          <!-- <button type="button" class="btn btn-default" onclick="window.location.href='catelist.php';">Danh sách khoá học</button> 
          <button type="submit" class="btn btn-primary">Thêm mới</button> -->

          <a href="courseslist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">QUẢN LÝ KHOÁ HỌC</span>
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