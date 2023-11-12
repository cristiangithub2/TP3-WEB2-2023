<?php
require_once 'app/controllers/api.controller.php';
require_once 'app/models/PlatosModel.php';
require_once 'app/helpers/auth.api.helper.php';
class TaskApiController extends ApiController{
    private $model;
    private $authHelper;

    function __construct(){
        parent::__construct();
        $this->model = new PlatosModel();
        $this->authHelper = new AuthHelper();
    }

    function get($params = []) {
        $user = $this->authHelper->currentUser();
        if(!$user){
            $this->vista->response('Unauthorizated', 401);
            return;
        }
               

        if (empty($params)) {
            $tareas = $this->model->traerPlatosDeDB();
            $this->vista->response($tareas, 200);
        } else {
            $tarea = $this->model->traerPlato($params[":ID"]);
    
            if (!empty($tarea)) {
                if (isset($params[':subrecurso'])) {
                    switch ($params[':subrecurso']) {
                        case 'nombre_plato':
                            $this->vista->response($tarea->nombre_plato, 200);
                            break;
                        case 'ingredientes':
                            $this->vista->response($tarea->ingredientes, 200);
                            break;
                        default:
                            $this->vista->response(
                                'La tarea no contiene ' . $params[":subrecurso"] . '.',
                                404
                            );
                    }
                } else {
                    $this->vista->response($tarea, 200);
                }
            } else {
                $this->vista->response(['msg' => 'La tarea con el id=' . $params[":ID"] . ' no existe.'], 404);
            }
        }
    }
    public function delete($params = []) {
        $tarea_id = $params[':ID'];
        $tarea = $this->model->traerPlato($tarea_id);

        if ($tarea) {
            $this->model->borrarPlatoDeDB($tarea_id);
            $this->vista->response("Tarea id=$tarea_id eliminada con éxito", 200);
        }
        else 
            $this->vista->response("Task id=$tarea_id not found", 404);
        }

        function crearTarea($params = []){
            $body = $this->getData();

            $nombre_plato = $body->nombre_plato;
            $ingredientes= $body->ingredientes;
            $tiempo_coccion = $body->tiempo_coccion;
            $origen = $body->origen;
            $precio = $body->precio;
            $categoria_id = $body->categoria_id;

            $id = $this->model->insertarPlatoEnDB($nombre_plato, $ingredientes, $tiempo_coccion, $origen, $precio, $categoria_id);
            
            $this -> vista -> response('La tarea fue insertada con el id=' . $id, 201);

        }
        function update($params = []){
            $tarea_id = $params[':ID'];
            $tarea = $this->model->traerPlato($tarea_id);
    
            if ($tarea) {
                $body = $this->getData();

                $nombre_plato = $body->nombre_plato;
                $ingredientes= $body->ingredientes;
                $tiempo_coccion = $body->tiempo_coccion;
                $origen = $body->origen;
                $precio = $body->precio;
                $categoria_id = $body->categoria_id;
                $id= $body-> id;
                $this->model->editarPlatoDB($nombre_plato, $ingredientes, $tiempo_coccion, $origen, $precio, $categoria_id, $id);
                $this->vista->response("Tarea id=$tarea_id ha sido modificada", 200);
            }
            else 
                $this->vista->response("Tarea id=$tarea_id no existe", 404);
            }
        
}