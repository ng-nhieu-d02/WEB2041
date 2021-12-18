<?php 
class reviewshopmodel extends dtb{
    public function getreview(){
        $query = "SELECT users.avata, users.full_name, danhgiashop.id_users, danhgiashop.noidung FROM danhgiashop INNER JOIN users ON danhgiashop.id_users = users.id_users LIMIT 7";
        return mysqli_query($this->con,$query);
    }
    public function insertReview($id,$noidung)
    {
        $qr = "INSERT INTO `danhgiashop`(`id_users`, `noidung`) VALUES ('".$id."','".$noidung."')";
        $result = false;
        if (mysqli_query($this->con,$qr)){
            $result = true;
            return json_encode($result);
        }
        return json_encode($result);
    }
    public function getReviewId($id)
    {
        $qr = "SELECT `noidung` FROM `danhgiashop` WHERE id_users=".$id."";
        return mysqli_query($this->con,$qr);
    }
    public function getreviewall(){
        $query = "SELECT users.avata, users.full_name, danhgiashop.id_users, danhgiashop.noidung FROM danhgiashop INNER JOIN users ON danhgiashop.id_users = users.id_users";
        return mysqli_query($this->con,$query);
    }
}
?>