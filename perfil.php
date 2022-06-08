<?php 
$conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Perfil</title>
    <link rel="stylesheet" href="estilos/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estilos/draganddropstyle.css">
    <link rel="stylesheet" href="estilos/propio.css">
    
    <link rel="shortcut icon" href="images/Icono_ToDO-v1.ico" type="image/x-icon">


</head>

<body>
    
    <?php 
        $email = $_SESSION['email'];
        $q = "SELECT * from usuarios where email ='".$email."'";
        $consulta = mysqli_query($conn, $q);
        $row = $consulta->fetch_array(MYSQLI_ASSOC);
        //echo $row['email'];
        $tablerosUsuario = "SELECT * from tableros where usuarios_email ='".$email."'";

        $tareasUsuario = "SELECT * from tareas where usuarios_email ='".$email."'";
        
    ?>
    <nav class="navbar navbar-expand-md navbar-dark top" aria-label="Sixth navbar example">
        <span class="container-fluid">
            <canvas id="canvas" width="40" height="35"></canvas>

            <script>
                const canvas = document.getElementById('canvas');
                const ctx = canvas.getContext('2d');

                const image = new Image(40, 35);
                image.onload = drawImageActualSize;
                image.src = 'images/Icono_ToDO-v1.ico';

                function drawImageActualSize() {
                ctx.drawImage(this, 0, 0, this.width, this.height);
                }

            </script>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample06"
                aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample06">
                <ul class="navbar-nav me-auto mb-2 mb-xl-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" disabled>Task-It!</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Tableros
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <?php
                            $consulta = mysqli_query($conn, $tablerosUsuario);
                            while ($tablero = mysqli_fetch_array($consulta,MYSQLI_BOTH)){?>
                                <li><a class="dropdown-item" href="tablero.php?idTablero=<?= $tablero[0] ?>"><?= $tablero[2] ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>

                <form action="logica/buscarTarea.php" class="align-self-center" method="post">
                <span>
                    <input class="align-self-center" type="search" name="NOMBRETAREA" list="listamodelos">
                    <input class="align-self-center" type="submit" value="Buscar">
                </span>
                <datalist id="listamodelos">
                <?php
                        $rsc = mysqli_query($conn, $tareasUsuario);
                        while ($tareas = mysqli_fetch_array($rsc,MYSQLI_BOTH)){?>
                            <option><?= $tareas[4] ?></option>
                    <?php } ?>
                </datalist>
                </form>

                <a class="user-logo" href="http://localhost/WEB/perfil.php"><img class="user-logo" alt="..." height="35" src="images/pngegg.png" ></a>
            </div>
        </span>
    </nav>

    <br><br>
    <div class="container bootstrap snippets bootdey">
        <h1 class="text-black">Bienvenido <?php echo $row['nombre'] ?></h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center bg-white bg-opacity-75 p-3 rounded">
                    <h1 class="text-black">Tableros</h1>
                    <hr>
                    <form action="logica/deleteTablero.php" method="post">
                        <select name="DELETENAME">
                            <?php
                                $rsc = mysqli_query($conn, $tablerosUsuario);
                                while ($tablero = mysqli_fetch_array($rsc,MYSQLI_BOTH)){?>
                                    <option value="<?= $tablero[2] ?>"><?= $tablero[2] ?></option>
                            <?php } ?>
                        </select>
                        <input type ="submit" value ="Eliminar">
                    </form>
                    <br>
                    <form action="logica/insertTablero.php" method="post">
                        <span class="text-center">Nombre del tablero: <input type="text" name="NEWNAME" ></span>
                        <br>
                        <input class="pb-1 mt-2" type ="submit" value ="Crear">
                    </form>
                </div>
                
                

            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                <h1 class="text-black">Información Personal</h1>
                <form class="form-horizontal" role="form" action="logica/updateUsuario.php" method="post">
                <div class="form-group">
                        <label class="col-lg-5 control-label">Correo electrónico:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" readonly="readonly" value="<?php echo $row['email'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-5 control-label">Nombre:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="nombre" value="<?php echo $row['nombre'] ?>">
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-5 control-label">Apellidos:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="text" name="apellidos" value="<?php echo $row['apellidos'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-5 control-label">Nueva contraseña:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="password" name="pass" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-5 control-label">Repetir nueva contraseña:</label>
                        <div class="col-lg-8">
                            <input class="form-control" type="password" name="confirmPass" value="">
                        </div>
                    </div>
                    <?php 
                        if(isset($_GET['mensaje'])){
                            echo "<p>".$_GET['mensaje']."</p>";
                        }
                        ?>
                    <br>
                    <div class="form-group">
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-primary ms">
                                Actualizar	
                            </button>
                        </div>
                    </div>
                </form>
                <br>
                <a href="http://localhost/WEB/logica/logout.php"><button type="button" class="btn btn-danger btn-rounded">Cerrar sesión</button></a>
                <a onclick="clicked(event)" href="http://localhost/WEB/logica/deleteUsuario.php"><button type="button" class="btn btn-danger btn-rounded">Borrar Usuario</button></a>
            </div>
        </div>
    </div>

    <script>
        function clicked(e)
        {
            if(!confirm('¿Seguro que quieres eliminar la cuenta?')) {
                e.preventDefault();
            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js"></script>
    <script src="javascript/drag-drop.js"></script>
</body>

</html>