<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php';?>
<?php include '../classes/catsub.php';?>
<?php include '../classes/news.php';?>
<?php include_once '../helpers/format.php';?>
<?php
  $pd = new news();
  $fm = new Format();

  if(isset($_GET['id_news']) && isset($_GET['status'])){
    $id = $_GET['id_news'];
    $status = $_GET['status'];
    $update_status_news = $pd->update_status_news($id,$status);

  }

  if(isset($_GET['newsid'])){
        $id = $_GET['newsid']; 
        $delnews = $pd->del_news($id);
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
    if(isset($delnews)){
      echo $delnews;
    }
    ?> 

    <div class="row">
      <div class="col-xs-6">
        <h1 style="font-weight: bold; padding-bottom: 5px;">
          BÀI VIẾT
        </h1>
      </div>
      <div class="col-xs-6" style="text-align: right;">
        <a href="newsadd.php" class="btn margin" style="margin-left: 0px; background-color: #badfb7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
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
            <h3 class="box-title" style="font-weight: bold;">QUẢN LÝ BÀI VIẾT TRÊN WEBSITE</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="max-width: 5%">STT</th>
                  <th>Tên bài viết</th>
                  <th>Ngày thêm</th>
                  <th>Danh mục chính</th>
                  <th>Danh mục phụ</th>
                  <th>Hình ảnh</th>
                  <th style="width: 10%">Trạng thái</th>
                  <th style="width: 10%">Thao tác</th>
                </tr>
              </thead>
              <tbody>

                <?php

                $pdlist = $pd->show_news();
                if($pdlist){
                   $i = 0;
                  while($result = $pdlist->fetch_assoc()){
                     $i++;
                    ?>
                    <tr>
                      <td style=" text-align: center;"><?php echo $i ?></td>
                      <td style="font-weight: bold;"><a href="../detailsnews.php?newsid=<?php echo $result['newsId'] ?>"><?php echo $result['newsName'] ?></a></td>
                      <td style=" text-align: center;"><?php echo $fm->formatDate($result['dateedit']) ?></td>
                      <td style=" text-align: center;"><?php echo $result['catName'] ?></td>
                      <td style=" text-align: center;"><?php echo $result['catsubName'] ?></td>
                      <td style=" text-align: center;"><img src="uploads/<?php echo $result['image'] ?>" width="150px" height="100px" ></td>

                      <td style=" text-align: center;">
                        <?php
                        if($result['status']==1){
                          ?>
                          <a class="btn btn-success" href="?id_news=<?php echo $result['newsId'] ?>&status=0" style="width: 100%; font-weight: bold;">
                            <i class="fa fa-check" style="border-right: 1px solid; padding-right: 5px; "></i> 
                            <span style="padding-left: 5px;">HIỂN THỊ</span>
                          <?php
                        }else{
                          ?>  
                          <a class="btn btn-warning" href="?id_news=<?php echo $result['newsId'] ?>&status=1" style="width: 100%; font-weight: bold;">
                            <i class="fa fa-ban" style="border-right: 1px solid; padding-right: 5px; "></i> 
                            <span style="padding-left: 5px;">ẨN</span>
                          <?php
                        }
                        ?>
                      </td>

                      <td style=" text-align: center;">
                        <a href="newsedit.php?newsid=<?php echo $result['newsId'] ?>" class="btn btn-primary"><i class="fa fa-fw fa-pencil"></i></a> 
                        <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" href="?newsid=<?php echo $result['newsId'] ?>" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></a>
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