<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


<?php
class cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function add_to_cart($quantity, $id){

            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sId = session_id();
            $check_cart = "SELECT * FROM tbl_cart WHERE coursesId = '$id' AND sId ='$sId'";
            $result_check_cart = $this->db->select($check_cart);
            if($result_check_cart){
                $msg = "<div class='prod_options'> <div class='alert alert-danger alert-dismissible fade show' role='alert'>Khoá học đã được thêm vào giỏ hàng</div></div>";
                return $msg;
            }else{

                $query = "SELECT * FROM tbl_courses WHERE coursesId = '$id'";
                $result = $this->db->select($query)->fetch_assoc();
                
                $image = $result["image"];
                $price = $result["price"];
                $coursesCode = $result["coursesCode"];
                $coursesName = $result["coursesName"];
                $timelearn = $result["timelearn"];
                $dateedit = $result["dateedit"];

                $query_insert = "INSERT INTO tbl_cart(coursesId,quantity,sId,image,price,coursesCode,coursesName,timelearn,dateedit) VALUES('$id','$quantity','$sId','$image','$price','$coursesCode','$coursesName','$timelearn','$dateedit')";
                $insert_cart = $this->db->insert($query_insert);
                if($insert_cart){
                    header('Location:cart.php');
                    $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Thêm Khoá học thành công</div>";
                    return $msg;
                    
                }
            }
            
        }

        public function get_courses_cart(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_quantity_cart($quantity, $cartId){
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $cartId = mysqli_real_escape_string($this->db->link, $cartId);
            $query = "UPDATE tbl_cart SET

            quantity = '$quantity'

            WHERE cartId = '$cartId'";
            $result = $this->db->update($query);
            if($result){
                header('Location:cart.php');
                $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>Cập nhật thành công</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Thêm Khoá học thành công</div>";
                return $msg;
            }

        }

        public function del_courses_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link, $cartid);
            $query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'";
            $result = $this->db->delete($query);
            if($result){
                header('Location:cart.php');
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Xoá Khoá học thành công</div>";
                return $msg;
            
            }
        }

        public function check_cart(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }

        public function check_order($customer_id){
            $sId = session_id();
            $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_all_data_cart(){
            $sId = session_id();
            $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
            $result = $this->db->delete($query);
            

        }

        public function insertOrder($customer_id){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            $get_courses = $this->db->select($query);
            if($get_courses){
                while($result = $get_courses->fetch_assoc()){
                    $coursesid = $result['coursesId'];
                    $coursesCode = $result['coursesCode'];
                    $coursesName = $result['coursesName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'] * $quantity;
                    $image = $result['image'];
                    $timelearn = $result['timelearn'];
                    $dateedit = $result['dateedit'];
                    $customer_id = $customer_id;
                    $query_order = "INSERT INTO tbl_order
                    (coursesId,coursesCode,coursesName,quantity,price,image,customer_id,timelearn,dateedit) 
                    VALUES('$coursesid','$coursesCode','$coursesName','$quantity','$price','$image','$customer_id','$timelearn','$dateedit')";
                    $insert_order = $this->db->insert($query_order);
                }
            }
        }

        
        public function getAmountPrice($customer_id){
        
            $query = "SELECT price FROM tbl_order WHERE customer_id = '$customer_id'";
            $get_price = $this->db->select($query);
            return $get_price;
        }

        public function get_cart_ordered($customer_id){
            $query = "SELECT * FROM tbl_order WHERE customer_id = '$customer_id'";
            $get_cart_ordered = $this->db->select($query);
            return $get_cart_ordered;
        }

        public function get_inbox_cart(){
            $query = "SELECT * FROM tbl_order WHERE status='0' ORDER BY date_order desc";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }

        public function get_inbox_cart1(){
            $query = "SELECT * FROM tbl_order WHERE status='1' ORDER BY date_order desc";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }

        public function shifted_0($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET

                    status = '0', date_finish = NULL

                    WHERE id = '$id' AND date_order='$time' AND price ='$price'";
            $result = $this->db->update($query);
            if($result){
                $msg = "<div class='alert alert-info alert-dismissible'>
                            <button style='min-width: 0px !important;' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Thông Báo!</h4>
                            Cập nhật tình trạng thành công.
                        </div>";
                return $msg;
            }else{
                $msg = "<span class='error'>Update Order Not Successfully</span>";
                return $msg;
            }
        }

        public function shifted($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET

                    status = '1', date_finish = now()

                    WHERE id = '$id' AND date_order='$time' AND price ='$price'";
            $result = $this->db->update($query);
            if($result){
                $msg = "<div class='alert alert-success alert-dismissible'>
                            <button style='min-width: 0px !important;' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-info'></i> Thông Báo!</h4>
                            Cập nhật tình trạng thành công.
                        </div>";;
                return $msg;
            }else{
                $msg = "<span class='error'>Update Order Not Successfully</span>";
                return $msg;
            }
        }

        public function shifted_1($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET

                    status = '2', date_finish = now()

                    WHERE id = '$id' AND date_order='$time' AND price ='$price'";
            $result = $this->db->update($query);
            if($result){
                $msg = "<div class='alert alert-success alert-dismissible'>
                            <button style='min-width: 0px !important;' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check'></i> Thông Báo!</h4>
                            Cập nhật tình trạng thành công.
                        </div>";
                return $msg;
            }else{
                $msg = "<span class='error'>Update Order Not Successfully</span>";
                return $msg;
            }
        }

        public function del_shifted($id,$time,$price,$coursesId,$quantity){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $coursesId = mysqli_real_escape_string($this->db->link, $coursesId);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $query = "DELETE FROM tbl_order 
                    WHERE id = '$id' AND date_order='$time' AND price ='$price' AND coursesId ='$coursesId' AND quantity ='$quantity'  ";
            $result = $this->db->update($query);
            if($result){
                $msg = "<div class='alert alert-success alert-dismissible'>
                            <button style='min-width: 0px !important;' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Thông Báo!</h4>
                            Huỷ đơn hàng thành công.
                        </div>";
                return $msg;
            }else{
                $msg = "<span class='error'>Delete Order Not Successfully</span>";
                return $msg;
            }
        }

        public function deleted_shifted($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "DELETE FROM tbl_order 
                    WHERE id = '$id' AND date_order='$time' AND price ='$price'";
            $result = $this->db->update($query);
            if($result){
                $msg = "<div class='alert alert-success alert-dismissible'>
                            <button style='min-width: 0px !important;' type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-ban'></i> Thông Báo!</h4>
                            Xoá đơn hàng thành công.
                        </div>";
                return $msg;
            }else{
                $msg = "<span class='error'>Delete Order Not Successfully</span>";
                return $msg;
            }
        }

        public function shifted_confirm($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link, $id);
            $time = mysqli_real_escape_string($this->db->link, $time);
            $price = mysqli_real_escape_string($this->db->link, $price);
            $query = "UPDATE tbl_order SET

                    status = '2', date_finish = now()

                    WHERE customer_id = '$id' AND date_order='$time' AND price ='$price'";
            $result = $this->db->update($query);
            return $result;
        }

        // DOANH THU TỪNG THÁNG
        public function get_doanhthutungthang(){
            $year = date('Y');
            $query = "SELECT (MONTH(date_finish)) AS month, SUM(price) as danhthutungthang
                        FROM tbl_order
                        WHERE 1 AND status = 1 AND YEAR(date_finish) = '$year'
                        GROUP BY month";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }

        public function get_doanh_thu_ngay_cua_thang($month)
        {
            $year = date('Y');
            $query  = "SELECT (DAYOFMONTH(date_finish)) AS ngay, SUM(price) AS Total
                        FROM tbl_order
                        WHERE status = '1' AND MONTH(date_finish) = '$month' AND YEAR(date_finish) = '$year'
                        GROUP BY ngay";
            $result = $this->db->select($query);
            return $result;
        }

}

?>