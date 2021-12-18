<?php

class index extends controllers
{
    function Home()
    {
        $prd = $this->models("productmodel");
        $review = $this->models('reviewshopmodel');
        $blog = $this->models('blogmodel');
        $user = $this->models('profile');

        if ( isset($_POST['btnSignup']) ) {

            $fullname = $_POST['usernamesignup'];
            $password = $_POST['passwordsignup'];
            $email = $_POST['emailsignup'];

            $result = $user->newUser($fullname,$password,$email);
        }

        if (isset($_POST['btnLogin'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $ketQua = $user->login($email,$password);
            if($ketQua[0] == "true"){
                $login = $ketQua[0];
                $_SESSION['id']=$ketQua[1];
            }else{
                $login = $ketQua[0];
            }
        }

        if (isset($result)){
            $this->view("masterlayout", [
                "pages" => "home",
                "product" => $prd->getproductshow(),
                "review" => $review->getreview(),
                "blog" => $blog->getblog(),
                // "profile" => $user->getProfile($_SESSION['id']),
                "result" => $result
            ]);
        } elseif (isset($login)&&$login=="true"){
            $this->view("masterlayout", [
                "pages" => "home",
                "product" => $prd->getproductshow(),
                "review" => $review->getreview(),
                "blog" => $blog->getblog(),
                "login" => $login,
                "profile" => $user->getProfile($_SESSION['id'])
            ]);
        }elseif (isset($login)&&$login=='false'){
            $this->view("masterlayout", [
                "pages" => "home",
                "product" => $prd->getproductshow(),
                "review" => $review->getreview(),
                "blog" => $blog->getblog(),
                "login" => $login,
            ]);
        } elseif (isset($_SESSION['id'])){
            $this->view("masterlayout", [
                "pages" => "home",
                "product" => $prd->getproductshow(),
                "review" => $review->getreview(),
                "profile" => $user->getProfile($_SESSION['id']),
                "blog" => $blog->getblog(),
            ]);
        } else {
            $this->view("masterlayout", [
                "pages" => "home",
                "product" => $prd->getproductshow(),
                "review" => $review->getreview(),
                "blog" => $blog->getblog(),
            ]);
        }
    }
    function Logout()
    {
        if(isset($_SESSION['id']) && $_SESSION['id']!=null){
            unset($_SESSION['id']);
            header("location: index");
        } else{
            header("location: index");
        }
    }
}
?>
