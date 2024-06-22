<?php
include_once 'Conexion.php';

class Negocio
{

    function login($user, $clave)
    {
        $sql = "select * from admin where username ='$user' and contra='$clave'";
        $obj = new Conexion();
        $res = mysqli_query($obj->conecta(), $sql) or
            die(mysqli_error($obj->conecta()));
        $vec = array();
        if (mysqli_num_rows($res) > 0) {
            $fila = mysqli_fetch_array($res);
            $vec = $fila;
        }
        return $vec;
    }

    function stats(){
        $sql = "call contar_registros()";
        $obj = new Conexion();
        $res = mysqli_query($obj->conecta(), $sql) or 
            die(mysqli_error($obj->conecta()));
        $vec = array();
        if (mysqli_num_rows($res) > 0){
            $fila = mysqli_fetch_array($res);
            $vec = $fila;
        }
        return $vec;
    }

    function lisAlu(){
        $sql = "select id_alumno, dni, nombres, apellidos, id_aula from alumno";
        $obj = new Conexion();
        $res = mysqli_query($obj->conecta(), $sql) or
            die(mysqli_error($obj->conecta()));
        $vec = array();
        while($fila = mysqli_fetch_array($res)){
            $vec[] = $fila;
        }
        return $vec;
    }

    function addAlu(){
        
    }
}
