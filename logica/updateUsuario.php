<?php 
    $conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_start(); 
    
    $email = $_SESSION['email'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    
    if(isset($_POST['pass']) && isset($_POST['confirmPass'])){
        $confirmPass = $_POST['confirmPass'];
        $pass = $_POST['pass'];
        if($confirmPass == $pass){
            $sql = "UPDATE usuarios SET nombre='".$nombre."', apellidos='".$apellidos."', pass='".$pass."'  WHERE email='".$email."'";
            mysqli_query($conn, $sql);
            header("Location: http://localhost/WEB/perfil.php");
        }
        else{
            $mensaje = 'Las contraseñas no coinciden';
            header("Location: http://localhost/WEB/perfil.php?mensaje=".($mensaje));
        }
    }
    else{
        $sql = "UPDATE usuarios SET nombre='".$nombre."', apellidos='".$apellidos."'  WHERE email='".$email."'";
        mysqli_query($conn, $sql);
        header("Location: http://localhost/WEB/perfil.php");
    }
    
?>



