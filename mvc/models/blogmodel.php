<?php 
class blogmodel extends dtb{
    public function getblog(){
        $query = "SELECT * FROM blog LIMIT 10";
        return mysqli_query($this->con,$query);
    }
}
?>