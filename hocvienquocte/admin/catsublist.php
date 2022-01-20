<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/catsub.php'?>

<?php
$catsub = new catsub();

if(isset($_GET['id_catsub']) && isset($_GET['catsubType'])){
  $id = $_GET['id_catsub'];
  $catsubType = $_GET['catsubType'];
  $update_type_slider = $catsub->update_type_catsub($id,$catsubType);

}

if(isset($_GET['delid'])){
  $id = $_GET['delid'];
  $delcatsub = $catsub->del_catsub($id);
}
?>

<style>
  td{
    vertical-align: middle !important;
  }
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($delcatsub)){
      echo $delcatsub;          
    }
    ?> 
    

    <div class="row" style="border-bottom: 1px solid #aaaaaa">
      <div class="col-xs-6">
        <h1 style="font-weight: bold; padding-bottom: 5px;">
          MÔN
        </h1>
      </div>
      <div class="col-xs-6" style="text-align: right;">
        <a href="catsubadd.php" class="btn margin" style="margin-left: 0px; background-color: #badfb7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-plus-circle" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">THÊM MỚI</span>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <a href="catelist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">QUẢN LÝ NGÀNH</span>
        </a>

        <!-- <a href="teacherlist.php" class="btn margin" style="margin-left: 0px; background-color: #8cbbc2; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">QUẢN LÝ GIẢNG VIÊN</span>
        </a>

        <a href="courseslist.php" class="btn margin" style="margin-left: 0px; background-color: #dbc5b4; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">QUẢN LÝ KHOÁ HỌC</span>
        </a> -->

        

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
            <h3 class="box-title" style="font-weight: bold;">QUẢN LÝ MÔN</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Số thứ tự</th>
                  <th>Tên môn</th>
                  <th>Hình ảnh</th>
                  <th>Tên ngành</th>
                  <th style="width: 10%;">Trạng thái</th>
                  <th style="width: 10%">Thao tác</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $show_catsub = $catsub->show_catsub();
                if($show_catsub){
                  $i = 0;
                  while($result = $show_catsub->fetch_assoc()){
                    $i++;
                    ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td style="font-weight: bold;"><?php echo $result['catsubName']; ?></td>
                      <td style="font-weight: bold;"><?php echo $result['catName']; ?></td>
                      <td style=" text-align: center;">
                        <img src="uploads/<?php echo $result['image'] ?>" width="100px" height="100px" >
                      </td>
                      <td style=" text-align: center;">
                        <?php
                        if($result['catsubType']==1){
                          ?>
                          <a class="btn btn-success" href="?id_catsub=<?php echo $result['catsubId'] ?>&catsubType=0" style="width: 100%; font-weight: bold;">
                            <i class="fa fa-check" style="border-right: 1px solid; padding-right: 5px; "></i> 
                            <span style="padding-left: 5px;">HIỂN THỊ</span>
                          </a> 
                          <?php
                        }else{
                          ?>  
                          <a class="btn btn-warning" href="?id_catsub=<?php echo $result['catsubId'] ?>&catsubType=1" style="width: 100%; font-weight: bold;">
                            <i class="fa fa-ban" style="border-right: 1px solid; padding-right: 5px; "></i> 
                            <span style="padding-left: 5px;">ẨN</span>
                          </a> 
                          <?php
                        }
                        ?>
                      </td>
                      <td style="text-align: center;">
                        <a href="catsubedit.php?catsubId=<?php echo $result['catsubId']?>" class="btn btn-primary"><i class="fa fa-fw fa-pencil"></i></a>
                        <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" href="?delid=<?php echo $result['catsubId']?>" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></a>
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