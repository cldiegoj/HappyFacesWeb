<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/editar.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php
    include_once './modelo/Negocio.php';
    $obj = new Negocio();
    $id = $_GET["id_alumno"];
    $vec = $obj->buscarAlu($id);
    ?>
    <div class="edit" id="editmodel">
        <div class="contenidomodaledit">
            <h2>Actualizar registro</h2>
            <form action="control/input.php" method="post">
                <input type="hidden" name="id_alumno" value="<?= $id ?>">
                <?php
                foreach ($vec as $d) {
                ?>
                    <label for="dni" class="labelform">DNI:</label>
                    <input type="text" id="dni" name="dni" value="<?= $d[1] ?>" required>
                    <br>
                    <label for="nombres" class="labelform">Nombres:</label>
                    <input type="text" id="nombres" name="nombres" value="<?= $d[2] ?>" required>
                    <br>
                    <label for="apellidos" class="labelform">Apellidos:</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?= $d[3] ?>" required>
                    <br>
                    <label for="aula" class="labelform">Aula:</label>
                    <select class="form-control" name="id_aula" id="aula" required style=" display: inline;">
                        <?php
                        $vector = $obj->lisAula();
                        foreach ($vector as $a) {
                            $selected = ($a[1] == $d[4]) ? 'selected' : '';
                        ?>
                            <option value="<?= $a[1] ?>" <?= $selected ?>><?= $a[0] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                <?php
                }
                ?>
                <br>
                <br>
                <label for="cali-mate"class="labelform">Calificación Matematica</label>
                <input type="number" id="matematica" name="matematica" value="<?=$d[5]?>" required>
                <br>
                <label for="cali-leng"class="labelform">Calificación Lenguaje</label>
                <input type="number" id="lenguaje" name="lenguaje" value="<?=$d[6]?>" required>
                <br>
                <label for="edad" class="labelform">Edad</label>
                <input type="number" id="edad"name="edad" value="<?=$d[7    ]?>" required>
                <center>
                    <div class="boton-cerrar">
                        <button class="btn btn-primary" id="botoneditar" name="botoneditar">Guardar</button>
                    </div>
                </center>
            </form>
        </div>
    </div>
</body>

</html>