<?php
session_start();
  include("conexion.php");
if (isset($_POST['btnAHerramienta'])) {
  echo "<script>window.location='formherra.php'</script>";
}

if (isset($_POST['btnAUsuario'])) {
  echo "<script>window.location='formUsuarios.php'</script>";
}

if (isset($_POST['btnAQuimico'])) {
  echo "<script>window.location='formQuimicos.php'</script>";
}

//Boton Agregar Quimico
if (isset($_POST['btnQuimico'])) {
  $quimi = $_POST['quimico'];
  $inv = $_POST['inve'];
  $cadu = $_POST['caducidad'];
  $informacion = $_POST['info'];
  $Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));

  $query= "insert into tbquimicos(quimico,inv,caducidad,info,Imagen) values('$quimi','$inv','$cadu','$informacion','$Imagen')";

  $resultado = $conexion -> query($query);

  if($resultado){
    echo "<script> alert('Si jalo');window.location='formQuimicos.php'</script>";
  } else {
    echo "no jalo";
  }
}
//Boton Agregar Alumno
if (isset($_POST['btnAAlumno'])) {
  $alumno = $_POST['alumno'];
  $ncontrol = $_POST['ncontrol'];
  $tel = $_POST['tel'];
  $correo = $_POST['correo'];

  $query= "insert into tbalumnos(alumno,ncontrol,tel,correo) values('$alumno','$ncontrol','$tel','$correo')";

  $resultado = $conexion -> query($query);

  if($resultado){
    echo "<script> alert('Si jalo');window.location='formPrestarHerra.php'</script>";
  } else {
    echo "no jalo";
  }
}
//Boton Prestar Herramienta
if (isset($_POST['btnPrestarHerra'])) {
  $alumno = $_POST['alumno'];
  $herramientas = $_POST['herramientas'];


  foreach($herramientas as $hobrow){
    //echo $hobrow;
    $query2= "insert into tbpedorra(alumno,herramientas) values('$alumno','$hobrow')";
    $resultado= mysqli_query($conexion, $query2);
  }
    if($resultado){
      $_SESSION['mensaje']="Prestamo registrado";
      header("Location: formPrestarHerra.php");
    } else{
      echo "<script> alert('Error favor de intentar de nuevo');window.location='formPrestarHerra.php'</script>";
    }


  //$query3= "insert into tbpedorra(alumno,herramientas) values('$alumno','$herramientas')";

  //$resultado3 = $conexion -> query($query3);
/*
  if($resultado3){
    echo "<script> alert('Si jalo');window.location='formPrestarHerra.php'</script>";
  } else {
    echo "no jalo";
  }*/
}

//tbherramientas
if (isset($_POST['btnHerramienta'])) {
  $herra = $_POST['herramienta'];
  $noinv = $_POST['invh'];
  $cantidad = $_POST['canth'];
  $marcah = $_POST['marcah'];
  $infoa = $_POST['infoh'];
  $Imagenh = addslashes(file_get_contents($_FILES['Imagenh']['tmp_name']));

  $query= "insert into tbherramientas(herramienta,inv,cantidad,marca,observ,Imagenh) values('$herra','$noinv','$cantidad','$marcah','$infoa','$Imagenh')";

  $resultado1 = $conexion -> query($query);

  if($resultado1){
    echo "<script> alert('Si jalo');window.location='formherra.php'</script>";
  } else {
    echo "no jalo";
  }
}

//Boton Actualizar Herramientas
if  (isset($_POST['btnActualizarHerramienta'])){

  $idherramienta= $_REQUEST['idherramienta'];
  $herra = $_POST['herramienta'];
  $noinv = $_POST['invh'];
  $cantidad = $_POST['canth'];
  $marcah = $_POST['marcah'];
  $infoa = $_POST['infoh'];
  
  if(empty($_FILES['Imagenh']['tmp_name'])){
    $query="select Imagenh from tbherramientas where idherramienta ='$idherramienta'";
    $consulta=$conexion->query($query);
    while ($row = $consulta->fetch_assoc()) {
      $Imagenh = addslashes($_FILES[$row]);
  }  
  } else {
    $Imagenh = addslashes(file_get_contents($_FILES['Imagenh']['tmp_name']));
  }


  $query= "UPDATE tbherramientas SET herramienta='$herra', inv='$noinv', cantidad='$cantidad', marca='$marcah', observ='$infoa', Imagenh='$Imagenh', WHERE idherramienta = '$idherramienta' ";

  $resultado2 = $conexion -> query($query);

  if($resultado2){
    echo "<script> alert('Si jalo');window.location='invherramientas.php'</script>";
  } else {
    echo "no jalo";
  }
}

//Botón crear Usuario
if (isset($_POST['btnCrearusu'])) {
  $usuario = $_POST['usuario'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];

if ($pass===$cpass) {
  $q= "INSERT INTO tbusuarios(usuario,pass) VALUES ('$usuario','$pass') ";
  $resultado = $conexion -> query($q);
  if($resultado){
    echo "<script> alert('Usuari@ $usuario se agregó correctamente!');window.location='formUsuarios.php'</script>";
  } else {
    echo "no jalo este pedo";
  }
} else {
  echo "<script> alert('Las contraseñas no coinciden'); window.location='formUsuarios.php'; </script> ";
}

}


 ?>
