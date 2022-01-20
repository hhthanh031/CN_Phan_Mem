<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
class catsub
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_catsub($data,$files){

        $catsubName = mysqli_real_escape_string($this->db->link, $data['catsubName']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
        $catsubType = mysqli_real_escape_string($this->db->link, $data['catsubType']);

        //Kiem tra hinh anh
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($catsubName=="" || $catId=="" || $file_name ==""){
            $alert = "<div class='alert alert-danger'><h4>Không được để trống!</h4></div>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_category_sub(catsubName, catId, catsubImage, catsubType ) VALUES('$catsubName', '$catId', ,'$unique_image', '$catsubType')";
            $result = $this -> db -> insert($query);

            if($result){
                $alert ="<div class='alert alert-success'><h4>Thêm mới thành công</h4></div>";
                return $alert;
            }else{
                $alert ="<div class='alert alert-danger'><h4>Thêm mới thất bại</h4></div>";
                return $alert;
            }   
        }
    }

    public function show_catsub(){
        // $query = "SELECT * FROM tbl_category_sub ORDER BY catsubId";

        $query = "SELECT tbl_category_sub.*, tbl_category.*
                    FROM tbl_category_sub INNER JOIN tbl_category ON tbl_category_sub.catId = tbl_category.catId
                    ORDER BY tbl_category_sub.catsubId ";

        $result = $this -> db -> select($query);
        return $result;
    }

    public function getcatsubbyId($id){
        $query = "SELECT * FROM tbl_category_sub WHERE catsubId='$id'";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_type_catsub($id,$catsubType){

        $catsubType = mysqli_real_escape_string($this->db->link, $catsubType);
        $query = "UPDATE tbl_category_sub SET catsubType = '$catsubType' where catsubId='$id'";
        $result = $this->db->update($query);
        return $result;
    }

    public function update_catsub($data,$files,$id){

        $catsubName = mysqli_real_escape_string($this->db->link, $data['catsubName']);
        $catId = mysqli_real_escape_string($this->db->link, $data['catId']);
        $catsubType = mysqli_real_escape_string($this->db->link, $data['catsubType']);

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

        if(empty($catsubName)){
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
                    $query = "UPDATE tbl_category_sub SET
                    catsubName = '$catsubName',
                    catId = '$catId', 
                    catsubType = '$catsubType', 
                    catsubImage = '$unique_image',
                    WHERE catsubId = '$id'";
                    
                }else{
                    //Nếu người dùng không chọn ảnh
                    $query = "UPDATE tbl_category_sub SET

                    catsubName = '$catsubName',
                    catId = '$catId',
                    catsubType = '$catsubType', 

                    WHERE catsubId = '$id'";
                    
                }
            $result = $this->db->update($query);

            if($result){
                $alert ="<div class='alert alert-success'><h4>Chỉnh sửa thành công</h4></div>";
                return $alert;
            }else{
                $alert ="<div class='alert alert-danger'><h4>Chỉnh sửa thất bại</h4></div>";
                return $alert;
            }   
        }
    }

    public function del_catsub($id){
        $query = "DELETE FROM tbl_category_sub WHERE catsubId='$id'";
        $result = $this -> db -> delete($query);
        if($result){
            $alert ="<div class='alert alert-success'><h4>Xoá thành công</h4></div>";
            return $alert;
        }else{
            $alert ="<div class='alert alert-danger'><h4>Xoá thất bại</h4></div>";
            return $alert;
        }   
    }

    // TRANG CLIENT (FRONT-END)
    public function show_catsub_fontend(){
        $query = "SELECT * FROM tbl_category_sub order by catsubId ";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_catsub_fontend_and_category($catid){
        $query = "SELECT * FROM tbl_category_sub where catId='$catid' and catsubType='1' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_name_by_catsub($id){
        $query = "SELECT tbl_courses.*,tbl_category_sub.catsubName,tbl_category_sub.catsubId 
                    FROM tbl_courses,tbl_category_sub 
                    WHERE tbl_courses.catsubId=tbl_category_sub.catsubId 
                    AND tbl_courses.catsubId ='$id' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_courses_by_catsub($id){
        $query = "SELECT * FROM tbl_courses WHERE catsubId='$id' AND status = '1' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_courses_by_catsub_order($id, $orderField, $orderSort){
        $query = "SELECT * FROM tbl_courses WHERE catsubId='$id' AND status = '1' ORDER BY $orderField $orderSort ";
        // print_r($query);exit;
        $result = $this->db->select($query);
        return $result;
    }

    //FRONT-END
    public function get_catsub_item(){
            $query = "SELECT * FROM tbl_category_sub where catsubType = '1' order by RAND() desc LIMIT 8 ";
            $result = $this->db->select($query);
            return $result;
        }
}

?>