<?php
  ob_start();
  include_once 'inc/header.php';
?>
<?php include 'inc/sidebar.php' ?>
<?php  include '../classes/product.php' ?>
<?php
    $product = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
       
        $insertSlider = $product->insert_slider($_POST, $_FILES);
        
    }
?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($insertSlider)){
        echo $insertSlider;
    }
    ?>

    <div class="row">
      <div class="col-xs-6">
        <h1 style="font-weight: bold; padding-bottom: 5px;">
          BANNER / THÊM MỚI
        </h1>
      </div>

      <!-- <div class="col-xs-6" style="text-align: right;">
        <a href="sliderlist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
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
            <h3 class="box-title" style="font-weight: bold;">NHẬP THÔNG TIN BANNER</h3>
        </div>
        <!-- /.box-header -->

        <form action="slideradd.php" method="post" enctype="multipart/form-data">
          <div class="box-body">
          <div class="row">
            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">Tên banner</label>
                <input type="type" name="sliderName" class="form-control"  placeholder="Nhập tên banner">
              </div>

              <div class="form-group">
                <label>Ảnh banner</label>
                <input type="file" name="image" class="form-control" id="exampleInputFile">
              </div>
              
            </div>
            <!-- /.col -->
            <div class="col-md-6">

              <div class="form-group">
                <label>Trạng thái</label>
                <select class="form-control select2 select2-hidden-accessible" name="type" style="width: 100%;">
                  <option>-----Trạng thái-----</option>
                  <option value="1">Bật</option>
                  <option value="0">Tắt</option>
                </select>
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">

          <!-- <button type="button" class="btn btn-default" style="margin-right: 5px;" onclick="window.location.href='sliderlist.php';">
            DANH SÁCH
          </button> -->

          <a href="sliderlist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">QUẢN LÝ BANNER</span>
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