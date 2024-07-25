<?php
include('../modelo/Negocio.php');

//Boton guardar
if (isset($_POST["boton-guardar"])) {
    $objeto = new Negocio();
    $alumno = $objeto->addAlu($_POST["dni"], $_POST["nombres"], $_POST["apellidos"], $_POST["id_aula"], $_POST["matematica"], $_POST["lenguaje"], $_POST["edad"]);
    if (!$alumno) {
    } else {
        header("location: ../dashboard.php");
    }
    exit();
}

//Boton Eliminar

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id_alumno'])) {
    $id_alumno = $_GET['id_alumno'];
    $negocio = new Negocio();
    $resultado = $negocio->eliminarAlu($id_alumno);

    if (!$resultado) {
    } else {
        header("location: ../dashboard.php");
    }
}

//Boton Editar
if (isset($_POST["botoneditar"])){
    $objeto = new Negocio();
    $id_alumno = $_POST["id_alumno"];
    $dni = $_POST["dni"];
    $nombre = $_POST["nombres"];
    $apellido = $_POST["apellidos"];
    $aula = $_POST["id_aula"];
    $lenguaje = $_POST["lenguaje"];
    $mate = $_POST["matematica"];
    $edad = $_POST["edad"];

    $edit = $objeto->editarAlu($id_alumno, $dni, $nombre, $apellido, $aula, $lenguaje, $mate, $edad);
    if(!$edit){

    } else{
        header("location: ../dashboard.php");
    }
}

