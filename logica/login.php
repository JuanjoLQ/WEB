<?php
	$conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_destroy();
	session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $q = " SELECT * from usuarios where email = '$email' and pass = '$password' ";
    $consulta = mysqli_query($conn, $q);

    if(mysqli_num_rows($consulta) > 0){
        $row = $consulta->fetch_array(MYSQLI_ASSOC);
        $_SESSION['email'] = $row['email'];
        header("location: ../perfil.php");
    }else{
        $mensaje = 'DATOS INCORRECTOS';
        header("location: ../index.php?mensaje=".($mensaje));
    }

?>