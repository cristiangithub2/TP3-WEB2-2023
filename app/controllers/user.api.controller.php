<?php
require_once 'app/controllers/api.controller.php';
require_once 'app/models/UsuariosModel.php';
require_once 'app/helpers/auth.api.helper.php';

class UserApiController extends ApiController{
    private $model;
    private $authHelper;

    function __construct(){
        parent::__construct();
        $this->authHelper = new AuthHelper();
        $this->model = new UsuariosModel();
    }

    function getToken($params = []) {
        $basic = $this->authHelper->getAuthHeaders();
    
        if(empty($basic)){
            $this->vista->response('No envio encabezado de autenticacion.', 401);
        }

        $basic = explode(' ', $basic);

        if($basic[0]!='Basic'){
            $this->vista->response('Los encabezados de autenticacion son incorrectos.', 401);
            return;
        }
        $userpass = base64_decode($basic[1]);
        $userpass = explode(':', $userpass);

        $user = $userpass[0];
        $pass = $userpass[1];
        $userdata = [ 'name' => $user, 'id' => 123, 'role' => 'user' ]; 

        if($user == 'user' && $pass== 'web'){
            $token = $this->authHelper->createToken($userdata);
            $this->vista->response($token, '');
        }else{
            $this->vista->response('El usuario o constraseña son incorrectos.', 401);
        }
    }
}