<?php 
    class product extends controllers{
        function Home()
        {
            $user = $this->models('profile');

            if (isset($_SESSION['id'])){
                $this->view("masterlayout", [
                    "pages" => "layoutmember",
                    "profile" => $user->getProfile($_SESSION['id']),
                ]);
            } else {
                $this->view("masterlayout", [
                    "pages" => "layoutmember",
                ]);
            }
        }
    }
?>