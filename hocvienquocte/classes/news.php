<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
class news
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function show_news(){
            // $query = "

            // SELECT p.*,c.catName, b.catsubName

            // FROM tbl_news as p,tbl_category as c, tbl_category_sub as b where p.catId = c.catId 

            // AND p.catsubId = b.catsubId 

            // order by p.newsId desc";

            $query = "

            SELECT tbl_news.*, tbl_category.catName, tbl_category_sub.catsubName 

            FROM tbl_news INNER JOIN tbl_category ON tbl_news.catId = tbl_category.catId 

            INNER JOIN tbl_category_sub ON tbl_news.catsubId = tbl_category_sub.catsubId 

            order by tbl_news.newsId desc";

            // $query = "SELECT * FROM tbl_news order by newsId desc";

            $result = $this->db->select($query);
            return $result;
    }

    public function del_news($id){
            $query = "DELETE FROM tbl_news where newsId = '$id'";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<div class='alert alert-success'><h4>Xoá bài viết thành công</h4></div>";
                return $alert;
            }else{
                $alert = "<div class='alert alert-danger'><h4>Xoá bài viết không thành công</h4></div>";
                return $alert;
            }
            
    }

    public function update_status_news($id,$status){

        $status = mysqli_real_escape_string($this->db->link, $status);
        $query = "UPDATE tbl_news SET status = '$status' where newsId='$id'";
        $result = $this->db->update($query);
        return $result;
    }

    public function get_news_by_catsub_order($id, $orderField, $orderSort){
        $query = "SELECT * FROM tbl_news WHERE catsubId='$id' AND status = '1' ORDER BY $orderField $orderSort ";
        // print_r($query);exit;
        $result = $this->db->select($query);
        return $result;
    }

    public function get_news_by_catsub($id){
        $query = "SELECT * FROM tbl_news WHERE catsubId='$id' AND status = '1' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_details($id){
            $query = "

            SELECT tbl_news.*, tbl_category.catName, tbl_category_sub.catsubName

            FROM tbl_news INNER JOIN tbl_category ON tbl_news.catId = tbl_category.catId 

            INNER JOIN tbl_category_sub ON tbl_news.catsubId = tbl_category_sub.catsubId 

            WHERE tbl_news.newsId = '$id'

            ";

            $result = $this->db->select($query);
            return $result;
        }

    public function getnews_related($catsubId){
            $query = "SELECT * FROM tbl_news where status = '1' and catsubId = '$catsubId' ORDER BY newsId DESC ";
            $result = $this->db->select($query);
            return $result;
        }

}

?>