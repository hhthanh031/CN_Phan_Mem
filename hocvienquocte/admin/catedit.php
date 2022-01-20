<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/category.php' ?>

<?php
$cat = new category();
if (!isset($_GET['catId']) || $_GET['catId'] == NULL) {
        echo "<script>window.location = 'catlist.php'</script>";
    } else {
        $id = $_GET['catId'];
    }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $catName = $_POST['catName'];
        $catType = $_POST['catType'];
        $updateCat = $cat->update_category($catName,$catType, $id);
    }

?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <?php
    if(isset($updateCat)){
      echo $updateCat;          
    }
    ?>
    

    <div class="row">
      <div class="col-xs-6">
        <h1 style="font-weight: bold; padding-bottom: 5px;">
          CHUYÊN NGÀNH / CẬP NHẬT
        </h1>
      </div>
      
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

      <?php
      $get_cate_name = $cat->getcatbyId($id);
      if($get_cate_name){
        while($result = $get_cate_name->fetch_assoc()){

          ?>

      <form action="" method="post">
        <div class="box-body">
          <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Tên ngành</label>
              <input type="type" name="catName" value="<?php echo $result['catName'] ?>" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên ngành" required="">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Trạng thái</label>
              <div class="radio">
                <label style="margin-right: 10px;">
                  <input type="radio" name="catType" id="optionsRadios1" value="1" <?php echo ($result['catType'] == 1)?'checked':'' ?>>
                  Hiển thị
                </label>    
                <label>
                  <input type="radio" name="catType" id="optionsRadios2" value="0" <?php echo ($result['catType'] == 0)?'checked':'' ?>>
                  Ẩn
                </label>
              </div>
            </div>
          </div>

          </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
          <!-- <button type="button" class="btn btn-default" style="margin-right: 5px;" onclick="window.location.href='catelist.php';">DANH SÁCH</button> 
          <input type="submit" class="btn btn-primary" name="submit" Value="CẬP NHẬT" /> -->

          <a href="catelist.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">QUẢN LÝ CHUYÊN NGÀNH</span>
          </a>

           
          <button type="submit" class="btn btn-primary" style="margin-left: 0px; background-color: #badfb7; color: black; font-weight: bold; font-size: 15px">
            <i class="fa fa-edit" style="border-right: 1px solid; padding-right: 10px; "></i>
            <span style="padding-left: 10px;">CẬP NHẬT</span>
          </button>

        </div>
      </form>

      <?php
    }
  }
  ?>

    </div>
    <!-- /.box -->
  </section>
</div>

  <?php include 'inc/footer.php' ?>