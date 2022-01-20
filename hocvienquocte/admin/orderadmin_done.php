<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>

<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../helpers/format.php');
include_once($filepath . '/../lib/database.php');
?>

<?php
$ct = new cart();
$db = new Database();
if (isset($_GET['shiftid_0'])) {
    $id      = $_GET['shiftid_0'];
    $time    = $_GET['time'];
    $price   = $_GET['price'];
    $coursesId   = $_GET['coursesId'];
    $quantity    = $_GET['quantity'];
    $sql = "UPDATE tbl_courses SET quantity = quantity + '$quantity' WHERE coursesId = '$coursesId'";
    $sql1 = "UPDATE tbl_courses SET totalquantity = totalquantity - '$quantity' WHERE coursesId = '$coursesId'";
    $db->update($sql);
    $db->update($sql1);
    $shifted_0 = $ct->shifted_0($id, $time, $price);
}

if (isset($_GET['shiftid'])) {
    $id      = $_GET['shiftid'];
    $time    = $_GET['time'];
    $price   = $_GET['price'];
    $coursesId   = $_GET['coursesId'];
    $quantity    = $_GET['quantity'];
    $sql = "UPDATE tbl_courses SET quantity = quantity - '$quantity' WHERE coursesId = '$coursesId'";
    $sql1 = "UPDATE tbl_courses SET totalquantity = totalquantity + '$quantity' WHERE coursesId = '$coursesId'";
    $db->update($sql);
    $db->update($sql1);
    $shifted = $ct->shifted($id, $time, $price);
}

if (isset($_GET['shiftid_1'])) {
    $id      = $_GET['shiftid_1'];
    $time    = $_GET['time'];
    $price   = $_GET['price'];
    $shifted_1 = $ct->shifted_1($id, $time, $price);
}

if (isset($_GET['deletedid'])) {
    $id          = $_GET['deletedid'];
    $time        = $_GET['time'];
    $price       = $_GET['price'];
    $deleted_shifted = $ct->deleted_shifted($id, $time, $price);
}

