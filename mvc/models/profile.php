<?php 
class profile extends dtb{
    public function newUser($fullname,$password,$email){
        $qr = "SELECT * FROM `users` WHERE email ='".$email."'";
        $result = mysqli_query($this->con, $qr);
        $data = array();
        while($row = mysqli_fetch_array($result,1)){
            $data[] = $row;
        }
        $result = false;

        if ($data != null & count($data)>0){
            return json_encode($result);
        } else{
            $query = "INSERT INTO `users` (`full_name`, `password`, `email`) VALUES ('".$fullname."', '".$password."', '".$email."')";
            if (mysqli_query($this->con,$query)){
                    $result = true;
                }
            return json_encode($result);
        }
    }
    public function getProfile($id){
        $query = "SELECT * FROM `users` WHERE id_users=".$id."";
        return mysqli_query($this->con,$query);
    }
    public function login($email,$password){
        $qr = "SELECT * FROM `users` WHERE email ='".$email."' AND password ='".$password."'";
        $result = mysqli_query($this->con, $qr);
        $kq = "false";
        if(mysqli_num_rows($result)>0){
            $kq = "true";
            $row = mysqli_fetch_array($result);
            $id = $row['id_users'];
            $data=array($kq,$id);
            return $data;
        } else{
            $data=array($kq);
            return $data;
        }
    }
    public function updateProfile($id,$fullname,$password,$address,$avatar,$phoneNumber){
        if($password!=null) {
            $query = "UPDATE `users` SET `full_name`='".$fullname."',`password`='".$password."',`address`='".$address."',`phone_number`='".$phoneNumber."',`avata`='".$avatar."' WHERE `id_users`=".$id."";
        }else{
            $query = "UPDATE `users` SET `full_name`='".$fullname."',`address`='".$address."',`phone_number`='".$phoneNumber."',`avata`='".$avatar."' WHERE `id_users`=".$id."";
        }
        $result = false;
        if(mysqli_query($this->con,$query)){
            $result = true;
            return json_encode($result);
        } else{
            return json_encode($result);
        }
    }
    public function countMember(){
        $query = "SELECT * FROM users";
        return mysqli_query($this->con,$query);
    }
    public function GetVipMember()
    {
        $query = "SELECT users.full_name, users.email, hoadon.id_users,COUNT(id_hoadon) as TongHoaDon
        FROM hoadon inner join users on hoadon.id_users = users.id_users GROUP BY id_users 
        ORDER BY COUNT(id_hoadon) DESC LIMIT 7 ";
        return mysqli_query($this->con,$query);
    }
}
?>