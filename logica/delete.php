<?php 
    $conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_start(); 
    
    $idTablero = $_SESSION['idTablero'];
    $email = $_SESSION['email'];

    $sql = "DELETE FROM tareas WHERE tipo='basura' and usuarios_email='".$email."' and tableros_id='".$idTablero."'";
    mysqli_query($conn, $sql);

    header("Location: http://localhost/WEB/tablero.php?idTablero=".$idTablero);
?>