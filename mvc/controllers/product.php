<?php 
    class product extends controllers{
        function Home($page,$id)
        {
            $user = $this->models('profile');

            if (isset($_SESSION['id'])){
                $this->view("masterlayout", [
                    "pages" => "layoutmember",
                    "id_product" => $id,
                    "profile" => $user->getProfile($_SESSION['id']),
                ]);
            } else {
                $this->view("masterlayout", [
                    "pages" => "layoutmember",
                    "id_product" => $id,
                ]);
            }
        }
    }
?>