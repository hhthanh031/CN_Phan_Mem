<?php
  ob_start();
  include_once 'inc/header.php';
  include_once '../helpers/format.php';
?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php';?>
<?php include '../classes/catsub.php';?>
<?php include '../classes/news.php';?>
<?php 
  ob_start(); 
  include 'connect.php';
  $fm = new Format();
  $loi = "";
  if(isset($_GET['newsid'])){
    $newsid = $_GET['newsid'];
    $pro = mysqli_query($conn, "SELECT * FROM tbl_news where newsId = $newsid ");
    $data = mysqli_fetch_assoc($pro);

    // LẤY RA ẢNH MÔ TẢ Ở BẢNG IMAGE
    $img_pro = mysqli_query($conn, "SELECT * FROM img_newss WHERE id_news = $newsid ");
  }

  $category = mysqli_query($conn,"SELECT * FROM tbl_category");
  $catsub = mysqli_query($conn,"SELECT * FROM tbl_category_sub");

  if(isset($_POST['newsName'])){
    $newsName = $_POST['newsName'];
    $category = $_POST['category'];
    $catsubId = $_POST['catsubId'];
    $news_desc = $_POST['news_desc'];
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

    $sql = "UPDATE tbl_news SET newsName = '$newsName', catId = '$category' ,catsubId = '$catsubId' ,news_desc = '$news_desc',status = '$status',image = '$file_name' WHERE newsId = '$newsid' ";

    $query = mysqli_query($conn, $sql);
    // $id_pro = mysqli_insert_id($conn);

    

    if($query){
      header('location: newslist.php');
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
            BÀI VIẾT / CẬP NHẬT
          </h1>
        </div>
        
        <div class="col-xs-6" style="text-align: right;">
          <a href="newslist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
            <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">QUẢN LÝ BÀI VIẾT</span>
          </a>
        </div>

      </div>


  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header" style="background-image: linear-gradient(to right, rgb(182, 244, 146), rgb(51, 139, 147));">
            <h3 class="box-title" style="font-weight: bold;">NHẬP THÔNG TIN BÀI VIẾT</h3>
        </div>
        <!-- /.box-header -->

        <form action="" method="post" enctype="multipart/form-data">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Tên bài viết</label>
                <input type="type" name="newsName" class="form-control"  placeholder="Nhập tên bài viết" value="<?php echo $data['newsName'] ?>" required="">
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Ngày thêm bài viết</label>
                <input type="type" name="" class="form-control"  placeholder="Ngày thêm bài viết" 
                value="<?php echo $fm->formatDate($data['dateedit']) ?>" 
                required="" disabled>
              </div>

              <div class="form-group">
                <label>Ảnh bài viết</label>
                <input type="file" name="image" class="form-control" id="exampleInputFile">
                <img src="uploads/<?php echo $data['image'] ?>" width="150" style="margin-top: 15px">
              </div>

            </div>
            <!-- /.col -->
            <div class="col-md-6">
              
              <div class="form-group">
                <label>Danh mục chính</label>
                <select class="form-control select2 select2-hidden-accessible" name="category" style="width: 100%;">
                  <option>-----Chọn danh mục chính-----</option>
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
                <label>Danh mục phụ</label>
                <select class="form-control select2 select2-hidden-accessible" name="catsubId" style="width: 100%;">
                  <option>-----Chọn danh mục phụ-----</option>
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
                    Bật
                  </label>    
                  <label>
                    <input type="radio" name="status" id="optionsRadios2" value="0" <?php echo ($data['status'] == 0)?'checked':'' ?>>
                    Tắt
                  </label>
                </div>
              </div>

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Mô tả</label>
                  <textarea id="editor1" name="news_desc" rows="10" cols="80">
                    <?php echo $data['news_desc'] ?>
                  </textarea>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="button" class="btn btn-default" onclick="window.location.href='newslist.php';">Danh sách bài viết</button> 
          <button type="submit" class="btn btn-primary">Sửa</button>
        </div>

        </form>
      </div>
    <!-- /.box -->
  </section>
  </div>

  <?php include 'inc/footer.php' ?>