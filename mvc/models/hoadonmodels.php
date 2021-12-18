<?php 
class hoadonmodels extends dtb{
    public function insertHoaDon($id,$address,$sdt,$total,$count,$idSanP,$price,$Qti)
    {
        $query = "INSERT INTO `hoadon`(`id_users`, `address`, `phone_number_nhan`, `count_price`) VALUES ('".$id."','".$address."','".$sdt."','".$total."')";    
        $result = false;
        if(mysqli_query($this->con,$query)){
            $idHoaDon = mysqli_insert_id($this->con);
            for($x=0;$x<$count;$x++){
                $qr ="INSERT INTO `chitiethoadon`(`id_hoadon`, `id_sanpham`, `soluong`, `giasanpham`) VALUES ('".$idHoaDon."','".$idSanP[$x]."','".$Qti[$x]."','".$price[$x]."')";
                mysqli_query($this->con,$qr);
            }
            $result=true;
            return json_encode($result);
        }
        return json_encode($result);
    }
    public function getHoaDon($id)
    {
        $qr = "SELECT `id_hoadon`, `address`, `phone_number_nhan`, `count_price`, `created_date`, `status` FROM `hoadon` WHERE `id_users`=".$id." ORDER BY id_hoadon DESC";
        return mysqli_query($this->con,$qr);
    }
    public function HuyHD($id)
    {
        $qr = "UPDATE `hoadon` SET `status`=3 WHERE `id_hoadon` = ".$id." ";
        return mysqli_query($this->con,$qr);
    }
    public function GetSanPUser($id)
    {
        $qr = " SELECT chitiethoadon.id_sanpham, product.name_sp, product.urlpicture, chitiethoadon.giasanpham 
                FROM ((chitiethoadon
                INNER JOIN hoadon ON hoadon.id_hoadon = chitiethoadon.id_hoadon)
                INNER JOIN product ON product.id_sanpham = chitiethoadon.id_sanpham)
                WHERE hoadon.id_users = ".$id." AND chitiethoadon.id_sanpham NOT IN (SELECT id_sanpham FROM binhluan) GROUP BY chitiethoadon.id_sanpham ";
        return mysqli_query($this->con,$qr);
    }
    public function getCountHd()
    {
        $query = "SELECT * FROM hoadon";
        return mysqli_query($this->con,$query);
    }
    public function getCountHdChoXL()
    {
        $query = "SELECT * FROM hoadon WHERE status = 1";
        return mysqli_query($this->con,$query);
    }
    public function getCountHdDXl()
    {
        $query = "SELECT * FROM hoadon WHERE status = 2";
        return mysqli_query($this->con,$query);
    }
    public function getCountHdDaXl()
    {
        $query = "SELECT * FROM hoadon WHERE status = 3 or status = 4 or status = 5";
        return mysqli_query($this->con,$query);
    }
    public function getDThu()
    {
        $query = "SELECT count_price from hoadon where status = 4";
        return mysqli_query($this->con,$query);
    }
    public function getAllHoaDon()
    {
        $query ="SELECT * from hoadon ORDER BY id_hoadon DESC";
        return mysqli_query($this->con,$query);
    }
}
?>