<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

/**
 *
 */
class customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }


    public function total($sql)
    {
        $result = mysqli_query($this->db->link  , $sql);
        $tien = mysqli_fetch_assoc($result);
        return $tien;
    }

    public function insert_binhluan()
    {
        $product_id  = $_POST['product_id_binhluan'];
        $tenbinhluan = $_POST['tennguoibinhluan'];
        $binhluan    = $_POST['binhluan'];
        if ($tenbinhluan == '' || $binhluan == '') {
            $alert = "<span class='error'>Không để trống các trường</span>";
            return $alert;
        } else {
            $query  = "INSERT INTO tbl_binhluan(tenbinhluan,binhluan,product_id) VALUES('$tenbinhluan','$binhluan','$product_id')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Bình luận đã gửi</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Bình luận không thành công</span>";
                return $alert;
            }
        }
    }

    public function del_comment($id)
    {
        $query  = "DELETE FROM tbl_binhluan where binhluan_id = '$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<span class='success'>Xóa bình luận thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Xóa bình luận không thành công</span>";
            return $alert;
        }
    }

    public function show_comment()
    {
        $query  = "SELECT * FROM tbl_binhluan order by binhluan_id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function insert_customers($data)
    {
        $email     = mysqli_real_escape_string($this->db->link, $data['email']);
        $password  = mysqli_real_escape_string($this->db->link, md5($data['password']));
        $name      = mysqli_real_escape_string($this->db->link, $data['name']);
        $address   = mysqli_real_escape_string($this->db->link, $data['address']);
        $calc_shipping_provinces  = mysqli_real_escape_string($this->db->link, $data['calc_shipping_provinces']);
        $calc_shipping_district  = mysqli_real_escape_string($this->db->link, $data['calc_shipping_district']);
        $phone    = mysqli_real_escape_string($this->db->link, $data['phone']);

        if ($email == "" || $password == "" || $name == "" || $address == "" || $calc_shipping_provinces == "" || $calc_shipping_district == "" || $phone == "") {
            $alert = "<span class='error'>Không được để trống!</span>";
            return $alert;
        } else {
            $check_email  = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "<span class='error'>Tài khoản đã được sử dụng!</span>";
                return $alert;
            } else {
                $query  = "INSERT INTO tbl_customer(email,password,name,address,provinces,district,phone) VALUES('$email','$password','$name','$address','$calc_shipping_provinces','$calc_shipping_district','$phone')";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'>Tạo tài khoản thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Tạo tài khoản thất bại</span>";
                    return $alert;
                }
            }
        }
    }

    public function login_customers($data)
    {
        $email    = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if ($email == '' || $password == '') {
            $alert = "<span class='error'>Password and Email must be not empty</span>";
            return $alert;
        } else {
            $check_login  = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
            $result_check = $this->db->select($check_login);
            if ($result_check) {

                $value = $result_check->fetch_assoc();
                Session::set('customer_login', true);
                Session::set('customer_id', $value['id']);
                Session::set('customer_name', $value['name']);
                // CHUYỂN TỚI TRANG PAYMENT
                // header('location:payment.php');
                header("Refresh:0");
                $alert = "<span class='success' style='margin-left: 0px !important;' >Đăng nhập thành công</span>
					<div class='row justify-content-center'>
						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='index.php'>
								<i class='ti-shopping-cart'></i>
								<h3>Trang chủ</h3>
								<p>Đi tới trang chủ để mua hàng.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='payment.php'>
								<i class='ti-wallet'></i>
								<h3>Thanh toán</h3>
								<p>Đi đến trang thanh toán đơn hàng.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='orderdetails.php'>
								<i class='ti-truck'></i>
								<h3>Đơn hàng của bạn</h3>
								<p>Kiểm tra những đơn hàng đã đặt của bạn.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='profile.php'>
								<i class='ti-user'></i>
								<h3>Tài khoản của bạn</h3>
								<p>Kiểm tra thông tin tài khoản của bạn.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='wishlist.php'>
								<i class='ti-package'></i>
								<h3>Mục yêu thích</h3>
								<p>Xem các sản phẩm trong mục yêu thích.</p>
							</a>
						</div>

						<div class='col-lg-4 col-md-6' style='margin-top: 30px !important;'>
							<a class='box_topic' href='wishlist.php'>
								<i class='ti-comments'></i>
								<h3>Liên hệ</h3>
								<p>Liên hệ với chúng tôi khi cần hỗ trợ.</p>
							</a>
						</div>
					</div>
					";
                return $alert;
            } else {
                $alert = "<span class='error'>Tài khoản hoặc Mật khẩu không đúng</span>";
                return $alert;
            }
        }
    }

    public function show_customers($id)
    {
        $query  = "
        SELECT tbl_customer.* , tbl_province._name
        FROM tbl_customer INNER JOIN tbl_province ON tbl_customer.provinces = tbl_province.id 
        WHERE tbl_customer.id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_customers($data, $id)
    {
        $name    = mysqli_real_escape_string($this->db->link, $data['name']);
        $city    = mysqli_real_escape_string($this->db->link, $data['city']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);

        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $phone   = mysqli_real_escape_string($this->db->link, $data['phone']);

        if ($name == "" || $city == "" || $zipcode == "" || $address == "" || $country == "" || $phone == "") {
            $alert = "<span class='error'>Không được để trống các trường</span>";
            return $alert;
        } else {
            $query  = "UPDATE tbl_customer SET name='$name',city='$city',zipcode='$zipcode',address='$address',country='$country',phone='$phone' WHERE id ='$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Cập nhật thông tin thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Cập nhật thông tin không thành công</span>";
                return $alert;
            }

        }
    }

    public function insert_contacts($data)
    {


        $contactName    = mysqli_real_escape_string($this->db->link, $data['contactName']);
        $contactAddress = mysqli_real_escape_string($this->db->link, $data['contactAddress']);
        $contactPhone   = mysqli_real_escape_string($this->db->link, $data['contactPhone']);
        $contactEmail   = mysqli_real_escape_string($this->db->link, $data['contactEmail']);
        $contactMess    = mysqli_real_escape_string($this->db->link, $data['contactMess']);


        if ($contactName == '' || $contactAddress == '' || $contactPhone == '' || $contactEmail == '' || $contactMess == '') {
            $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
            return $alert;
        } else {
            $query  = "INSERT INTO tbl_contacts(contactName,contactAddress,contactPhone,contactEmail,contactMess) VALUES('$contactName','$contactAddress','$contactPhone','$contactEmail','$contactMess')";
            $result = $this->db->insert($query);

            if ($result) {
                $alert = "<div class='alert alert-success'><h4>Gửi phản hồi thành công</h4></div>";
                return $alert;
            } else {
                $alert = "<div class='alert alert-danger'><h4>Gửi phản hồi thất bại</h4></div>";
                return $alert;
            }
        }
    }

    public function show_contacts()
    {
        $query  = "SELECT * FROM tbl_contacts ORDER BY contactId";
        $result = $this->db->select($query);
        return $result;
    }

    public function del_contacts($id)
    {
        $query  = "DELETE FROM tbl_contacts WHERE contactId='$id'";
        $result = $this->db->delete($query);
        if ($result) {
            $alert = "<div class='alert alert-success'><h4>Xoá thành công</h4></div>";
            return $alert;
        } else {
            $alert = "<div class='alert alert-danger'><h4>Xoá thất bại</h4></div>";
            return $alert;
        }
    }

}

?>
