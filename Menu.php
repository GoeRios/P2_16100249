<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<title>Menu </title>
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
						<a class="nav-link" href="Inicio.php">Inicio<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Menu.php">Menu</a>
					</li>

					<li class="nav-item">
					<a class="nav-link " href="Pago.php" >Pagar<span class="sr-only"></span></a>
					</li>
				</ul>

			</div>


			<div class="collapse navbar-collapse">
			
				<?php  
					session_start();
					$Correo = $_SESSION ['username'];
					   
					echo "<p>Bienvenido $Correo</p>";
					
				?>
			</div>
			<div class="boton"><a href="CerrarSesion.php">  <p>Cerrar Sesion</p></a></div>
		</nav>


		<section>
		<?php
		include 'IniciarConexion.php';
		$consulta="select * from comida ";#where IdComida=".$_GET['IdComida'];
		$re=mysqli_query($conex,$consulta);
		while ($f=mysqli_fetch_array($re)) {
		?>


			<form   class="producto">
			<center>
				<img src="./productos/<?php echo $f['Imagen'];?>"><br>
				<span><h4><?php echo $f['Nombre'];?></h4></span><br>
				</center>
				<span><?php echo "Descipcion: ",$f['Descripcion'];?></span><br>
				<span><?php echo "Precio: $",$f['Precio'];?></span><br><br>
				<center><a  href="Pago.php?IdComida=<?php echo $f['IdComida'];?>" class="boton" >Agregar al Carrito</a></center>
			


		    </form>
	    <?php
	    }
	    ?>
		
		</section>
	</header>





	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>