<?php


session_start();
$Correo = $_SESSION ['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<title>Principal</title>
	<link rel="stylesheet" href="EstiloMenu.css">


	
</head>

<body>

	
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand"><img src="logitobarra.jpg" height="50" width="50">AppFood</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="Inicio.php">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Menu.php">Menu</a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="Pago.php" >Pagar</a>
					</li>
				</ul>

			</div>
			<div class="collapse navbar-collapse">
			
				<?php  
					
					if (!isset($Correo)) {
						header("location: Login.php");
					}
					else {
						echo "<p>Bienvenido $Correo</p>";
					}
					   
					
				?>
			</div>
			
			
			<div class="boton">
				<a href="CerrarSesion.php"><p>Cerrar Sesion</p></a>
			</div>
		</nav>
	</header>
	
	<center><h1>Bienvenido a AppFood</h1></center>
	<div class="Bienvenido" >
		
		<img src="bienvenida.jpg" height="600" width="1200">
	</div>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>