<?php
require_once 'app/config.php';
require_once 'libs/Router.php';
require_once 'app/controllers/task.api.controller.php';
require_once 'app/controllers/user.api.controller.php';
$router = new Router();

$router->addRoute('tareas', 'GET', 'TaskApiController', 'get');
$router->addRoute('tareas', 'POST', 'TaskApiController', 'crearTarea');
$router->addRoute('tareas/:ID', 'GET', 'TaskApiController', 'get');
$router->addRoute('tareas/:ID', 'PUT', 'TaskApiController', 'update');
$router->addRoute('tareas/:ID', 'DELETE', 'TaskApiController', 'delete');
$router->addRoute('tareas/:ID/subrecurso', 'GET', 'TaskApiController', 'get');
$router->addRoute('user/token', 'GET', 'UserApiController', 'getToken');

$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);