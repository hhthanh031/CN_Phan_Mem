<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
class teacher
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function show_teacher(){
            // $query = "

            // SELECT p.*,c.catName, b.catsubName

            // FROM tbl_teacher as p,tbl_category as c, tbl_category_sub as b where p.catId = c.catId 

            // AND p.catsubId = b.catsubId 

            // order by p.teacherId desc";

            $query = "

            SELECT tbl_teacher.*, tbl_category.catName, tbl_category_sub.catsubName 

            FROM tbl_teacher INNER JOIN tbl_category ON tbl_teacher.catId = tbl_category.catId 

            INNER JOIN tbl_category_sub ON tbl_teacher.catsubId = tbl_category_sub.catsubId 

            where status='1'

            order by tbl_teacher.teacherId Asc";

            // $query = "SELECT * FROM tbl_teacher order by teacherId desc";

            $result = $this->db->select($query);
            return $result;
    }

    public function show_teacher1(){
            // $query = "

            // SELECT p.*,c.catName, b.catsubName

            // FROM tbl_teacher as p,tbl_category as c, tbl_category_sub as b where p.catId = c.catId 

            // AND p.catsubId = b.catsubId 

            // order by p.teacherId desc";

            $query = "

            SELECT tbl_teacher.*, tbl_category.catName, tbl_category_sub.catsubName 

            FROM tbl_teacher INNER JOIN tbl_category ON tbl_teacher.catId = tbl_category.catId 

            INNER JOIN tbl_category_sub ON tbl_teacher.catsubId = tbl_category_sub.catsubId 

            order by tbl_teacher.teacherId Asc";

            // $query = "SELECT * FROM tbl_teacher order by teacherId desc";

            $result = $this->db->select($query);
            return $result;
    }

    public function show_teacher_by_id($id){
            // $query = "

            // SELECT p.*,c.catName, b.catsubName

            // FROM tbl_teacher as p,tbl_category as c, tbl_category_sub as b where p.catId = c.catId 

            // AND p.catsubId = b.catsubId 

            // order by p.teacherId desc";

            $query = "

            SELECT tbl_teacher.*, tbl_category.catName, tbl_category_sub.catsubName 

            FROM tbl_teacher INNER JOIN tbl_category ON tbl_teacher.catId = tbl_category.catId 

            INNER JOIN tbl_category_sub ON tbl_teacher.catsubId = tbl_category_sub.catsubId
            
            where teacherId='$id' 

            order by tbl_teacher.teacherId Asc";

            // $query = "SELECT * FROM tbl_teacher order by teacherId desc";

            $result = $this->db->select($query);
            return $result;
    }

    public function del_teacher($id){
            $query = "DELETE FROM tbl_teacher where teacherId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<div class='alert alert-success'><h4>Xoá sản phẩm thành công</h4></div>";
                return $alert;
            }else{
                $alert = "<div class='alert alert-danger'><h4>Xoá sản phẩm không thành công</h4></div>";
                return $alert;
            }
            
    }

    public function update_status_teacher($id,$status){

        $status = mysqli_real_escape_string($this->db->link, $status);
        $query = "UPDATE tbl_teacher SET status = '$status' where teacherId='$id'";
        $result = $this->db->update($query);
        return $result;
    }

    //TEACHER DETAILS
    public function get_details($id){
            $query = "

            SELECT tbl_teacher.*, tbl_category.catName, tbl_category_sub.catsubName

            FROM tbl_teacher INNER JOIN tbl_category ON tbl_teacher.catId = tbl_category.catId 

            INNER JOIN tbl_category_sub ON tbl_teacher.catsubId = tbl_category_sub.catsubId 

            WHERE tbl_teacher.teacherId = '$id'

            ";

            $result = $this->db->select($query);
            return $result;
        }

    public function getcourses_related($teacherId){
            $query = "SELECT * FROM tbl_courses where status = '1' and teacherId = '$teacherId' ORDER BY coursesId DESC ";
            $result = $this->db->select($query);
            return $result;
        }

    public function check_courses($teacherId){
            $query = "SELECT * FROM tbl_courses where teacherId = '$teacherId' ";
            $result = $this->db->select($query);
            return $result;
        }


}

?>