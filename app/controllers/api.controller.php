<?php
require_once 'app/view/api.view.php';
abstract class ApiController{
    protected $vista;
    private $data;

    function __construct(){
        $this->vista = new APIView();
        $this->data= file_get_contents("php://input");
    }

    function getData(){
        return json_decode($this->data);
    }
}