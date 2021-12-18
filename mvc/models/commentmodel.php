<?php 
class commentmodel extends dtb{
    public function insertCmt($idSp,$idUser,$noiDung)
    {
        $qr = "INSERT INTO `binhluan`(`id_sanpham`, `id_users`, `noidung`) 
        VALUES ('".$idSp."','".$idUser."','".$noiDung."')";
        $result = false;
        if (mysqli_query($this->con,$qr)){
            $result = true;
            return json_encode($result);
        }
        return json_encode($result);
    }
    public function getCmt($id)
    {
        $qr = "SELECT binhluan.id_sanpham, binhluan.noidung,product.urlpicture,product.name_sp 
        FROM (binhluan INNER JOIN product ON binhluan.id_sanpham = product.id_sanpham) WHERE binhluan.id_users=".$id." ";
        return mysqli_query($this->con,$qr);
    }
    public function removeCmt($idSp,$idUser)
    {
        $qr = "DELETE FROM `binhluan` WHERE id_sanpham =".$idSp." AND id_users =".$idUser."";
        $result = false;
        if(mysqli_query($this->con,$qr)){
            $result=true;
            return json_encode($result);
        }
        return json_encode($result);
    }
    public function UpdateCmt($idSp,$idUser,$noidung)
    {
        $qr = "UPDATE `binhluan` SET `noidung`='".$noidung."' WHERE id_sanpham =".$idSp." AND id_users =".$idUser."";
        $result = false;
        if(mysqli_query($this->con,$qr)){
            $result=true;
            return json_encode($result);
        }
        return json_encode($result);
    }
}
?>