if (isset($_GET['delid'])) {
    $id          = $_GET['delid'];
    $time        = $_GET['time'];
    $price       = $_GET['price'];
    $coursesId   = $_GET['coursesId'];
    $quantity    = $_GET['quantity'];
    // print_r($sql);exit;
    $del_shifted = $ct->del_shifted($id, $time, $price, $coursesId, $quantity);
}
?>

    <style>
        th{
            text-align: center;
        }

        td {
            vertical-align: middle !important;
        }

        button {
            min-width: 140px;
            border-radius: 3px !important;
        }

        .luachon {
            font-size: 15px;
        }


    </style>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?php
            if (isset($shifted_0)) {
                echo $shifted_0;
            }

            if (isset($shifted)) {
                echo $shifted;
            }

            if (isset($shifted_1)) {
                echo $shifted_1;
            }

            if (isset($deleted_shifted)) {
                echo $deleted_shifted;
            }

            if (isset($del_shifted)) {
                echo $del_shifted;
            }
            ?>
            <div class="row" style="border-bottom: 1px solid #aaaaaa">
              <div class="col-xs-6">
                <h1 style="font-weight: bold; padding-bottom: 5px;">
                  ĐƠN ĐẶT HÀNG / ĐÃ THANH TOÁN
                </h1>
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

                <a href="orderadmin.php" class="btn margin" style="margin-left: 0px; background-color: #dd4b39; color: white; font-weight: bold; margin-top: 25px; font-size: 15px">
                  <i class="fa fa-list-ol" style="border-right: 1px solid; padding-right: 10px; "></i>
                  <span style="padding-left: 10px; ">ĐƠN HÀNG CHƯA THANH TOÁN</span>
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
                        <div class="box-header" style="background-color: #8BC6EC;background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);">
                            <h3 class="box-title" style="font-weight: bold;">QUẢN LÝ ĐƠN HÀNG / ĐÃ THANH TOÁN</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Thời gian đặt</th>
                                    <th>Tên khoá</th>
                                    <th>Ảnh</th>
                                    
                                    <th>Tổng giá</th>
                                    <th>Mã người đặt</th>
                                    <th>Người đặt</th>
                                    <th>Thời gian thanh toán</th>
                                    <th>Thao tác</th>
                                    <!-- <th>A</th> -->
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                $ct             = new cart();
                                $fm             = new Format();
                                $get_inbox_cart1 = $ct->get_inbox_cart1();
                                if ($get_inbox_cart1) {
                                    
                                    while ($result = $get_inbox_cart1->fetch_assoc()) {
                                        
                                        ?>

                                        <tr class="odd gradeX">
                                            <td style="text-align: center;"><?php echo $result['id'] ?></td>
                                            <td><?php echo $fm->formatDate($result['date_order']) ?></td>
                                            <td style="font-weight: bold;"><a href="../details.php?coursesid=<?php echo $result['coursesId'] ?>"><?php echo $result['coursesName'] ?></a></td>
                                            <td style="font-weight: bold;"><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
                                            <td style="text-align: center;display:none;"><?php echo $result['quantity'] ?></td>
                                            <td style="color: #dd4b39;font-weight: bold;"><?php echo $fm->format_currency($result['price']) . " " . "VNĐ" ?></td>
                                            <td style="text-align: center;"><?php echo $result['customer_id'] ?></td>
                                            <td style="text-align: center;">
                                                <a class="btn btn-info" href="customer.php?customerid=<?php echo $result['customer_id'] ?>">
                                                <i class="fa fa-fw fa-info-circle"></i> Xem thông tin
                                                </a>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php 
                                                if($result['date_finish']){
                                                    echo $fm->formatDate($result['date_finish']); 
                                                }else{
                                                  echo 'Chưa thanh toán';  
                                                }
                                                ?>
                                                
                                            </td>
                                            

                                            <td style="text-align: center;">
                                                

                                                <div class="input-group margin">
                                                    <div class="input-group-btn">

                                                        <?php
                                                    if ($result['status'] == 0) {
                                                        ?>

                                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        <i class="fa fa-fw fa-spinner"></i> Chưa thanh toán
                                                        <span class="fa fa-caret-down"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="luachon" style="color: #00a65a" href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&coursesId=<?php echo $result['coursesId'] ?>&quantity=<?php echo $result['quantity'] ?>&time=<?php echo $result['date_order'] ?>">
                                                                    <i class="fa fa-fw fa-check-square-o"></i> Đã thanh toán</a>
                                                            </li>
                                                            
                                                            <li class="divider"></li>

                                                            <?php
                                                            if ($result['status'] == 0) {
                                                              ?>

                                                            <li>
                                                                <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" class="luachon" style="color: #dd4b39" href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&coursesId=<?php echo $result['coursesId'] ?>&quantity=<?php echo $result['quantity'] ?>&time=<?php echo $result['date_order'] ?>">
                                                                    <i class="fa fa-fw fa-remove"></i> Huỷ đơn hàng</a>
                                                            </li>

                                                            <?php
                                                            }

                                                            ?>
                                                        </ul>

                                                        <?php
                                                    } elseif ($result['status'] == 1) {
                                                        ?>

                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fa fa-fw fa-check-square-o"></i> Đã thanh toán
                                                        <span class="fa fa-caret-down"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <?php
                                                            if ($result['status'] == 1) {
                                                              ?>

                                                            <li>
                                                                <a onclick="return confirm('Bạn có chắc muốn xoá mục này?')" class="luachon" style="color: #dd4b39" href="?deletedid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">
                                                                    <i class="fa fa-fw fa-trash-o"></i> Xoá đơn hàng</a>
                                                            </li>

                                                            <?php
                                                            }

                                                            ?>
                                                        </ul>

                                                        <?php
                                                            } 
                                                        ?>

                                                    </div>
                                                    <!-- /btn-group -->

                                                </div>

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
