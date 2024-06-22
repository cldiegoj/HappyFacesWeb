<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <script src="js/modal.js"></script>
</head>

<body>
    <?php
    include_once './modelo/Negocio.php';
    session_start();
    $nombre = $_SESSION["usuario"][0];
    $alumnos =  $_SESSION["stats"][0];
    $profesores =  $_SESSION["stats"][1];
    $aulas =  $_SESSION["stats"][2];
    $obj = new Negocio();
    $vec = $obj->lisAlu();
    ?>
    <div class="sidebar">
        <h2 class="text-white text-center">Happy Faces</h2>
        <a href="#">Alumnos</a>
        <a href="#">Profesores</a>
        <a href="#">Aulas</a>
        <div class="summary">
            <div>Alumnos Matriculados: <?= $alumnos ?></div>
            <div>Profesores registrados: <?= $profesores ?></div>
            <div>Aulas: <?= $aulas ?></div>
        </div>
    </div>
    <div class="content">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">Mantenimiento / Alumnos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-envelope"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-bell"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= $nombre ?></a>
                    </li>
                </ul>
            </div>
        </nav>
        <h3>Alumnos</h3>
        <p>Desde esta ventana podrá dar mantenimiento a registros de los alumnos</p>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mantenimiento de Alumnos</h5>
                <button class="btn btn-primary mb-2" name="button" id="button">Nuevo Registro</button>
                <input type="text" class="form-control mb-3" placeholder="Buscar">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>ID de alumnos</th>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Salon</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cuenta = 0;
                        foreach ($vec as $d) {
                        ?>
                            <tr class="text-center">
                                <td><?= $d[0] ?></td>
                                <td><?= $d[1] ?></td>
                                <td><?= $d[2] ?></td>
                                <td><?= $d[3] ?></td>
                                <td><?= $d[4] ?></td>
                                <td><a href="">
                                        <img src="imagenes/edit.png" width="50" height="50">
                                    </a></td>
                                <td><a href="">
                                        <img src="imagenes/eliminar.png" width="50" height="50">
                                    </a>
                                </td>
                            <?php
                            $cuenta++;
                        }
                            ?>
                            </tr>
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-secondary">Anterior</button>
                    <button class="btn btn-secondary">Siguiente</button>
                </div>
            </div>
        </div>


        
    </div>

    <div class="contenedor-modal">
            <div class="contenido-modal">
                <h2>¡Bienvenido!</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus fugiat laboriosam alias officiis nemo libero facilis velit vel amet maiores itaque rerum sint obcaecati ullam vitae eligendi, aspernatur quo consequatur.</p>
                <div class="boton-cerrar">
                        <label for="boton-modal">Cerrar</label>
                </div>
            </div>

        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>