<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/customer.php' ?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php
    if(!isset($_GET['month']) || $_GET['month']==NULL){
       echo "<script>window.location ='revenue.php'</script>";
    }else{
         $month = $_GET['month']; 
    }
    $year = date('Y');
    $ct = new cart();

?>

<style>
  td{
    vertical-align: middle !important;
  }
</style>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

          <div class="row">
            <div class="col-xs-6">
              <h1 style="font-weight: bold; padding-bottom: 5px;">
                DOANH THU / THÁNG <?php echo $month ?>
              </h1>
            </div>
            
            <div class="col-xs-6" style="text-align: right;">
              <a href="revenue.php" class="btn margin" style="margin-left: 0px; background-color: #889ed7; color: black; font-weight: bold; margin-top: 25px; font-size: 15px">
                <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
                <span style="padding-left: 10px;">QUẢN LÝ KHOÁ HỌC</span>
              </a>
            </div>

          </div>

        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">

              <div class="col-md-6">
                <div class="box">  

                  <div class="box-header" style="background-color: #8BC6EC;background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);">
                            <h3 class="box-title" style="font-weight: bold;">DOANH THU THÁNG <?php echo $month ?></h3>
                  </div>  
                  
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered">
                      <tr style="background: lightgrey;">
                        <th>Ngày</th>
                        <th>Tổng doanh thu ngày</th>
                      </tr>

                      <?php
                      $ct             = new cart();
                      $fm             = new Format();
                      $get_doanh_thu_ngay_cua_thang = $ct->get_doanh_thu_ngay_cua_thang($month);
                      if($get_doanh_thu_ngay_cua_thang){
                        while($result = $get_doanh_thu_ngay_cua_thang->fetch_assoc()){

                          ?>

                      <tr>
                        <td><?php echo $result['ngay'].' - '. $month .' - '.$year ?></td>
                        <td style="color: #dd4b39; font-weight: bold;"><?php echo $fm->format_currency($result['Total']) . " " . "VNĐ" ?></td>
                      </tr>

                      <?php
                        }
                      }
                      ?>

                    </table>
                  </div>

                </div>
              </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php include 'inc/footer.php' ?>
