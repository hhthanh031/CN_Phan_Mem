<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/customer.php' ?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../helpers/format.php');
$year = date('Y');

    $day = date('d');
    $month = date('m');
    $year = date('Y');
    $sql = "SELECT SUM(price) as danhthungay FROM tbl_order WHERE 1 AND status = 1 AND DAY(date_finish) = '$day' AND MONTH(date_finish) = '$month' 
            AND YEAR(date_finish) = '$year' ";
    $db = new customer();
    $data = $db->total($sql);

    $month = date('m');
    $sql1 = "SELECT SUM(price) as danhthuthang FROM tbl_order WHERE 1 AND status = 1 AND MONTH(date_finish) = '$month' AND YEAR(date_finish) = '$year'";
    $dataMonth = $db->total($sql1);

    $day = date('d');
    $month = date('m');
    $year = date('Y');
    $sql4 = "SELECT COUNT(id) as soluongdonhang_hoanthanhtrongngay FROM tbl_order WHERE 1 AND status = 1 AND DAY(date_finish) = '$day' AND MONTH(date_finish) = '$month'        AND YEAR(date_finish) = '$year' ";
    $dataFinish = $db->total($sql4);
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
            <div class="row" style="border-bottom: 1px solid #aaaaaa">
              <div class="col-xs-6">
                <h1 style="font-weight: bold; padding-bottom: 5px;">
                  THỐNG KÊ DOANH THU
                </h1>
              </div>
            </div>

        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">

              <div class="col-md-6">
                <div class="box">    

                  <div class="box-header" style="background-color: #8BC6EC;background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);">
                            <h3 class="box-title" style="font-weight: bold;">DOANH THU CÁC THÁNG</h3>
                        </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table class="table table-bordered">
                      <tr style="background: lightgrey;">
                        <th>Tháng</th>
                        <th>Tổng doanh thu</th>
                        <th style="width: 20%;">Thao tác</th>
                      </tr>

                      <?php
                      $ct             = new cart();
                      $fm             = new Format();
                      $get_doanhthutungthang = $ct->get_doanhthutungthang();
                      if ($get_doanhthutungthang) {

                        while ($result = $get_doanhthutungthang->fetch_assoc()) {

                          ?>

                      <tr>
                        <td><?php echo 'Tháng '.$result['month'].' Năm '.$year ?></td>
                        <td style="color: #dd4b39; font-weight: bold;"><?php echo $fm->format_currency($result['danhthutungthang']) . " " . "VNĐ" ?></td>
                        <td>
                          <a class="btn btn-block btn-primary" href="revenuedetails.php?month=<?php echo $result['month'] ?>"><i class="fa fa-fw fa-calendar"></i> Xem chi tiết</a>
                        </td>
                      </tr>

                      <?php
                        }
                      }
                      ?>

                    </table>
                  </div>

                </div>
              </div>

              <div class="col-md-6">
                <div class="box">    

                  <div class="box-header" style="background-color: #8EC5FC;background-image: linear-gradient(90deg, #8EC5FC 0%, #E0C3FC 100%);">
                            <h3 class="box-title" style="font-weight: bold;">DOANH THU TRONG NGÀY</h3>
                        </div>
                  <!-- /.box-header -->
                  <div class="">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Doanh thu hôm nay</span>
                            <span class="info-box-number"><?= number_format($data['danhthungay'],0,',','.') ?> VNĐ</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                  </div>

                  <div class="">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Doanh thu tháng này</span>
                            <span class="info-box-number"><?= number_format($dataMonth['danhthuthang'],0,',','.') ?> VNĐ</span>
                        </div>
                    </div>
                  </div>

                  <div class="">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Số đơn hoàn thành hôm nay</span>
                            <span class="info-box-number"><?= $dataFinish['soluongdonhang_hoanthanhtrongngay'] ?></span>
                        </div>
                    </div>
                  </div>

                </div>
              </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php include 'inc/footer.php' ?>
