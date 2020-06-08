<?php

  
  session_start();
  $Correo = $_SESSION ['username'];
  include 'IniciarConexion.php';
  if (isset($_SESSION['Carrito'])) {
	  if ($_GET['IdComida']) {
	  $arreglo =$_SESSION['Carrito'];
	  $existe=false;
	  $numero=0;
	  for ($i=0; $i < count($arreglo) ; $i++) { 
		  if ($arreglo[$i]['IdComida']==$_GET['IdComida']) {
			  $existe=true;
			  $numero=$i;
		  }
	  }
	  if ($existe==true) {
		  $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
	      $_SESSION['Carrito']=$arreglo;
		
	  }else {
		$nombre="";
		$Descripcion="";
		$precio=0;
		$imagen="";
		$re=mysqli_query($conex,"Select * from comida where IdComida=".$_GET['IdComida']);
		while ($f=mysqli_fetch_array($re)) {
			$nombre=$f['Nombre'];
			$Descripcion=$f['Descripcion'];
			$precio=$f['Precio'];
			$imagen=$f['Imagen'];
		}
		$datosnuevos=array('IdComida'=>$_GET['IdComida'],
						 'Nombre'=>$nombre,
						 'Descripcion'=>$Descripcion,
						 'Precio'=>$precio,
						 'Imagen'=>$imagen,
						 'Cantidad'=>1);
		array_push($arreglo,$datosnuevos);
		$_SESSION['Carrito']=$arreglo;
		  
	  }
	}
  }else {
	  if (isset($_GET['IdComida'])) {
		  $nombre="";
		  $Descripcion="";
		  $precio=0;
		  $imagen="";
		  $re=mysqli_query($conex,"Select * from comida where IdComida=".$_GET['IdComida']);
		  while ($f=mysqli_fetch_array($re) ) {
			  $nombre=$f['Nombre'];
			  $Descripcion=$f['Descripcion'];
			  $precio=$f['Precio'];
			  $imagen=$f['Imagen'];
		  }
		  $arreglo[]=array('IdComida'=>$_GET['IdComida'],
						   'Nombre'=>$nombre,
						   'Descripcion'=>$Descripcion,
						   'Precio'=>$precio,
						   'Imagen'=>$imagen,
						   'Cantidad'=>1);

			$_SESSION['Carrito']=$arreglo;			   
		  					
	  }
  }
 
  



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<title>Menu </title>
	<link rel="stylesheet" href="EstiloMenu.css">


	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js"></script>
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
                    <a class="nav-link " href="Pago.php" >Pagar</a>
					</li>
				</ul>

			</div>

			<div class="collapse navbar-collapse">
			
				<?php  
					
					echo "<p>Bienvenido $Correo</p>";
				?>
			</div>
			<div class="boton"><a href="CerrarSesion.php"><p>Cerrar Sesion</p></a></div>
		</nav>
	</header>

	<section>
		
		<?php
		$total=0;
		if (isset($_SESSION['Carrito'])) {
			$datos=$_SESSION['Carrito'];

			$total=0;
			for ($i=0; $i <count($datos) ; $i++) { 
		?>
		
			<div class="producto">
			<center>
			<img src="./productos/<?php echo $datos[$i]['Imagen'];?>"><br>
			<span><?php echo $datos[$i]['Nombre'];?></span><br>
			<span>Precio:<?php echo $datos[$i]['Precio'];?></span><br>
			<span>Cantidad:<input type="text" disabled value="<?php echo $datos[$i]['Cantidad'];?>"></span><br>
			<span>Subtotal: <?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
			</center>
			</div>
		<?php	

			$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
			}
		}else {
			echo '<center><h2>No hay nada en la orden </h2></center><br>';
		}
		echo '<center><h2> Total: '.$total.'</h2></center>'
		 
		
		?>
		<form action="RealizarOrden.php" method="POST">
		<center><input type="text" id="Direccion" class="fadeIn second" name="Direccion" placeholder="Dirreccion"></center>
		<center><div class="boton" id="Orden"><a href="RealizarOrden.php"><p>Finalizar Orden</p></a></div></center>

		</form>
           
	</section>



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>