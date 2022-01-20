<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php include '../classes/customer.php' ?>

<?php
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


    $sql2 = 'SELECT COUNT(id) as soluongdonhangmoi FROM tbl_order WHERE 1 AND status = 0';
    $dataOrder0 = $db->total($sql2);

    $sql3 = 'SELECT COUNT(id) as soluongdonhangvanchuyen FROM tbl_order WHERE 1 AND status = 1';
    $dataOrder1 = $db->total($sql3);

    $day = date('d');
    $month = date('m');
    $year = date('Y');
    $sql4 = "SELECT COUNT(id) as soluongdonhang_hoanthanhtrongngay FROM tbl_order WHERE 1 AND status = 1 AND DAY(date_finish) = '$day' AND MONTH(date_finish) = '$month'        AND YEAR(date_finish) = '$year' ";
    $dataFinish = $db->total($sql4);
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Thống Kê Hôm Nay
                <small></small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
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
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Doanh thu tháng này</span>
                            <span class="info-box-number"><?= number_format($dataMonth['danhthuthang'],0,',','.') ?> VNĐ</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Số người đã thanh toán</span>
                            <span class="info-box-text">hôm nay</span>
                            <span class="info-box-number"><?= $dataFinish['soluongdonhang_hoanthanhtrongngay'] ?></span>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?= $dataOrder0['soluongdonhangmoi'] ?></h3>

                          <p>CHƯA THANH TOÁN</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-bag"></i>
                      </div>
                      <a href="orderadmin.php" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                          <h3><?= $dataOrder1['soluongdonhangvanchuyen'] ?></h3>

                          <p>ĐÃ THANH TOÁN</p>
                      </div>
                      <div class="icon">
                          <i class="fa fa-check"></i>
                      </div>
                      <a href="orderadmin_done.php" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php include 'inc/footer.php' ?>
