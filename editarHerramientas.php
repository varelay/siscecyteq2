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
        <li class="f"><a href="menu.php" style="font-family: 'Pacifico', cursive; font-size: 1.3rem;">Inicio  </a></li>
        <li class="f"><a href="invherramientas.php" style="font-family: 'Pacifico', cursive; font-size: 1.3rem;">Menú de herramientas</a></li>
        <li class="f"><a href="formherra.php" style="color: yellowgreen; font-family: 'Pacifico', cursive; font-size: 1.3rem;"  class="active">Agregar Herramientas</a></li>
        <li class="a"><button type="button" style="border-color: #FF5733; color: #FF5733; font-family: 'Pacifico', cursive;" class="btn btn-outline">Cerrar Sesión</button></li>
    </ul>
    </div>
    <!-- Fin NavBar -->
    <?php
        include("conexion.php");
        $idherramienta= $_REQUEST['idherramienta'];
        $query="select * from tbherramientas where idherramienta ='$idherramienta'";
        $resultado=$conexion->query($query);
        $row=$resultado->fetch_assoc();
       ?>



    <!--Formulario index -->
<div class="contindex" style="width: auto; height: 10vh;">

            <h1>Registrar Usuario<span class="typer" id="some-id" data-delay="200" data-delim=":" data-words=".:..:..." data-colors="red"></span><span class="cursor" data-cursorDisplay="_" data-owner="some-id"></span></h1>

            <form class="contenedorform" action="funcionesBD.php?idherramienta=<?php echo $row['idherramienta'] ?>"  method="POST" enctype="multipart/form-data">
                                           <div class="form-group">
                                           <label >Herramienta u objeto:</label>
                                           <input type="text" class="form-control" id="" name="herramienta" value="<?php echo $row['herramienta']; ?>" required>
                                           </div>
                                           <br>
                                           <div class="form-group">
                                           <label>Número de inventario:</label>
                                           <input type="text" class="form-control" id="" name="invh" value="<?php echo $row['inv']; ?>" required>
                                           </div>
                                           <br>
                                           <div class="form-group">
                                           <label>Cantidad:</label>
                                           <input type="number" class="form-control" id="" name="canth" value="<?php echo $row['cantidad']; ?>" required>
                                           </div>
                                           <br>
                                           <div class="form-group">
                                           <label>Marca:</label>
                                           <input type="text" class="form-control" id="" name="marcah" value="<?php echo $row['marca']; ?>" required>
                                           </div>
                                           <br>
                                           <div class="form-group">
                                           <label>Información adicional:</label>
                                           <input type="text" class="form-control" id="" name="infoh" value="<?php echo $row['observ']; ?>" required>
                                           </div>
                                           <br>
                                           <div class="form-group">
                                             <label >Imagen: </label>
                                             <input type="file" class="form-control" name="Imagenh" id="Imagenh"  value="data:image/jpg;base64,<?php echo base64_encode($row['Imagenh']); ?>">
                                             <img height="100px" src="data:image/jpg;base64,<?php echo base64_encode($row['Imagenh']); ?>"/>
                                           </div>
                                           <br>
                                           <div class="col text-center">
                                               <button type="submit" name="btnActualizarHerramienta" class="btn btn-primary btn-sm" style="width: 150px; height: 60px; font-size: 1.1rem;">Actualizar Herramienta</button>
                                           </div>
                                         </form>


    <!--Fin Formulario registro de herramientas -->




        <!-- JS para que los h1 se vean mamalon -->
        <script src="js/typer.js"></script>
        <!-- JS para que no acepte campos vacios -->
        <script src="js/camposvacios.js"></script>
  </body>
</html>
