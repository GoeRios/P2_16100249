<?php 

require 'IniciarConexion.php';


session_start();


$Correo = $_POST['Correo'];
$Contraseña = $_POST['Contraseña'];
//$Contraseña = password_hash($_POST['Contraseña'],PASSWORD_DEFAULT);

$q = "SELECT COUNT(*) as contar from cliente where Correo ='$Correo' and Contraseña = '$Contraseña'";


$consultal = mysqli_query($conex,$q);
$array = mysqli_fetch_array($consultal);

if ($array['contar']>0) {
    $_SESSION['username'] = $Correo;
    $_SESSION ['Id'];
    header("location: Inicio.php");
}else {
    echo "<script> alert ('No se encontro una cuenta registrada a ese correo'); </script>";
	require 'Login.php';
}
    

?>