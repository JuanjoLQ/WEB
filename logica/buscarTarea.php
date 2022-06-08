<?php 
    $conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_start(); 
    
    
    $email = $_SESSION['email'];
    $nombreTarea = $_POST['NOMBRETAREA'];
    $idTablero = $_SESSION['idTablero'];

    $sql = "SELECT * FROM tareas where usuarios_email='".$email."' and descripcion='".$nombreTarea."'";
    $consulta = mysqli_query($conn, $sql);

    if(mysqli_num_rows($consulta) > 0){
        $row = $consulta->fetch_array(MYSQLI_ASSOC);
        $idTablero = $row['tableros_id'];
        header("Location: http://localhost/WEB/tablero.php?idTablero=".$idTablero);
    }else{
        header("location: ../perfil.php");
    }
?>