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
  if(isset($_POST['catsubName'])){
    $catsubName = $_POST['catsubName'];
    $catId = $_POST['catId'];
    $catsubType = $_POST['catsubType'];

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


    $sql = "INSERT INTO tbl_category_sub(catsubName,catId,image,catsubType) VALUES('$catsubName','$catId','$file_name','$catsubType')";

    

    $query = mysqli_query($conn, $sql);

    if($query){
      header('location: catsublist.php');
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
          MÔN / THÊM MỚI
        </h1>
      </div>
      
    </div>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
        <div class="box-header" style="background-image: linear-gradient(to right, rgb(182, 244, 146), rgb(51, 139, 147));">
            <h3 class="box-title" style="font-weight: bold;">NHẬP THÔNG TIN MÔN</h3>
        </div>
        <!-- /.box-header -->

        <form action="" method="post" enctype="multipart/form-data">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Tên môn</label>
                <input type="type" name="catsubName" class="form-control"  placeholder="Nhập tên môn học" required="">
              </div>

              <div class="form-group">
                <label>Ảnh môn học</label>
                <input type="file" name="image" class="form-control" id="exampleInputFile">
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">

              <div class="form-group">
                <label>Chuyên ngành</label>
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

              <div class="form-group">
                <label for="exampleInputEmail1">Trạng thái</label>
                <div class="radio">
                  <label style="margin-right: 10px;">
                    <input type="radio" name="catsubType" id="optionsRadios1" value="1" checked="">
                    Hiển thị
                  </label>    
                  <label>
                    <input type="radio" name="catsubType" id="optionsRadios2" value="0">
                    Ẩn
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
          

          <a href="catsublist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">QUẢN LÝ MÔN</span>
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