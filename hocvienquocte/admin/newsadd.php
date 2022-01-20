<?php
  ob_start();
  include_once 'inc/header.php';
?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php';?>
<?php include '../classes/catsub.php';?>
<?php include '../classes/product.php';?>

<?php 
  ob_start(); 
  include 'connect.php';
  $loi = "";
  if(isset($_POST['newsName'])){
    $newsName = $_POST['newsName'];
    $catId = $_POST['catId'];
    $catsubId = $_POST['catsubId'];
    $news_desc = $_POST['news_desc'];
    $status = $_POST['status'];

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


    $sql = "INSERT INTO tbl_news(newsName,catId,catsubId,news_desc,image,status) VALUES('$newsName','$catId','$catsubId','$news_desc','$file_name','$status')";

    

    $query = mysqli_query($conn, $sql);

    if($query){
      header('location: newslist.php');
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
          BÀI VIẾT / THÊM MỚI
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
                <input type="type" name="newsName" class="form-control"  placeholder="Nhập tên bài viết" required="">
              </div>

              <div class="form-group">
                <label>Ảnh bài viết</label>
                <input type="file" name="image" class="form-control" id="exampleInputFile">
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">

              <div class="form-group">
                <label>Danh mục chính</label>
                <select class="form-control select2 select2-hidden-accessible" name="catId" required="" style="width: 100%;" >
                  <option value="">-----Chọn danh mục chính-----</option>
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
                <label>Danh mục phụ</label>
                <select class="form-control select2 select2-hidden-accessible" name="catsubId" required="" style="width: 100%;" >
                  <option value="">-----Chọn danh mục phụ-----</option>
                  <?php
                  $catsub = new catsub();
                  $catsublist = $catsub->show_catsub();

                  if($catsublist){
                    while($result = $catsublist->fetch_assoc()){
                     ?>

                     <option value="<?php echo $result['catsubId'] ?>"><?php echo $result['catsubName'] ?></option>

                     <?php
                   }
                 }
                 ?>
                </select>
              </div>

              <!-- <div class="form-group">
                <label>Cấp sản phẩm</label>
                <select class="form-control select2 select2-hidden-accessible" name="type" style="width: 100%;" >
                  <option>-----Cấp sản phẩm-----</option>
                  <option value="0">Nổi bật</option>
                  <option value="1">Không nổi bật</option>
                </select>
              </div> -->

              <div class="form-group">
                <label for="exampleInputEmail1">Trạng thái</label>
                <div class="radio">
                  <label style="margin-right: 10px;">
                    <input type="radio" name="status" id="optionsRadios1" value="1" checked="">
                    Hiển thị
                  </label>    
                  <label>
                    <input type="radio" name="status" id="optionsRadios2" value="0">
                    Ẩn
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
                  <textarea id="editor1" name="news_desc" rows="10" cols="80" >
                  </textarea>
              </div>
            </div>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="button" class="btn btn-default" onclick="window.location.href='catelist.php';">Danh sách sản phẩm</button> 
          <button type="submit" class="btn btn-primary">Thêm mới</button>
        </div>

        </form>
      </div>
    <!-- /.box -->
  </section>
  </div>

  <?php include 'inc/footer.php' ?>