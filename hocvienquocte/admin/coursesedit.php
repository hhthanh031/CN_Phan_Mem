<?php
  ob_start();
  include_once 'inc/header.php';
  include_once '../helpers/format.php';
?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php';?>
<?php include '../classes/catsub.php';?>
<?php include '../classes/courses.php';?>
<?php 
  ob_start(); 
  include 'connect.php';
  $fm = new Format();
  $loi = "";
  if(isset($_GET['coursesid'])){
    $coursesid = $_GET['coursesid'];
    $pro = mysqli_query($conn, "SELECT * FROM tbl_courses where coursesId = $coursesid ");
    $data = mysqli_fetch_assoc($pro);

    // LẤY RA ẢNH MÔ TẢ Ở BẢNG IMAGE
    $img_pro = mysqli_query($conn, "SELECT * FROM img_coursess WHERE id_courses = $coursesid ");
  }

  $category = mysqli_query($conn,"SELECT * FROM tbl_category");
  $catsub = mysqli_query($conn,"SELECT * FROM tbl_category_sub");
  $teacher = mysqli_query($conn,"SELECT * FROM tbl_teacher");

  if(isset($_POST['coursesCode'])){
    $coursesCode = $_POST['coursesCode'];
    $coursesName = $_POST['coursesName'];
    $category = $_POST['category'];
    $catsubId = $_POST['catsubId'];
    $teacherId = $_POST['teacherId'];
    $courses_desc = $_POST['courses_desc'];
    $price = $_POST['price'];
    $dateedit = $_POST['dateedit'];
    $timelearn = $_POST['timelearn'];
    $totaltime = $_POST['totaltime'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $quantity = $_POST['quantity'];
    $level = $_POST['level'];

    if(isset($_FILES['image'])){
      $file = $_FILES['image'];
      $file_name = $file['name'];
      // TRƯỜNG HỢP NGƯỜI DÙNG KHÔNG CHỌN ẢNH
      if(empty($file_name)){
        $file_name = $data['image'];
      } 
      // TRƯỜNG HỢP NGƯỜI DÙNG CHỌN ẢNH
      else{
        if($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg' || $file['type'] == 'image/png' ){
          move_uploaded_file($file['tmp_name'],'uploads/'.$file_name);
        }
        else {
          echo "Không đúng định dạng";
          $file_name = '';
        }
      }
    }

    $sql = "UPDATE tbl_courses SET coursesCode = '$coursesCode', coursesName = '$coursesName', catId = '$category' ,catsubId = '$catsubId' , teacherId = '$teacherId' , courses_desc = '$courses_desc', price = '$price' , dateedit = '$dateedit' , timelearn = '$timelearn' , totaltime = '$totaltime' , location = '$location' , status = '$status',image = '$file_name', basicquantity = '$quantity', quantity = '$quantity', level = '$level' WHERE coursesId = '$coursesid' ";

    $query = mysqli_query($conn, $sql);
    // $id_pro = mysqli_insert_id($conn);

    

    if($query){
      header('location: courseslist.php');
    } else{
      $loi = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Thông Báo!</h4>
                Chỉnh sửa thông tin bài viết không thành công. Xem lại mã bài viết (mã bài viết không được trùng nhau)
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
          KHOÁ HỌC / CẬP NHẬT
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
                <input type="type" name="coursesCode" class="form-control"  placeholder="Nhập tên bài viết" 
                        value="<?php echo $data['coursesCode'] ?>" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tên khoá học</label>
                <input type="type" name="coursesName" class="form-control"  placeholder="Nhập tên bài viết" 
                        value="<?php echo $data['coursesName'] ?>" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Số lượng học viên</label>
                <input type="type" name="quantity" class="form-control"  placeholder="Nhập tên bài viết" 
                        value="<?php echo $data['basicquantity'] ?>" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Giá</label>
                <input type="type" name="price" class="form-control"  placeholder="Nhập tên bài viết" 
                        value="<?php echo $data['price'] ?>" required="">
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
                    <input type="radio" name="status" id="optionsRadios1" value="1" <?php echo ($data['status'] == 1)?'checked':'' ?>>
                    Mở lớp
                  </label>    
                  <label>
                    <input type="radio" name="status" id="optionsRadios2" value="0" <?php echo ($data['status'] == 0)?'checked':'' ?>>
                    Đóng lớp
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label>Ảnh bài viết</label>
                <input type="file" name="image" class="form-control" id="exampleInputFile">
                <img src="uploads/<?php echo $data['image'] ?>" width="200" height="130px" style="margin-top: 15px">
              </div>

            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">Cấp độ</label>
                <input type="type" name="level" class="form-control"  placeholder="Nhập cấp độ" 
                        value="<?php echo $data['level'] ?>" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Ngày khai giảng (năm-tháng-ngày)</label>
                <input type="type" name="dateedit" class="form-control"  placeholder="Nhập ngày khai giảng khoá học" 
                        value="<?php echo $fm->formatYMD($data['dateedit']) ?>" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Lịch học</label>
                <input type="type" name="timelearn" class="form-control"  placeholder="Nhập lịch học" 
                        value="<?php echo $data['timelearn'] ?>" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Tổng thời gian khoá học</label>
                <input type="type" name="totaltime" class="form-control"  placeholder="Nhập tổng thời gian khoá học" 
                        value="<?php echo $data['totaltime'] ?>" required="">
              </div>
              
              <div class="form-group">
                <label>Ngành</label>
                <select class="form-control select2 select2-hidden-accessible" required="" name="category" style="width: 100%;">
                  <option value="">-----Chọn Ngành-----</option>
                  <?php
                    foreach ($category as $key => $value) {
                      # code...
                    
                     ?>

                     <option value="<?php echo $value['catId'] ?>" <?php echo (($value['catId'] == $data['catId']) ? 'selected' : '') ?>><?php echo $value['catName'] ?></option>

                     <?php
                   
                 }
                 ?>
                </select>
              </div>

              <!-- /.form-group -->
              <div class="form-group">
                <label>Môn</label>
                <select class="form-control select2 select2-hidden-accessible" required="" name="catsubId" style="width: 100%;">
                  <option value="">-----Chọn Môn-----</option>
                  <?php
                    foreach ($catsub as $key => $value) {
                      # code...
                    
                     ?>

                    <option value="<?php echo $value['catsubId'] ?>" 
                      <?php echo (($value['catsubId'] == $data['catsubId']) ? 'selected' : '') ?>>
                      <?php echo $value['catsubName'] ?>
                    </option>

                     <?php
                   
                 }
                 ?>
                </select>
              </div>

              <!-- /.form-group -->
              <div class="form-group">
                <label>Giảng Viên</label>
                <select class="form-control select2 select2-hidden-accessible" required="" name="teacherId" style="width: 100%;">
                  <option value="">-----Chọn Giảng Viên-----</option>
                  <?php
                    foreach ($teacher as $key => $value) {
                      # code...
                    
                     ?>

                    <option value="<?php echo $value['teacherId'] ?>" 
                      <?php echo (($value['teacherId'] == $data['teacherId']) ? 'selected' : '') ?>
                    >
                      <?php echo $value['teacherName'] ?>
                        
                    </option>

                     <?php
                   
                 }
                 ?>
                </select>
              </div>

              

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Mô tả</label>
                  <textarea id="editor1" name="courses_desc" rows="10" cols="80">
                    <?php echo $data['courses_desc'] ?>
                  </textarea>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

          <!-- <button type="button" class="btn btn-default" onclick="window.location.href='courseslist.php';">Danh sách bài viết</button> 
          <button type="submit" class="btn btn-primary">Sửa</button> -->

          <a href="courseslist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">QUẢN LÝ KHOÁ HỌC</span>
          </a>

           
          <button type="submit" class="btn btn-primary" style="margin-left: 0px; background-color: #badfb7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-plus-circle" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">CẬP NHẬT</span>
          </button>

        </div>

        </form>
      </div>
    <!-- /.box -->
  </section>
  </div>

  <?php include 'inc/footer.php' ?>