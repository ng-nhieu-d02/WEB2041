<?php 
class productmodel extends dtb{
    public function getproductshow()
    {
        $query = "SELECT * FROM product Limit 8";
        return mysqli_query($this->con,$query);
    }
    public function getallproduct()
    {
        $query = "SELECT * FROM product ORDER BY id_sanpham DESC";
        return mysqli_query($this->con,$query);
    }
    public function getCount()
    {
        $qr ="SELECT * FROM product";
        return mysqli_query($this->con,$qr);
    }
    public function getDanhMuc()
    {
        $qr ="SELECT * FROM danhmuc ORDER BY id_danhmuc DESC";
        return mysqli_query($this->con,$qr);
    }
}
?>