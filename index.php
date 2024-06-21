<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <img src="imagenes/login.png" alt="Imagen_Login" width="300px" />
        <form action="index.php" method="post">
            <input type="text" id="username" name="username" placeholder="Nombre de usuario" required><br>
            <input type="password" id="password" name="password" placeholder="Contraseña" required><br>
            <button type="submit" name="ingresar">Ingresar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <?php
    if (isset($_POST["ingresar"])) {
        include_once './modelo/Negocio.php';
        $obj = new Negocio();
        $cli = $obj->login($_POST["username"], $_POST["password"]);
        $stats = $obj->stats();
        if (empty($cli)) {
            echo "<script>
            Swal.fire({
                title: 'Error de sesión',
                text: 'Credenciales incorrectas',
                icon: 'error'
            });
            </script>";
        } else {
            sleep(0.5);
            session_start();
            $_SESSION["usuario"] = $cli;
            $_SESSION["stats"] = $stats;
            header("location: dashboard.php");
            echo "<h2>Sesion iniciada</h2>";
        }
    }
    ?>
</body>

</html>