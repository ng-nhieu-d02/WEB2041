<?php 
class controllers{
    public function models($models){
        require_once "./mvc/models/".$models.".php";
        return new $models;
    }
    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }
}
?>