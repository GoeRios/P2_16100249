<?php 

	require 'IniciarConexion.php';

	if (strlen($_POST['Nombre']) <= 1 || strlen($_POST['Apellido']) <= 1 || strlen($_POST['Correo']) <= 1 || strlen($_POST['Contraseña']) <= 1){
	echo "<script> alert ('No debe dejar espacios en blanco'); </script>";
	require 'Registro.php';
	}else {
		$Nombre= trim($_POST['Nombre']);
	    $Apellido= trim($_POST['Apellido']);
        $Correo = trim($_POST['Correo']);
        $Contraseña = trim($_POST['Contraseña']);
	    $consulta = "INSERT INTO cliente (Nombre,Apellido,Correo,Contraseña) VALUES ('$Nombre','$Apellido','$Correo','$Contraseña')";
	    $query = mysqli_query($conex,$consulta);
	    if ($query) {
			echo "<script> alert ('Se ha Registrado Correctamente'); </script>";

		}else{
			echo "<script> alert ('Error al Registrarse'); </script>";
		}
	}
	
	require 'Login.php'


?>