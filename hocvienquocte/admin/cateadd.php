<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php' ?>

<?php
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $catName = $_POST['catName'];
  $catType = $_POST['catType'];
  $insert_category = $cat->insert_category($catName,$catType);
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">



    <?php
    if(isset($insert_category)){
      echo $insert_category;          
    }
    ?>
 
    <div class="row">
      <div class="col-xs-6">
        <h1 style="font-weight: bold; padding-bottom: 5px;">
          CHUYÊN NGÀNH / THÊM MỚI
        </h1>
      </div>

      <!-- <div class="col-xs-6" style="text-align: right;">
        <a href="catelist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">DANH SÁCH</span>
        </a>
      </div> -->
      
    </div>


  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header" style="background-image: linear-gradient(to right, rgb(182, 244, 146), rgb(51, 139, 147));">
            <h3 class="box-title" style="font-weight: bold;">NHẬP THÔNG TIN CHUYÊN NGÀNH</h3>
        </div>

      <!-- /.box-header -->
      <form role="form" action="cateadd.php" method="post">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Tên chuyên ngành</label>
                <input type="type" name="catName" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên ngành" required="">
              </div>
            </div>


          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Trạng thái</label>
              <div class="radio">
                <label style="margin-right: 10px;">
                  <input type="radio" name="catType" id="optionsRadios1" value="1" checked="">
                  Hiển thị
                </label>    
                <label>
                  <input type="radio" name="catType" id="optionsRadios2" value="0">
                  Ẩn
                </label>
              </div>
            </div>
          </div>
          
          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <!-- <button type="button" class="btn btn-default" style="margin-right: 5px;" onclick="window.location.href='';">DANH SÁCH</button> 
          <button type="submit" class="btn btn-primary">THÊM MỚI</button> -->

          <a href="catelist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">QUẢN LÝ CHUYÊN NGÀNH</span>
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