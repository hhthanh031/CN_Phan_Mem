<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/customer.php'?>

<?php
$customer = new customer();
if(isset($_GET['delid'])){
  $id = $_GET['delid'];
  $del_contacts = $customer->del_contacts($id);
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
    if(isset($del_contacts)){
      echo $del_contacts;          
    }
    ?> 
    <div class="row" style="border-bottom: 1px solid #aaaaaa">
              <div class="col-xs-6">
                <h1 style="font-weight: bold; padding-bottom: 5px;">
                  PHẢN HỒI
                </h1>
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
                            <h3 class="box-title" style="font-weight: bold;">QUẢN LÝ PHẢN HỒI</h3>
                        </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Số thứ tự</th>
                  <th>Tên người gửi</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>Email</th>
                  <th>Nội dung</th>
                  <th style="width: 10%">Thao tác</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $show_contacts = $customer->show_contacts();
                if($show_contacts){
                  $i = 0;
                  while($result = $show_contacts->fetch_assoc()){
                    $i++;
                    ?>

                    <tr>
                      <td><?php echo $i; ?></td>
                      <td><?php echo $result['contactName']; ?></td>
                      <td><?php echo $result['contactAddress']; ?></td>
                      <td><?php echo $result['contactPhone']; ?></td>
                      <td><?php echo $result['contactEmail']; ?></td>
                      <td><?php echo $result['contactMess']; ?></td>
                      <td style="text-align: center;">
                        <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" href="?delid=<?php echo $result['contactId']?>" class="btn btn-danger"><i class="fa fa-fw fa-remove"></i></a>
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