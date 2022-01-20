<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
class courses
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function show_courses(){
            // $query = "

            // SELECT p.*,c.catName, b.catsubName

            // FROM tbl_courses as p,tbl_category as c, tbl_category_sub as b where p.catId = c.catId 

            // AND p.catsubId = b.catsubId 

            // order by p.coursesId desc";

            $query = "

            SELECT tbl_courses.*, tbl_category.catName, tbl_category_sub.catsubName, tbl_teacher.teacherName

            FROM tbl_courses INNER JOIN tbl_category ON tbl_courses.catId = tbl_category.catId 

            INNER JOIN tbl_category_sub ON tbl_courses.catsubId = tbl_category_sub.catsubId 

            INNER JOIN tbl_teacher ON tbl_courses.teacherId = tbl_teacher.teacherId 

            order by tbl_courses.coursesId desc";

            // $query = "SELECT * FROM tbl_courses order by coursesId desc";

            $result = $this->db->select($query);
            return $result;
    }

    public function del_courses($id){
            $query = "DELETE FROM tbl_courses where coursesId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<div class='alert alert-success'><h4>Xoá sản phẩm thành công</h4></div>";
                return $alert;
            }else{
                $alert = "<div class='alert alert-danger'><h4>Xoá sản phẩm không thành công</h4></div>";
                return $alert;
            }
            
    }

    public function update_status_courses($id,$status){

        $status = mysqli_real_escape_string($this->db->link, $status);
        $query = "UPDATE tbl_courses SET status = '$status' where coursesId='$id'";
        $result = $this->db->update($query);
        return $result;
    }


    //START FRONT-END
        //
    public function getcourses_feathered(){
            $query = "SELECT * FROM tbl_courses where status = '1' order by RAND() desc LIMIT 8 ";
            $result = $this->db->select($query);
            return $result;
        }

    public function getcourses_feathered_limit4(){
            $query = "

            SELECT tbl_courses.*, tbl_category.catName, tbl_category_sub.catsubName, tbl_teacher.teacherName

            FROM tbl_courses INNER JOIN tbl_category ON tbl_courses.catId = tbl_category.catId 

            INNER JOIN tbl_category_sub ON tbl_courses.catsubId = tbl_category_sub.catsubId 

            INNER JOIN tbl_teacher ON tbl_courses.teacherId = tbl_teacher.teacherId 

            WHERE tbl_courses.status = '1'

            order by RAND() LIMIT 4";

            $result = $this->db->select($query);
            return $result;
        }

    public function getcourses_new(){
            $query = "SELECT * FROM tbl_courses where status = '1' order by coursesId desc LIMIT 8 ";
            $result = $this->db->select($query);
            return $result;
        }

    public function get_details($id){
            $query = "

            SELECT tbl_courses.*, tbl_category.catName, tbl_category_sub.catsubName, tbl_teacher.teacherName

            FROM tbl_courses INNER JOIN tbl_category ON tbl_courses.catId = tbl_category.catId 

            INNER JOIN tbl_category_sub ON tbl_courses.catsubId = tbl_category_sub.catsubId 

            INNER JOIN tbl_teacher ON tbl_courses.teacherId = tbl_teacher.teacherId 

            WHERE tbl_courses.coursesId = '$id'

            ";

            $result = $this->db->select($query);
            return $result;
        }

    public function getcourses_related($catsubId){
            $query = "SELECT * FROM tbl_courses where status = '1' and catsubId = '$catsubId' ORDER BY coursesId DESC ";
            $result = $this->db->select($query);
            return $result;
        }

}

?>