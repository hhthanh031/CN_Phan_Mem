<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/customer.php');
include_once ($filepath.'/../helpers/format.php');
include_once($filepath . '/../classes/cart.php');
include_once($filepath . '/../lib/database.php');
 ?>
<?php
   
    if(!isset($_GET['customerid']) || $_GET['customerid']==NULL){
       echo "<script>window.location ='orderadmin.php'</script>";
    }else{
         $customer_id = $_GET['customerid']; 
    }
     $cs = new customer();
     $ct = new cart();
     $fm = new Format();
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
    <h1>
      TH??NG TIN NG?????I ?????T H??NG
      <a class="btn btn-app" href="orderadmin.php">
        <i class="fa fa-folder-open"></i> Danh s??ch ????n h??ng
      </a>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- SELECT2 EXAMPLE -->
    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Th??ng tin ng?????i ?????t h??ng</h3>
      </div>
      <!-- /.box-header -->


      <form action="" method="post">

        <?php
        $get_customer = $cs->show_customers($customer_id);
        if($get_customer){
          while($result = $get_customer->fetch_assoc()){

            ?>

        <div class="box-body">
          <div class="row">

            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputEmail1">H??? t??n</label>
                <input type="type" readonly="readonly" value="<?php echo $result['name'] ?>" name="catName" value="" class="form-control" id="exampleInputEmail1">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">?????a ch???</label>
                <input type="type" readonly="readonly" value="<?php echo $result['address'] ?>" name="catName" value="" class="form-control" id="exampleInputEmail1">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">T???nh</label>
                <input type="type" readonly="readonly" value="<?php echo $result['_name'] ?>" name="catName" value="" class="form-control" id="exampleInputEmail1">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Th??nh Ph???</label>
                <input type="type" readonly="readonly" value="<?php echo $result['district'] ?>" name="catName" value="" class="form-control" id="exampleInputEmail1">
              </div>
            </div>

            <div class="col-md-6">

              <div class="form-group">
                <label for="exampleInputEmail1">S??? ??i???n tho???i</label>
                <input type="type" readonly="readonly" value="<?php echo $result['phone'] ?>" name="catName" value="" class="form-control" id="exampleInputEmail1">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">T??i kho???n</label>
                <input type="type" readonly="readonly" value="<?php echo $result['email'] ?>" name="catName" value="" class="form-control" id="exampleInputEmail1">
              </div>
            </div>

          </div>
        </div>

        <?php
          }
        }


        ?>

          <!-- /.box-body -->          
      </form>      
    </div>

    <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">????n h??ng ???? ?????t</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>M?? ????n h??ng</th>
                      <th>Th???i gian ?????t</th>
                      <th>S???n ph???m</th>
                      <th>S??? l?????ng</th>
                      <th>T???ng gi??</th>
                      <th>H??nh ???nh</th>
                      <th>Th???i gian ho??n th??nh</th>
                      <th>Thao t??c</th>
                      <!-- <th>A</th> -->
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $get_cart_ordered = $ct->get_cart_ordered($customer_id);
                    if($get_cart_ordered){
                      while($result = $get_cart_ordered->fetch_assoc()){
                        ?>

                        <tr class="odd gradeX">
                          <td style="text-align: center;"><?php echo $result['id'] ?></td>
                          <td style="text-align: center;"><?php echo $fm->formatDate($result['date_order']) ?></td>
                          <td style="font-weight: bold;"><a href="../details.php?proid=<?php echo $result['coursesId'] ?>"><?php echo $result['coursesName'] ?></a></td>
                          <td style="text-align: center;"><?php echo $result['quantity'] ?></td>
                          <td style="color: #dd4b39;font-weight: bold;"><?php echo $fm->format_currency($result['price']) . " " . "VN??" ?></td>
                          <td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
                          <td style="text-align: center;">
                            <?php 
                            if($result['date_finish']){
                              echo $fm->formatDate($result['date_finish']); 
                            }else{
                              echo 'Ch??a ho??n th??nh';  
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
                                                        <i class="fa fa-fw fa-spinner"></i> Ch??a thanh to??n
                                                        <span class="fa fa-caret-down"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a class="luachon" style="color: #00a65a" href="?customerid=<?php echo $result['customer_id'] ?>&shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&coursesId=<?php echo $result['coursesId'] ?>&quantity=<?php echo $result['quantity'] ?>&time=<?php echo $result['date_order'] ?>">
                                                                    <i class="fa fa-fw fa-check-square-o"></i> ???? thanh to??n</a>
                                                            </li>
                                                            
                                                            <li class="divider"></li>

                                                            <?php
                                                            if ($result['status'] == 0) {
                                                              ?>

                                                            <li>
                                                                <a onclick="return confirm('B???n c?? ch???c mu???n xo?? m???c n??y?')" class="luachon" style="color: #dd4b39" href="?customerid=<?php echo $result['customer_id'] ?>&delid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&coursesId=<?php echo $result['coursesId'] ?>&quantity=<?php echo $result['quantity'] ?>&time=<?php echo $result['date_order'] ?>">
                                                                    <i class="fa fa-fw fa-remove"></i> Hu??? ????n h??ng</a>
                                                            </li>

                                                            <?php
                                                            }

                                                            ?>
                                                        </ul>

                                                        <?php
                                                    } elseif ($result['status'] == 1) {
                                                        ?>

                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                            <i class="fa fa-fw fa-check-square-o"></i> ???? thanh to??n
                                                        <span class="fa fa-caret-down"></span></button>
                                                        <ul class="dropdown-menu">
                                                            <?php
                                                            if ($result['status'] == 1) {
                                                              ?>

                                                            <li>
                                                                <a onclick="return confirm('B???n c?? ch???c mu???n xo?? m???c n??y?')" class="luachon" style="color: #dd4b39" href="?customerid=<?php echo $result['customer_id'] ?>&deletedid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">
                                                                    <i class="fa fa-fw fa-trash-o"></i> Xo?? ????n h??ng</a>
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
            </div>
            <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </section>
</div>

  <?php include 'inc/footer.php' ?>