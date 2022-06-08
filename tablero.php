<?php 
$conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>To-Do List</title>
    <link rel="stylesheet" href="estilos/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="estilos/draganddropstyle.css">
    <link rel="stylesheet" href="estilos/propio.css">
    
    <link rel="shortcut icon" href="images/Icono_ToDO-v1.ico" type="image/x-icon">
    
    <!-- <script src="javascript/main.js"></script> -->

    <!-- #17232e -->


</head>

<body>


    <?php 
        $email = $_SESSION['email'];
        $idTablero = $_GET['idTablero'];
        $_SESSION['idTablero'] = $idTablero;
        $q = "SELECT * from tareas where usuarios_email ='".$email."' and tableros_id = '".$idTablero."'";
        $consulta = mysqli_query($conn, $q);
        $row = $consulta->fetch_array(MYSQLI_ASSOC);

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
                </form>
                <datalist id="listamodelos">
                <?php
                        $rsc = mysqli_query($conn, $tareasUsuario);
                        while ($tareas = mysqli_fetch_array($rsc,MYSQLI_BOTH)){?>
                            <option><?= $tareas[4] ?></option>
                    <?php } ?>
                </datalist>
                <a class="user-logo" href="http://localhost/WEB/perfil.php"><img class="user-logo" alt="..." height="35" src="images/pngegg.png" ></a>
            </div>
        </span>
    </nav>

    <section>
        <aside class="d-inline-block name-board">
            <p class="badge top text-wrap">
            <?php  
                $q = "SELECT * from tableros where id ='".$idTablero."'";
                $consulta = mysqli_query($conn, $q);
                $nameTablero = $consulta->fetch_array(MYSQLI_ASSOC);
                echo $nameTablero['nombre'];
                ?>
            </p>
            <button id="mostrar" class="button add-button " onclick="updateAll()">
                Guardar tablero
            </button>
        </aside>

        <article>
            <div class="add-task-container">
                <input type="text" maxlength="25" id="taskText" autofocus placeholder="Nueva tarea..." onkeydown="if (event.keyCode == 13)
                            document.getElementById('add').click()" />
                <button id="add" class="button add-button" onclick="addTask()">
                    Añadir tarea
                </button>
            </div>

            <div class="main-container row">
                <ul class="columns">
                    <li class="column to-do-column col">
                        <div class="column-header">
                            📝 To Do 📝
                        </div>
                        <ul class="task-list" id="to-do">

                                <?php  
                                $q = "SELECT * from tareas where usuarios_email ='".$email."' and tableros_id = '".$idTablero."' and tipo = 'to-do'";
                                $consulta = mysqli_query($conn, $q);
                                while ($tareas = mysqli_fetch_array($consulta,MYSQLI_BOTH)){?>
                                    <li class="task">
                                        <span style="display:none;"><?= $tareas[0] ?></span>
                                        <p><?= $tareas[4] ?></p>
                                    </li>
                                <?php } ?>

                            
                        </ul>
                    </li>

                    <li class="column doing-column col">
                        <div class="column-header">
                            🚧 En progreso 🚧
                        </div>
                        <ul class="task-list" id="doing">
                        <?php  
                                $q = "SELECT * from tareas where usuarios_email ='".$email."' and tableros_id = '".$idTablero."' and tipo = 'progreso'";
                                $consulta = mysqli_query($conn, $q);
                                while ($tareas = mysqli_fetch_array($consulta,MYSQLI_BOTH)){?>
                                    <li class="task">
                                        <span style="display:none;"><?= $tareas[0] ?></span>
                                        <p><?= $tareas[4] ?></p>
                                    </li>
                                <?php } ?>
                        </ul>
                    </li>

                    <li class="column done-column col">
                        <div class="column-header">
                            🎯 Finalizado 🎯
                        </div>
                        <ul class="task-list" id="done">
                        <?php  
                                $q = "SELECT * from tareas where usuarios_email ='".$email."' and tableros_id = '".$idTablero."' and tipo = 'finalizado'";
                                $consulta = mysqli_query($conn, $q);
                                while ($tareas = mysqli_fetch_array($consulta,MYSQLI_BOTH)){?>
                                    <li class="task">
                                        <span style="display:none;"><?= $tareas[0] ?></span>
                                        <p><?= $tareas[4] ?></p>
                                    </li>
                                <?php } ?>
                        </ul>
                    </li>

                    <li class="column trash-column col">
                        <div class="column-header">
                            🚮 Basura 🚮
                        </div>
                        <ul class="task-list" id="trash">
                        <?php  
                                $q = "SELECT * from tareas where usuarios_email ='".$email."' and tableros_id = '".$idTablero."' and tipo = 'basura'";
                                $consulta = mysqli_query($conn, $q);
                                while ($tareas = mysqli_fetch_array($consulta,MYSQLI_BOTH)){?>
                                    <li class="task">
                                        <span style="display:none;"><?= $tareas[0] ?></span>
                                        <p><?= $tareas[4] ?></p>
                                    </li>
                                <?php } ?>
                        </ul>
                        <div class="column-button">
                            <button class="button delete-button" onclick="emptyTrash()">
                                Borrar
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
            
        </article>
    </section>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js"></script>
    <script src="javascript/drag-drop.js"></script>


</body>

</html>