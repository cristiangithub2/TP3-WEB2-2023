<?php
require_once 'app/models/model.php';

class UsuariosModel extends Model{
  
    function traerUsuarioDeEmail($email)
    {
        $sentencia = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $sentencia->execute([$email]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
        
    }



}