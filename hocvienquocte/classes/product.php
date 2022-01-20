<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function search_courses($tukhoa){
        $tukhoa = $this->fm->validation($tukhoa);
        $query = "SELECT * FROM tbl_courses WHERE coursesName LIKE '%$tukhoa%' AND status ='1' AND quantity>0";
        $result = $this->db->select($query);
        return $result;

    }

    public function insert_product($data,$files){


        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
            //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name ==""){
            $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(productName,brandId,catId,product_desc,price,type,image) VALUES('$productName','$brand','$category','$product_desc','$price','$type','$unique_image')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "<div class='alert alert-success'><h4>Thêm mới thành công</h4></div>";
                return $alert;
            }else{
                $alert = "<div class='alert alert-danger'><h4>Thêm mới thất bại</h4></div>";
                return $alert;
            }
        }
    }

    public function show_product(){
            // $query = "

            // SELECT p.*,c.catName, b.brandName

            // FROM tbl_product as p,tbl_category as c, tbl_brand as b where p.catId = c.catId 

            // AND p.brandId = b.brandId 

            // order by p.productId desc";

            $query = "

            SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 

            order by tbl_product.productId desc";

            // $query = "SELECT * FROM tbl_product order by productId desc";

            $result = $this->db->select($query);
            return $result;
        }

    public function getproductbyId($id){
            $query = "SELECT * FROM tbl_product where productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

    public function update_type_product($id,$type){

        $type = mysqli_real_escape_string($this->db->link, $type);
        $query = "UPDATE tbl_product SET type = '$type' where productId='$id'";
        $result = $this->db->update($query);
        return $result;
    }

    public function update_status_product($id,$status){

        $status = mysqli_real_escape_string($this->db->link, $status);
        $query = "UPDATE tbl_product SET status = '$status' where productId='$id'";
        $result = $this->db->update($query);
        return $result;
    }

    public function update_product($data,$files,$id){

        
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited  = array('jpg', 'jpeg', 'png', 'gif');

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            // $file_current = strtolower(current($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;


            if($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type==""){
                $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //Nếu người dùng chọn ảnh
                    if ($file_size > 1000000) {

                     $alert = "<div class='alert alert-danger'><h4>Dung lượng ảnh phải nhỏ hơn 2MB!</h4></div>";
                    return $alert;
                    } 
                    elseif (in_array($file_ext, $permited) === false) 
                    {
                     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";    
                    $alert = "<div class='alert alert-danger'><h4>Bạn chỉ có thể tải lên:-".implode(', ', $permited)."</h4></div>";
                    return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "UPDATE tbl_product SET
                    productName = '$productName',
                    brandId = '$brand',
                    catId = '$category', 
                    type = '$type', 
                    price = '$price', 
                    image = '$unique_image',
                    product_desc = '$product_desc'
                    WHERE productId = '$id'";
                    
                }else{
                    //Nếu người dùng không chọn ảnh
                    $query = "UPDATE tbl_product SET

                    productName = '$productName',
                    brandId = '$brand',
                    catId = '$category', 
                    type = '$type', 
                    price = '$price', 
                    
                    product_desc = '$product_desc'

                    WHERE productId = '$id'";
                    
                }
                $result = $this->db->update($query);
                    if($result){
                        $alert = "<div class='alert alert-success'><h4>Cập nhật sản phẩm thành công</h4></div>";
                        return $alert;
                    }else{
                        $alert = "<div class='alert alert-danger'><h4>Cập nhật sản phẩm không thành công</h4></div>";
                        return $alert;
                    }
                
            }

        }

    public function del_product($id){
            $query = "DELETE FROM tbl_product where productId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<div class='alert alert-success'><h4>Xoá sản phẩm thành công</h4></div>";
                return $alert;
            }else{
                $alert = "<div class='alert alert-danger'><h4>Xoá sản phẩm không thành công</h4></div>";
                return $alert;
            }
            
        }


        // END BACK END
        
        //START FRONT-END
        //
        public function getproduct_feathered(){
            $query = "SELECT * FROM tbl_product where type = '0' and status = '0' AND quantity>0 order by RAND() desc LIMIT 8 ";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_related($brandId){
            $query = "SELECT * FROM tbl_product where status = '0' and brandId = '$brandId' AND quantity>0 ORDER BY productId DESC ";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_new(){
            $query = "SELECT * FROM tbl_product where status = '0' AND quantity>0 order by productId desc LIMIT 8 ";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id){
            $query = "

            SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 

            FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId 

            INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId WHERE tbl_product.productId = '$id'

            ";

            $result = $this->db->select($query);
            return $result;
        }


        // LẤY CHUỖI HÌNH ẢNH SIDEBAR CỦA SẢN PHẨM
        public function get_details_image($id){
            $query = "

            SELECT tbl_product.*, img_products.image 

            FROM tbl_product INNER JOIN img_products ON tbl_product.productId = img_products.id_product 

            WHERE tbl_product.productId = '$id'

            ";

            $result = $this->db->select($query);
            return $result;
        }

        // LẤY SẢN PHẨM CÓ TYPE = 0
        public function getproduct_a(){
            $query = "SELECT * FROM tbl_product where type = '0' order by RAND() desc LIMIT 8 ";
            $result = $this->db->select($query);
            return $result;
        }

        public function insertWishlist($productid, $customer_id){
            $productid = mysqli_real_escape_string($this->db->link, $productid);
            $customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
            
            $check_wlist = "SELECT * FROM tbl_wishlist WHERE productId = '$productid' AND customer_id ='$customer_id'";
            $result_check_wlist = $this->db->select($check_wlist);

            if($result_check_wlist){
                $msg = "<span class='error'>Sản phẩm đã được thêm vào mục yêu thích</span>";
                return $msg;
            }else{

            $query = "SELECT * FROM tbl_product WHERE productId = '$productid'";
            $result = $this->db->select($query)->fetch_assoc();
            
            $productName = $result["productName"];
            $price = $result["price"];
            $image = $result["image"];

            
            
            $query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName')";
            $insert_wlist = $this->db->insert($query_insert);

            if($insert_wlist){
                        $alert = "<span class='success'>Thêm vào mục yêu thích thành công</span>";
                        return $alert;
                    }else{
                        $alert = "<span class='error'>Thêm vào mục yêu thích thất bại</span>";
                        return $alert;
                    }
            }
        }

        public function get_wishlist($customer_id){
            $query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id' order by id desc";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_wlist($proid,$customer_id){
            $query = "DELETE FROM tbl_wishlist where productId = '$proid' AND customer_id='$customer_id'";
            $result = $this->db->delete($query);
            return $result;
        }

        public function check_wishlist($customer_id){
            $sId = session_id();
            $query = "SELECT * FROM tbl_wishlist WHERE customer_id = '$customer_id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_slider($data,$files){
            $sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            
            //Kiem tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited  = array('jpg', 'jpeg', 'png', 'gif');

            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            // $file_current = strtolower(current($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;


            if($sliderName=="" || $type==""){
                $alert = "<div class='alert alert-danger'><h4>Không được để trống các trường!</h4></div>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //Nếu người dùng chọn ảnh
                    if ($file_size > 500000000) {

                     $alert = "<div class='alert alert-danger'><h4>Hình ảnh phải nhỏ hơn 500MB!</h4></div>";
                    return $alert;
                    } 
                    elseif (in_array($file_ext, $permited) === false) 
                    {
                     // echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";    
                    $alert = "<span class='success'>You can upload only:-".implode(', ', $permited)."</span>";
                    return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image')";
                    $result = $this->db->insert($query);
                    if($result){
                        $alert = "<div class='alert alert-success'><h4>Thêm mới thành công</h4></div>";
                        return $alert;
                    }else{
                        $alert = "<div class='alert alert-danger'><h4>Thêm mới thất bại</h4></div>";
                        return $alert;
                    }
                }
                
                
            }
        }

        public function show_slider(){
            $query = "SELECT * FROM tbl_slider where type='1' order by RAND()";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_slider_list(){
            $query = "SELECT * FROM tbl_slider order by sliderId";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_slider($id){
            $query = "DELETE FROM tbl_slider where sliderId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<div class='alert alert-success'><h4>Xoá banner thành công</h4></div>";
                return $alert;
            }else{
                $alert = "<div class='alert alert-danger'><h4>Xoá banner không thành công</h4></div>";
                return $alert;
            }
        }

        public function update_type_slider($id,$type){

            $type = mysqli_real_escape_string($this->db->link, $type);
            $query = "UPDATE tbl_slider SET type = '$type' where sliderId='$id'";
            $result = $this->db->update($query);
            return $result;
        } 

}

?>