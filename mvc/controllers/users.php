<?php 
    class users extends controllers{
        function Home(){
            $user = $this->models('profile');

            if ( isset($_POST['btn-info']) ) {

                $fullname = $_POST['full-name'];
                $password = $_POST['pass-word'];
                $address = $_POST['dia-chi'];
                $avatar = "./public/images/".$_POST['avatarInfo'];
                $phoneNumber = $_POST['phone-number'];
                $id=$_SESSION['id'];

                $kq = $user->updateProfile($id,$fullname,$password,$address,$avatar,$phoneNumber);
                $result = $kq;
            }

            if (isset($_SESSION['id']) && !isset($result)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "profile" => $user->getProfile($_SESSION['id']),
                    "function" => "info",
                ]);
            } elseif (isset($_SESSION['id']) && isset($result)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "profile" => $user->getProfile($_SESSION['id']),
                    "function" => "info",
                    "kQua" => $result,
                ]);
            } else {
                $this->view("masterlayout", [
                    "pages" => "users",
                    "function" => "noId",
                ]);
            }
        }
        function HistoryOder(){
            $user = $this->models('profile');
            $HoaDon = $this->models('hoadonmodels');

            if(isset($_POST['btn-HuyHD'])){
                $idSp = $_POST['checkID'];
                $kq = $HoaDon->HuyHD($idSp);
            }

            if (isset($_SESSION['id']) && !isset($kq)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "hoaDon" => $HoaDon->getHoaDon($_SESSION['id']),
                    "profile" => $user->getProfile($_SESSION['id']),
                    "function" => "historyOder"
                ]);
            } elseif (isset($_SESSION['id']) && isset($kq)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "hoaDon" => $HoaDon->getHoaDon($_SESSION['id']),
                    "profile" => $user->getProfile($_SESSION['id']),
                    "function" => "historyOder",
                    "kqHuy" => $kq
                ]);
            }else {
                $this->view("masterlayout", [
                    "pages" => "users",
                    "function" => "noId"
                ]);
            }
        }
        function Oder(){
            $user = $this->models('profile');
            $Oder = $this->models('hoadonmodels');

            if(isset($_POST['btn-Oder'])){
                error_reporting(0);
                $sdt = $_POST['sdt'];
                $address = $_POST['diaChi'];
                $total = $_POST['Total'];
                $count = count($_POST['idPrd']);
                $idPrd = $_POST['idPrd'];
                $price = str_replace(',','',$_POST['PricePrd']);
                $Qti = $_POST['qtyOder'];

                $totalReal = str_replace('.','',$total);
                if($count>0){
                    $kq = $Oder->insertHoaDon($_SESSION['id'],$address,$sdt,$totalReal,$count,$idPrd,$price,$Qti);
                } else{
                    $kq = false;
                }
                $result = $kq;
            }

            if (isset($_SESSION['id']) && !isset($result)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "profile" => $user->getProfile($_SESSION['id']),
                    "function" => "Oder"
                ]);
            } elseif(isset($_SESSION['id']) && isset($result)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "profile" => $user->getProfile($_SESSION['id']),
                    "function" => "Oder",
                    "ketQua" => $result
                ]);
            } else {
                $this->view("masterlayout", [
                    "pages" => "users",
                    "function" => "noId"
                ]);
            }
        }
        function HistoryProduct(){
            $user = $this->models('profile');
            $Oder = $this->models('hoadonmodels');
            $comment = $this->models('commentmodel');

            if(isset($_POST['btn-submit-commentP'])){
                $noiDung = $_POST['checkDGiaSpinHtr'];
                $idSp = $_POST['checkIDSpinHtr'];

                $kq = $comment->insertCmt($idSp,$_SESSION['id'],$noiDung);
            }
            if(isset($_POST['btn-submit-commentXoa'])){
                $idSp = $_POST['checkIDSpinCmt'];

                $kq = $comment->removeCmt($idSp,$_SESSION['id']);
            }
            if(isset($_POST['btn-submit-commentMMN'])){
                $idSp = $_POST['checkIDSpinCmt'];
                $noidung = $_POST['checkDGiaSpinHtrMoi'];

                $kq = $comment->UpdateCmt($idSp,$_SESSION['id'],$noidung);
            }


            if (isset($_SESSION['id'])&& !isset($kq)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "profile" => $user->getProfile($_SESSION['id']),
                    "historyPRd" => $Oder->GetSanPUser($_SESSION['id']),
                    "comment" => $comment->getCmt($_SESSION['id']),
                    "function" => "historyPrd"
                ]);
            }elseif(isset($_SESSION['id']) && isset($kq)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "profile" => $user->getProfile($_SESSION['id']),
                    "historyPRd" => $Oder->GetSanPUser($_SESSION['id']),
                    "comment" => $comment->getCmt($_SESSION['id']),
                    "function" => "historyPrd",
                    "chiSua" => $kq
                ]);
            } else {
                $this->view("masterlayout", [
                    "pages" => "users",
                    "function" => "noId"
                ]);
            }
        }
        function HistoryActivities(){
            $user = $this->models('profile');
            $review = $this->models('reviewshopmodel');

            if (isset($_POST['guiReview'])){
                $noidung = $_POST['NoiDReview'];

                $kq = $review->insertReview($_SESSION['id'],$noidung);
            }

            if (isset($_SESSION['id'])&& !isset($kq)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "profile" => $user->getProfile($_SESSION['id']),
                    "review"=>$review->getReviewId($_SESSION['id']),
                    "function" => "HistoryActivities"
                ]);
            } elseif(isset($_SESSION['id']) && isset($kq)){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "profile" => $user->getProfile($_SESSION['id']),
                    "review"=>$review->getReviewId($_SESSION['id']),
                    "function" => "HistoryActivities",
                    "checkReview" => $kq
                ]);
            } else {
                $this->view("masterlayout", [
                    "pages" => "users",
                    "function" => "noId"
                ]);
            }
        }
        function Banking(){
            $user = $this->models('profile');
            
            if (isset($_SESSION['id'])){
                $this->view("masterlayout", [
                    "pages" => "users",
                    "profile" => $user->getProfile($_SESSION['id']),
                    "function" => "Banking"
                ]);
            }else {
                $this->view("masterlayout", [
                    "pages" => "users",
                    "function" => "noId"
                ]);
            }
        }
    }
?>