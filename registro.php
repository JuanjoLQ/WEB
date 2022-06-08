<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>Bootstrap 5 Login Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body style="background-image: url('images/17543-blancos.jpg');">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="images/Icono_ToDO-v1.png" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-3">Registro</h1>
							<form method="POST" class="needs-validation" autocomplete="off" action="logica/insertUsuario.php">

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Correo electrónico</label>
									<input id="email" type="email" class="form-control" name="email" value="" required />
									<div class="invalid-feedback">
										Correo electrónico no válido
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Contraseña</label>
									<input id="password" type="password" class="form-control" name="pass" required />
								    <div class="invalid-feedback">
								    	Contraseña requerida
							    	</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="nombre">Nombre</label>
									<input id="nombre" type="text" class="form-control" name="nombre" required />
								    <div class="invalid-feedback">
								    	Nombre requerido
							    	</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="apellidos">Apellidos</label>
									<input id="apellidos" type="text" class="form-control" name="apellidos" required />
								    <div class="invalid-feedback">
										Apellidos requeridos
							    	</div>
								</div>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms">
										Registrarse	
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
								¿Ya tienes una cuenta? <a href="index.php" class="text-dark">Iniciar sesión</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						©Trabajo realizado por Manuel Villegas y Juanjo López
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
