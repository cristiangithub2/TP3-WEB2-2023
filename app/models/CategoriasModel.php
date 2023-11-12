<?php

 require_once "./view/CategoriasView.php";



class CategoriasModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=recetario;charset=utf8','root','');
    }

    function traerCategoriasDeDB(){
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        $categorias=$sentencia->fetchAll(PDO::FETCH_OBJ);
        return  $categorias;
    }
    function traerCategoria($id){
        $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE categoria_id= ?");
        $sentencia->execute(array($id));
        $categoria= $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }

    function traerCategoriaDePlato($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE categoria_id = ?");
        $sentencia->execute(array($id));
        $categoria = $sentencia->fetch(PDO::FETCH_OBJ);
        return $categoria;
    }
    function insertarCategoriaEnDB($categoria, $descripcion)
    {
        $sentencia = $this->db->prepare("INSERT INTO categoria (categoria,descripcion) VALUES (?, ?)");
        $sentencia->execute(array($categoria, $descripcion));
    }
    function editarCategoriaDB($id, $categoria, $descripcion)
    {
        $sentencia = $this->db->prepare("UPDATE categoria SET categoria=?, descripcion=? WHERE categoria_id=?");
        $sentencia->execute(array($categoria, $descripcion, $id));
    }
    function borrarCategoriaDeDB($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE categoria_id =?");
        $sentencia->execute(array($id));
    }
}