<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Agregar herramienta</title>
    <!-- Validación sesiones -->
        <?php
        session_Start();
        $usuario= $_SESSION['username'];

        if(!isset($usuario))
          header("location: index.php")
         ?>
    <!-- Fin  Validación sesiones -->
  </head>
  <body>
    <!-- NavBar -->
    <div class="navbar">
        <img src="./imagenes/cecyteqlogo1.png" class="logo" alt="Main Logo">
    <ul>
        <li class="a"><button type="button" style="border-color: #FF5733; color: #FF5733; font-family: 'Pacifico', cursive;" class="btn btn-outline">Cerrar Sesión</button></li>
    </ul>
    </div>
    <!-- Fin NavBar -->




    <!--Formulario index -->
<div class="contindex" style="width: auto; height: 10vh;">

            <h1>Registrar Alumno<span class="typer" id="some-id" data-delay="200" data-delim=":" data-words=".:..:..." data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>

            <form class="contenedorform" action="funcionesBD.php"  method="POST" enctype="multipart/form-data">

                                           <div class="form-group">
                                           <label >Nombre del alumno:</label>
                                           <input type="text" class="form-control" id="" name="alumno" required>
                                           </div>
                                           <br>
                                           <div class="form-group">
                                           <label>Número de control:</label>
                                           <input type="text" class="form-control" id="" name="ncontrol" required>
                                           </div>
                                           <br>
                                           <div class="form-group">
                                           <label>Telefono:</label>
                                           <input type="text" class="form-control" id="" name="tel" required>
                                           </div>
                                           <br>
                                           <div class="form-group">
                                           <label>Correo:</label>
                                           <input type="text" class="form-control" id="" name="correo" required>
                                           </div>
                                           <br>
                                           <div class="col text-center">
                                               <button type="submit" name="btnAAlumno" class="btn btn-primary btn-sm" style="width: 150px; height: 60px; font-size: 1.1rem;">Agregar Alumno</button>
                                           </div>
                                         </form>


    <!--Fin Formulario registro de herramientas -->




        <!-- JS para que los h1 se vean mamalon -->
        <script src="js/typer.js"></script>
        <!-- JS para que no acepte campos vacios -->
        <script src="js/camposvacios.js"></script>
  </body>
</html>
