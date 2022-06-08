<?php 
    $conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_start(); 
    
    $idTablero = $_SESSION['idTablero'];
    $email = $_SESSION['email'];
    $nuevaTarea = $_COOKIE['nuevaTarea'];

    $sql = "INSERT INTO tareas (tableros_id, usuarios_email, tipo, descripcion) VALUES ('$idTablero', '$email', 'to-do', '$nuevaTarea')";
    mysqli_query($conn, $sql);

    header("Location: http://localhost/WEB/tablero.php?idTablero=".$idTablero);
?>

