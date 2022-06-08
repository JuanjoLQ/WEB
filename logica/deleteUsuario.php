<?php 
    $conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_start(); 
    
    $email = $_SESSION['email'];

    $sql = "DELETE FROM tareas WHERE usuarios_email='".$email."'";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tableros WHERE usuarios_email='".$email."'";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM usuarios WHERE email='".$email."'";
    mysqli_query($conn, $sql);

    header("Location: http://localhost/WEB/index.php");
?>
