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

    function addAlu($dni, $nombre, $apellido, $aula)
    {
        $sql = "CALL InsertAlumno('$dni','$nombre','$apellido','$aula')";
        $obj = new Conexion();
        $conn = $obj->conecta();
        $res = mysqli_query($conn, $sql);

        return $res;
    }

    function lisAula(){
        $sql = "select nombre, id_aula from aula";
        $obj = new Conexion();
        $res = mysqli_query($obj->conecta(), $sql) or
        die(mysqli_error($obj->conecta()));
        $vec = array();
        while($fila = mysqli_fetch_array($res)){
            $vec[] = $fila;
        }
        return $vec;
    }

    function eliminarAlu($id_alumno){
        $sql = "delete from alumno where id_alumno = '$id_alumno'";
        $obj = new Conexion();
        $con = $obj->conecta();
        $res = mysqli_query($con,$sql);
        return $res;
    }

    function editarAlu($id_alumno, $dni, $nombre, $apellido, $aula){
        $sql = "update alumno SET dni = '$dni', nombres = '$nombre', apellidos = '$apellido', id_aula = '$aula' where id_alumno = '$id_alumno' ";
        $obj = new Conexion();
        $con = $obj->conecta();
        $res = mysqli_query($con, $sql);
        return $res;
    }

    function buscarAlu($id_alumno){
        $sql = "select * from alumno where id_alumno ='$id_alumno'";
        $obj = new Conexion();
        $res = mysqli_query($obj->conecta(), $sql) or
        die(mysqli_error($obj->conecta()));
        $vec = array();
        while($fila = mysqli_fetch_array($res)){
            $vec[] = $fila;
        }
        return $vec;
    }

    function lisProfe(){
        $sql = "select * from profesor";
        $obj = new Conexion();
        $res = mysqli_query($obj->conecta(), $sql) or
            die(mysqli_error($obj->conecta()));
        $vec = array();
        while($fila = mysqli_fetch_array($res)){
            $vec[] = $fila;
        }
        return $vec;
    }
}
