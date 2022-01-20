<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php';?>
<?php include '../classes/catsub.php';?>
<?php include '../classes/teacher.php';?>
<?php include_once '../helpers/format.php';?>
<?php
  $pd = new teacher();
  $fm = new Format();

  if(isset($_GET['id_teacher']) && isset($_GET['status'])){
    $id = $_GET['id_teacher'];
    $status = $_GET['status'];
    $update_status_teacher = $pd->update_status_teacher($id,$status);

  }

  if(isset($_GET['teacherid'])){
        $id = $_GET['teacherid']; 
        $delteacher = $pd->del_teacher($id);
    }
?>

<style>
  td{
    vertical-align: middle !important;
  }

  th{
     text-align: center;
  }
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($delteacher)){
      echo $delteacher;
    }
    ?> 
    

    <div class="row" style="border-bottom: 1px solid #aaaaaa">
      <div class="col-xs-6">
        <h1 style="font-weight: bold; padding-bottom: 5px;">
          GIẢNG VIÊN
        </h1>
      </div>
      <div class="col-xs-6" style="text-align: right;">
        <a href="teacheradd.php" class="btn margin" style="margin-left: 0px; background-color: #badfb7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-plus-circle" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">THÊM MỚI</span>
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <!-- <a href="catelist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">QUẢN LÝ NGÀNH</span>
        </a>

        <a href="catsublist.php" class="btn margin" style="margin-left: 0px; background-color: #8cbbc2; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">QUẢN LÝ MÔN</span>
        </a> -->

        <a href="courseslist.php" class="btn margin" style="margin-left: 0px; background-color: #dbc5b4; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
          <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
          <span style="padding-left: 10px;">QUẢN LÝ KHOÁ HỌC</span>
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
            <h3 class="box-title" style="font-weight: bold;">QUẢN LÝ GIẢNG VIÊN</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 2%">STT</th>
                  <th>Tên giảng viên</th>
                  <th>Ngành</th>
                  <th>Môn</th>
                  <th>Học vị</th>
                  <th>Hình ảnh</th>
                  <th style="width: 10%">Trạng thái</th>
                  <th style="width: 10%">Thao tác</th>
                </tr>
              </thead>
              <tbody>

                <?php

                $pdlist = $pd->show_teacher1();
                if($pdlist){
                   $i = 0;
                  while($result = $pdlist->fetch_assoc()){
                     $i++;
                    ?>
                    <tr>
                      <td style=" text-align: center;"><?php echo $i ?></td>
                      <td style="font-weight: bold;"><a href="../teacherdetails.php?teacherid=<?php echo $result['teacherId'] ?>"><?php echo $result['teacherName'] ?></a></td>
                      <td style=" text-align: center;"><?php echo $result['catName'] ?></td>
                      <td style=" text-align: center;"><?php echo $result['catsubName'] ?></td>
                      <td style=" text-align: center;"><?php echo $result['degree'] ?></td>
                      <td style=" text-align: center;"><img src="uploads/<?php echo $result['image'] ?>" width="150px" height="150px" ></td>

                      <td style=" text-align: center;">
                        <?php
                        if($result['status']==1){
                          ?>
                          <a class="btn btn-success" href="?id_teacher=<?php echo $result['teacherId'] ?>&status=0" style="width: 100%; font-weight: bold;">
                            <i class="fa fa-check" style="border-right: 1px solid; padding-right: 5px; "></i> 
                            <span style="padding-left: 5px;">LÀM VIỆC</span>
                          </a> 
                          <?php
                        }else{
                          ?>  
                          <a class="btn btn-warning" href="?id_teacher=<?php echo $result['teacherId'] ?>&status=1" style="width: 100%; font-weight: bold;">
                            <i class="fa fa-ban" style="border-right: 1px solid; padding-right: 5px; "></i> 
                            <span style="padding-left: 5px;">NGHỈ VIỆC</span>
                          </a> 
                          <?php
                        }
                        ?>
                      </td>

                      <td style=" text-align: center;">
                        <a href="teacheredit.php?teacherid=<?php echo $result['teacherId'] ?>" class="btn btn-primary"><i class="fa fa-fw fa-pencil"></i></a> 
                        <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" href="?teacherid=<?php echo $result['teacherId'] ?>" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></a>
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