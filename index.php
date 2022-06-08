<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio Sesión</title>
    <link rel="stylesheet" href="estilos/reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/bootstrap.bundle.min.js"></script>
    
    <link rel="shortcut icon" href="images/Icono_ToDO-v1.ico" type="image/x-icon">
</head>

<body style="background-image: url('images/17543-blancos.jpg');">
	<section class="h-100">
		<span class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="images/Icono_ToDO-v1.png" alt="logo" width="100">
						<h1>TASK-IT</h1>
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Iniciar Sesión</h1>
							<form method="POST" class="needs-validation" autocomplete="off" action="logica/login.php">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Correo electrónico</label>
									<input id="email" type="text" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										Correo electrónico no válido
									</div>
								</div>

								<div class="mb-3">
									<div class="mb-2 w-100">
										<label class="text-muted" for="password">Contraseña</label>
									</div>
									<input id="password" type="password" class="form-control" name="password" value="" required>
								    <div class="invalid-feedback">
								    	Contraseña requerida
							    	</div>
								</div>

								<div class="d-flex align-items-center">
									<button type="submit" class="btn btn-primary ms">
										Iniciar sesión 
									</button>
								</div>
								<?php 
								if(isset($_GET['mensaje'])){
									echo "<p>".$_GET['mensaje']."</p>";
								}
								?>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								¿No tienes cuenta? <a href="registro.php" class="text-dark">Crear una cuenta</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						©Trabajo realizado por Manuel Villegas y Juanjo López
					</div>
				</div>
			</div>
		</span>
	</section>

	<script src="js/login.js"></script>
</body>
</html>

</html>
