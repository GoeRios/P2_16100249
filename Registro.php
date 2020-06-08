<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="Stilo.css">
  <title>Registrarse</title>
</head>

<body>

  <center>
    <h1>APP FOOD</h1>
  </center>


  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->

      <!-- Icon -->
      <div class="fadeIn first">
        <img src="https://image.flaticon.com/icons/png/512/433/433416.png" id="icon" alt="User Icon" />
      </div>

      <!-- Login Form -->
      <form  action ="RealizarRegistro.php"method="post">
        <input type="text" id="Nombre" class="fadeIn second" name="Nombre" placeholder="Nombre">
        <input type="text" id="Apellido" class="fadeIn third" name="Apellido" placeholder="Apellido">
        <input type="text" id="Correo" class="fadeIn third" name="Correo" placeholder="Correo">
        <input type="text" id="Contraseña" class="fadeIn third" name="Contraseña" placeholder="Contraseña">
        <input type="submit" class="fadeIn fourth" value="Registrarse">
        
      </form>
       
      <div id="formFooter">
        <a Class="underlineHover" href="Login.php">Iniciar Sesion</a>
      </div>
    




    </div>
  </div>



  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>