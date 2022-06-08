<?php
	$conn = mysqli_connect('localhost','root','','tareaweb') or die(mysqli_erro($mysqli));
    session_destroy();
    header("location: http://localhost/WEB/index.php");
?>