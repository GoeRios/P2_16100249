# ¿Que son las cookies, las session y como crearlas?

## Cookies  
*Una cookie es un fragmento de información que un navegador web almacena en el disco duro del visitante a una página web. La información se almacena a petición del servidor web, ya sea directamente desde la propia página web con JavaScript o desde el servidor web mediante las cabeceras HTTP, que pueden ser generadas desde un lenguaje de web scripting como PHP. La información almacenada en una cookie puede ser recuperada por el servidor web en posteriores visitas a la misma página web.*

---

## Sesiones


*Una sesión es un mecanismo de programación de las tecnologías de web scripting que permite conservar información sobre un usuario al pasar de una página a otra. A diferencia de una cookie, los datos asociados a una sesión se almacenan en el servidor y nunca en el cliente.*

*En la mayoría de las tecnologías de web scripting, las sesiones se implementan mediante una cookie que almacena un valor que identifica al usuario en el servidor web cada vez que pasa de una página web a otra. En el servidor web están almacenados todos los datos de la sesión y se accede a ellos cada vez que se pasa de página gracias al identificador almacenado en la cookie.*

---

 ## ¿Como crear una cookiee?

 En la siguiente página se cuenta el número de visitas que realiza un usuario al visitar la página; este contador conserva su valor durante un año aún a pesar de que un usuario cierre el navegador y tarde días en volver a visitar la página:

>< ?php
>
 >if(isset($_COOKIE['contador']))
>
 > { 
  > // Caduca en un año 
>
 >   setcookie('contador', $_COOKIE['contador'] + 1, time() + >365 * 24 * 60 * 60); 
  >  $mensaje = 'Número de visitas: ' . $_COOKIE['contador'];
   > 
    >} 
     > else
      >  { 
>
 >   // Caduca en un año  setcookie('contador', 1, time() + 365 * 24 * 60 * 60); 
>
 >   $mensaje = 'Bienvenido a nuestra página web'; 
  >    } 
   >   
    >  ?> 

>><?xml version="1.0" encoding="iso-8859-1"?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es"> 
><head> 
><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
><title>Prueba de cookie</title> 
></head> 
><body> 
<p> 
<?php echo $mensaje; ?> 
</p> 
</body> 
</html> 

*En el código anterior, fíjate cómo se emplea la función isset() para comprobar si una variable ha sido inicializada.*

*Importante: las cookies se envían al cliente mediante encabezados HTTP. Como cualquier otro encabezado, las cookies se deben enviar antes que cualquier salida que genere la página (antes que <html>, <head> o un simple espacio en blanco).*

*Sin embargo, se puede emplear un buffer de salida para almacenar (retener) la salida generada, en cuyo caso se puede enviar un encabezado en cualquier momento, pero con la sobrecarga que supone por un lado almacenar en el servidor toda la salida antes de ser enviada y por otro lado no recibir la página en el cliente hasta que el código PHP no haya terminado completamente. Esto se puede lograr con las funciones ob_start() y ob_end_flush() en la propia página, o configurando el parámetro output_buffering en el fichero php.ini.*



## ¿Como crear una session?

El siguiente ejemplo cuenta el número de visitas que realiza un usuario a una página web. A diferencia del contador realizado con una cookie en el ejemplo anterior, este contador sólo funciona durante el tiempo de existencia de la sesión, si el usuario cierra el navegador y vuelve a acceder a la página, el contador se reiniciará desde uno:

>> <?php 

  session_start(); 

  if(isset($_SESSION['contador'])) 

  { 
    $_SESSION['contador'] = $_SESSION['contador'] + 1; 

    $mensaje = 'Número de visitas: ' . $_SESSION['contador']; 
  } 
  else 
  {

    $_SESSION['contador'] = 1; 
    $mensaje = 'Bienvenido a nuestra página web'; 
  } 
?> 
>><?xml version="1.0" encoding="iso-8859-1"?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">  

<head> 

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 

<title>Prueba de cookie</title> 

</head> 

<body> 

<p> 
<?php echo $mensaje; ?> 
</p> 

</body> 

</html>
