<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css" />
    <link href="css/ventana-modal.css" rel="stylesheet" type="text/css" />
    <link href="css/editmodal.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include_once './modelo/Negocio.php';
    session_start();
    $nombre = $_SESSION["usuario"][0];
    $obj = new Negocio();
    $vec = $obj->lisAlu();
    $stats = $obj->stats();
    $vecprofe = $obj->lisProfe();
    ?>
    <div class="sidebar">
        <h2 class="text-white text-center">Happy Faces</h2>
        <a href="#">Alumnos</a>
        <a href="#">Profesores</a>
        <a href="#">Aulas</a>
        <div class="summary">
            <div>Alumnos Matriculados: <?= $stats[0] ?></div>
            <div>Profesores registrados: <?= $stats[1] ?></div>
            <div>Aulas: <?= $stats[2] ?></div>
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
                        <img src="imagenes/login.png" width="50px" height="50px">
                    </li>
                    <li class="nav-item" >
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
                <input type="text" class="form-control mb-3" placeholder="Buscar" >
                <table id="tabla-alumnos" class="table table-hover">
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
                                <td>
                                    <a href="editdatos.php?id_alumno=<?= $d[0] ?>" class="edit-btn">
                                        <img src="imagenes/edit.png" width="50" height="50" id="editmodal" data-id="" onclick="procesoPHP(this)">
                                    </a>
                                </td>

                                <td><a href="control/input.php?action=delete&id_alumno=<?= $d[0] ?>">
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

            <!-- Body para los profesores   -->

            <div class="card-body profesores">
                <h5 class="card-title">Mantenimiento de Profesores</h5>
                <button class="btn btn-primary mb-2" name="button" id="button">Nuevo Registro</button>
                <input type="text" class="form-control mb-3" placeholder="Buscar">
                <table id="tabla-alumnos" class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>ID de profesor</th>
                            <th>DNI</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cuenta = 0;
                        foreach ($vecprofe as $d) {
                        ?>
                            <tr class="text-center">
                                <td><?= $d[0] ?></td>
                                <td><?= $d[1] ?></td>
                                <td><?= $d[2] ?></td>
                                <td><?= $d[3] ?></td>
                                <td>
                                    <a href="editdatos.php?id_alumno=<?= $d[0] ?>" class="edit-btn">
                                        <img src="imagenes/edit.png" width="50" height="50" id="editmodal" data-id="" onclick="procesoPHP(this)">
                                    </a>
                                </td>

                                <td><a href="control/input.php?action=delete&id_alumno=<?= $d[0] ?>">
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

    <div class="contenedor-modal" id="modelo">
        <div class="contenido-modal">
            <h2>Añadir Nuevo Registro</h2>
            <form action="control/input.php" method="post">
                <label for="dni" class="labelform">DNI:</label>
                <input type="text" id="dni" name="dni" required>
                <br>
                <label for="nombres" class="labelform">Nombres:</label>
                <input type="text" id="nombres" name="nombres" required>
                <br>
                <label for="apellidos" class="labelform">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" required>
                <br>
                <label for="aula" class="labelform">Aula:</label>
                <select class="form-control" name="id_aula" id="aula" required style="max-width: 200px; display: inline;">
                    <?php
                    $vector = $obj->lisAula();
                    foreach ($vector as $a) {
                    ?>
                        <option value="<?= $a[1] ?>"><?= $a[0] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <br>
                <br>
                <center>
                    <div class="boton-cerrar">
                        <button class="btn btn-primary" id="boton-guardar" name="boton-guardar">Guardar</button>
                    </div>
                </center>
            </form>
        </div>
    </div>
</body>

</html>