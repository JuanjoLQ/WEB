<?php 
    $conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_start(); 
    
    $email = $_SESSION['email'];
    $nombreTablero = $_POST['DELETENAME'];

    //echo "email: ".$email." tablero: ".$nombreTablero;

    $q = "SELECT * FROM tableros where usuarios_email='".$email."' and nombre='".$nombreTablero."'";
    $consulta = mysqli_query($conn, $q);
    $row = $consulta->fetch_array(MYSQLI_ASSOC);
    
    $sql = "DELETE FROM tareas WHERE usuarios_email='".$email."' and tableros_id='".$row['id']."'";
    mysqli_query($conn, $sql);

    $sql = "DELETE FROM tableros WHERE id='".$row['id']."'";
    mysqli_query($conn, $sql);

    header("Location: http://localhost/WEB/perfil.php");
?>
