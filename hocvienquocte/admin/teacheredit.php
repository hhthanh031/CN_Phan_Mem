<?php
  ob_start();
  include_once 'inc/header.php';
  include_once '../helpers/format.php';
?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php';?>
<?php include '../classes/catsub.php';?>
<?php include '../classes/teacher.php';?>


<?php 
  ob_start(); 
  include 'connect.php';
  $fm = new Format();
  $loi = "";
  if(isset($_GET['teacherid'])){
    $teacherid = $_GET['teacherid'];
    $pro = mysqli_query($conn, "SELECT * FROM tbl_teacher where teacherId = $teacherid ");
    $data = mysqli_fetch_assoc($pro);

    // LẤY RA ẢNH MÔ TẢ Ở BẢNG IMAGE
    $img_pro = mysqli_query($conn, "SELECT * FROM img_teachers WHERE id_teacher = $teacherid ");
  }

  $category = mysqli_query($conn,"SELECT * FROM tbl_category");
  $catsub = mysqli_query($conn,"SELECT * FROM tbl_category_sub");

  if(isset($_POST['teacherName'])){
    $teacherName = $_POST['teacherName'];
    $category = $_POST['category'];
    $catsubId = $_POST['catsubId'];
    $datebirth = $_POST['datebirth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $degree = $_POST['degree'];
    $status = $_POST['status'];

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

    $sql = "UPDATE tbl_teacher SET teacherName = '$teacherName', catId = '$category' ,catsubId = '$catsubId' ,datebirth = '$datebirth',phone = '$phone',email = '$email',degree = '$degree',status = '$status',image = '$file_name' WHERE teacherId = '$teacherid' ";

    $query = mysqli_query($conn, $sql);
    // $id_pro = mysqli_insert_id($conn);

    

    if($query){
      header('location: teacherlist.php');
    } else{
      $loi = "<div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-ban'></i> Thông Báo!</h4>
                Chỉnh sửa thông tin giảng viên không thành công. Xem lại mã giảng viên (mã giảng viên không được trùng nhau)
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
          GIẢNG VIÊN / CẬP NHẬT
        </h1>
      </div>
      
    </div>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header" style="background-image: linear-gradient(to right, rgb(182, 244, 146), rgb(51, 139, 147));">
            <h3 class="box-title" style="font-weight: bold;">NHẬP THÔNG TIN GIẢNG VIÊN</h3>
        </div>
        <!-- /.box-header -->

        <form action="" method="post" enctype="multipart/form-data">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Tên giảng viên</label>
                <input type="type" name="teacherName" class="form-control"  placeholder="Nhập tên giảng viên" value="<?php echo $data['teacherName'] ?>" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Ngày sinh (năm-tháng-ngày)</label>
                <input type="type" name="datebirth" class="form-control"  placeholder="dd/mm/yyyy" 
                  value="<?php echo $fm->formatYMD($data['datebirth']) ?>" 
                  required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="type" name="phone" class="form-control"  placeholder="Nhập số điện thoại" value="<?php echo $data['phone'] ?>" required="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="type" name="email" class="form-control"  placeholder="Nhập email" value="<?php echo $data['email'] ?>" required="">
              </div>
              

              <div class="form-group">
                <label>Ảnh giảng viên</label>
                <input type="file" name="image" class="form-control" id="exampleInputFile">
                <img src="uploads/<?php echo $data['image'] ?>" width="150" style="margin-top: 15px">
              </div>

            </div>
            <!-- /.col -->
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Bằng cấp</label>
                <input type="type" name="degree" class="form-control"  placeholder="Nhập bằng cấp" value="<?php echo $data['degree'] ?>" required="">
              </div>
              
              <div class="form-group">
                <label>Ngành</label>
                <select class="form-control select2 select2-hidden-accessible" name="category" style="width: 100%;">
                  <option>-----Chọn ngành-----</option>
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
                <select class="form-control select2 select2-hidden-accessible" name="catsubId" style="width: 100%;">
                  <option>-----Chọn môn-----</option>
                  <?php
                    foreach ($catsub as $key => $value) {
                      # code...
                    
                     ?>

                     <option value="<?php echo $value['catsubId'] ?>" <?php echo (($value['catsubId'] == $data['catsubId']) ? 'selected' : '') ?>><?php echo $value['catsubName'] ?></option>

                     <?php
                   
                 }
                 ?>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Trạng thái</label>
                <div class="radio">
                  <label style="margin-right: 10px;">
                    <input type="radio" name="status" id="optionsRadios1" value="1" <?php echo ($data['status'] == 1)?'checked':'' ?>>
                    Làm Việc
                  </label>    
                  <label>
                    <input type="radio" name="status" id="optionsRadios2" value="0" <?php echo ($data['status'] == 0)?'checked':'' ?>>
                    Nghỉ Việc
                  </label>
                </div>
              </div>

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>

          
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          

          <a href="teacherlist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">QUẢN LÝ GIẢNG VIÊN</span>
          </a>

           
          <button type="submit" class="btn btn-primary" style="margin-left: 0px; background-color: #badfb7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-edit" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">CẬP NHẬT</span>
          </button>

        </div>

        </form>
      </div>
    <!-- /.box -->
  </section>
  </div>

  <?php include 'inc/footer.php' ?>