<?php 
    $conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_start(); 
    $idTablero = $_SESSION['idTablero'];
    $texto = $_COOKIE['texto'];     
    $arrayTipos = explode("¬", $texto);
    for($i = 0; $i < sizeof($arrayTipos); $i++){
        $arrayTareas = explode("//", $arrayTipos[$i]);
        foreach($arrayTareas as $partesTareas){
            switch ($i) {
                case 0:
                    echo "$partesTareas ";
                    $sql = "UPDATE tareas SET tipo='to-do' WHERE id='".$partesTareas."'";
                    mysqli_query($conn, $sql);
                    break;
                case 1:
                    echo "$partesTareas ";
                    $sql = "UPDATE tareas SET tipo='progreso' WHERE id='".$partesTareas."'";
                    mysqli_query($conn, $sql);
                    break;
                case 2:
                    echo "$partesTareas ";
                    $sql = "UPDATE tareas SET tipo='finalizado' WHERE id='".$partesTareas."'";
                    mysqli_query($conn, $sql);
                    
                    break;
                case 3:
                    echo "$partesTareas ";
                    $sql = "UPDATE tareas SET tipo='basura' WHERE id='".$partesTareas."'";
                    mysqli_query($conn, $sql);
                    break;
            }
        }
    }
    header("Location: http://localhost/WEB/tablero.php?idTablero=".$idTablero);
?>