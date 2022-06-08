<?php 
    $conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_start(); 
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];

    $sql = "INSERT INTO usuarios (email, pass, nombre, apellidos) VALUES ('$email', '$pass', '$nombre', '$apellidos')";
    mysqli_query($conn, $sql);

    header("Location: http://localhost/WEB/index.php");
?>