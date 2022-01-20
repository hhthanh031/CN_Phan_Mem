<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/product.php';?>

<?php
  $product = new product();
  if(isset($_GET['type_slider']) && isset($_GET['type'])){
    $id = $_GET['type_slider'];
    $type = $_GET['type'];
    $update_type_slider = $product->update_type_slider($id,$type);

  }
  if(isset($_GET['slider_del'])){
    $id = $_GET['slider_del'];
    
    $del_slider = $product->del_slider($id);

  }

?>

<style>
  td{
    vertical-align: middle !important;
  }

  table{
    text-align: center;
  }

  th{
    text-align: center;
  }
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($del_slider)){
      echo $del_slider;
    }
    ?>

    <div class="row">
      <div class="col-xs-6">
        <h1 style="font-weight: bold; padding-bottom: 5px;">
          BANNER
        </h1>
      </div>
      <div class="col-xs-6" style="text-align: right;">
        <a href="slideradd.php" class="btn margin" style="margin-left: 0px; background-color: #badfb7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-plus-circle" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">THÊM MỚI</span>
        </a>
      </div>
    </div>

  </section>



  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <!-- /.box -->

        <div class="box">
          <div class="box-header" style="background-image: linear-gradient(to right, rgb(182, 244, 146), rgb(51, 139, 147));">
            <h3 class="box-title" style="font-weight: bold;">QUẢN LÝ BANNER</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Số thứ tự</th>
                  <th>Tên banner</th>
                  <th>Hình ảnh</th>
                  <th style="width: 10%;">Trạng thái</th>
                  <th style="width: 8%;">Thao tác</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $product = new product();
                $get_slider = $product->show_slider_list();
                if($get_slider){
                  $i = 0;
                  while($result_slider = $get_slider->fetch_assoc()){
                    $i++;
                    ?>                

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td style="font-weight: bold;"><?php echo $result_slider['sliderName'] ?></td>
                      <td><img src="uploads/<?php echo $result_slider['slider_image'] ?>" height="150px" width="350px"/></td>
                      <td style=" text-align: center;">
                        <?php
                        if($result_slider['type']==1){
                          ?>
                          <a class="btn btn-success" href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=0" style="width: 100%; font-weight: bold;">
                            <i class="fa fa-check" style="border-right: 1px solid; padding-right: 5px; "></i> 
                            <span style="padding-left: 5px;">HIỂN THỊ</span>
                          <?php
                        }else{
                          ?>  
                          <a class="btn btn-warning" href="?type_slider=<?php echo $result_slider['sliderId'] ?>&type=1" style="width: 100%; font-weight: bold;">
                            <i class="fa fa-ban" style="border-right: 1px solid; padding-right: 5px; "></i> 
                            <span style="padding-left: 5px;">ẨN</span>
                          <?php
                        }
                        ?>
                      </td>

                      <td style=" text-align: center;">
                        <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" href="?slider_del=<?php echo $result_slider['sliderId'] ?>" class="btn btn-danger"><i class="fa fa-fw fa-close"></i></a>
                      </td>
                    </tr>
                    
                    <?php
                  }
                }

                ?> 

              </tbody>
              
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>


<?php include 'inc/footer.php' ?>