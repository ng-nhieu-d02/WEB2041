<?php 
class App{
    protected $controller="index";
    protected $action="Home";
    protected $params=[];

    function __construct()
    {
        $arr = $this->UrlProcess();

        // xử lí controllers
        if( file_exists("./mvc/controllers/".$arr[0].".php") ){
            $this->controller = $arr[0];
            // unset($arr[0]);
        }
        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // xử lí action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        // xử lí params
        $this->params = $arr?array_values($arr):[];

        // tạo biến có funtion tham số params
        call_user_func_array([$this->controller, $this->action], $this->params );
    }
    
    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>