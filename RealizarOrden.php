
<?php
session_start();
require 'IniciarConexion.php';

if (isset($_SESSION['Carrito'])) {
    $correo = $_SESSION['username'];
    $datos = $_SESSION['Carrito'];
    
                   
        for ($i = 0; $i < count($datos); $i++) {
            $id = $datos[$i]['IdComida'];
            $cant = $datos[$i]['Cantidad'];
            $subtotal = $datos[$i]['Cantidad']*$datos[$i]['Precio'];
            $estado = "Pendiente";
            $consulta = "INSERT INTO pedido (IdComida,Cantidad,SubTotal,EstadoPedido) VALUES ('$id','$cant','$subtotal','$estado')";
            $insertarpedido=mysqli_query($conex,$consulta);
            if ($insertarpedido) {
                echo "<script> alert ('Se ha Registrado Correctamente'); </script>";
    
            }else{
                echo "<script> alert ('Error al insertar'); </script>";
            }
        }
        $conscliente = "Select IdCliente from cliente where Correo=".$correo;
        $cliente = mysqli_query($conex, $conscliente);
        if ($cliente) {
            echo "<script> alert ('.$correo'); </script>";

        }else{

            
            echo "<script> alert ('.$cliente'); </script>";
        }
    
        $conspedido = "select * from pedido where EstadoPedido='Pendiente'";
        $pedidos = mysqli_query($conex, $conspedido);
        $Direccion="Morelos 5915";
        while($a=mysqli_fetch_array($pedidos)){
        $idpedido = $a['IdPedido'];
        $insorden = "INSERT INTO orden (IdCliente,IdPedido,DicOrden) VALUES ($cliente,$idpedido,$Direccion)";
         $insertarorden=mysqli_query($conex,$insorden);
        if ($insertarorden) {
                echo "<script> alert ('Se ha Registrado Correctamente'); </script>";
    
            }else{

                
                echo "<script> alert ('.$cliente.$idpedido.$Direccion'); </script>";
            }
        }
        
        require 'Inicio.php';
    }
 else {
    echo "<script> alert ('No hay nada que ordenar'); </script>";
    require 'Menu.php';
}


?>
	