<?php
    $conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_start(); 
    
    $email = $_SESSION['email'];
    $nombreTablero = $_POST['NEWNAME'];

    $sql = "INSERT INTO tableros (usuarios_email, nombre) VALUES ('$email', '$nombreTablero')";
    mysqli_query($conn, $sql);

    header("Location: http://localhost/WEB/perfil.php");
?>