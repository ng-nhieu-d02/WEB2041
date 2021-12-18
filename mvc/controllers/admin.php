<?php 
class admin extends controllers{
    function Home()
    {
        $profile = $this->models('profile');
        $product = $this->models('productmodel');
        $hoaDon = $this->models('hoadonmodels');

        $this->view('adminlayout',[
        "pageAdmin" => "home",
        "TongMember" => $profile->countMember(),
        "TongProduct" => $product->getCount(),
        "TongHoaDon" => $hoaDon->getCountHd(),
        "TongHoaDonChoXl" => $hoaDon->getCountHdChoXL(),
        "TongHoaDonDXl" => $hoaDon->getCountHdDXl(),
        "TongHoaDonDaXl" => $hoaDon->getCountHdDaXl(),
        "TongDThu" => $hoaDon ->getDThu(),
        "vipProfile" => $profile ->GetVipMember()
      ]);
    }
    function order()
    {
      $hoaDon = $this->models('hoadonmodels');

      $this->view('adminlayout',[
        "pageAdmin" => "order",
        "HoaDon"=>$hoaDon->getAllHoaDon()
      ]);
    }
    function product()
    {
      $product = $this->models('productmodel');

      $this->view('adminlayout',[
        "pageAdmin" => "sanpham",
        "allProduct" => $product->getallproduct(),
        "danMuc" => $product->getDanhMuc()
      ]);
    }
    function comment()
    {
      $review = $this->models('reviewshopmodel');

      $this->view('adminlayout',[
        "pageAdmin" => "binhluan",
        "review" => $review->getreviewall(),
      ]);
    }
}
?>