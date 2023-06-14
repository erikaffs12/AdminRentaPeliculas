<?PHP include("Funciones.php"); ?>

<!DOCTYPE html>
<html lang="esp">

<head>
  <meta charset="UTF-8"> <!-- lo hizo el burrow Hogo --> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Registo exitoso</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&display=swap" rel="stylesheet">

<style type="text/css">
<!--
body { 
	background-image: url();
	background-repeat: no-repeat;
	background-color: #333333;
}
.nav-link{
      font-size: 20px;
      font-family: 'Bebas Neue';
}
-->
</style></head>

<body style="background-color: #f1ece7;">
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #f2aa1f;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">
        <img src="peliculas/logo.png" width="200">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="Peliculas2.php"> CONSULTAR MULTIMEDIA </a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="Agregar.php"> AGREGAR MULTIMEDIA </a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="Listar_Empleados.php"> CONSULTAR EMPLEADOS </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="Agregar_Empleados.php"> AGREGAR EMPLEADOS </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="Listar_Clientes.php"> CONSULTAR CLIENTES </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Agregar_Clientes.php"> AGREGAR CLIENTES </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Agregar_Rentas.php"> AGREGAR RENTAS </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Listar_Rentas.php"> CONSULTAR RENTAS </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
&nbsp;

<?php

	$sql_maximo="SELECT MAX(id_pelicula) AS MAXIMO FROM pelicula";
	$resultado_maximo=oci_parse($conexion, $sql_maximo); //oci_parse equivalente a mysql_query
	oci_execute($resultado_maximo); //occi_execute para ejecutar la sentencia anterior
	$fila_maximo=oci_fetch_array($resultado_maximo); //OCI_BOTH es el predeterminado
	
$siguiente = $fila_maximo["MAXIMO"]+1;
$nomb = $_POST['Nombre']; 
$sinop = $_POST['Sinopsis']; 
$promo = $_POST['Promocion']; 
$clasif = $_POST['Clasificacion'];  
$archiv = $_POST['Archivo']; 
$stoky = $_POST['STOCK'];
$precios = $_POST['PRECIO'];
$genn = $_POST['GENERO'];


$pelicula_nombre=$_FILES['Archivo']['name'];
$pelicula_tipo = $_FILES['Archivo']['type'];
$pelicula_temp = $_FILES['Archivo']['tmp_name'];
//lee el archivo a un string
$pelicula_string=file_get_contents($pelicula_temp);

  $sql_pelicula = "INSERT INTO PELICULA (id_pelicula, nombre, sinopsis,
  promocion, clasificacion, stock, precio, genero, video, video_blob, tipo_video, nombre_video) VALUES ('$siguiente', '$nomb', '$sinop',
  '$promo', '$clasif', '$stoky', '$precios', '$genn','$archiv', empty_blob(), :tipo_video, :nombre_video ) RETURNING video_blob INTO :video_blob ";

  $stm = oci_parse($conexion, $sql_pelicula);

  //inicializamos una variable de tipo blob
  $blob=oci_new_descriptor($conexion,OCI_D_LOB);

  //vinculamos los parametros con las variables
  oci_bind_by_name($stm, ":tipo_video", $pelicula_tipo );
  oci_bind_by_name($stm, ":video_blob", $blob, -1, OCI_B_BLOB);
  oci_bind_by_name($stm, ":nombre_video", $pelicula_nombre);
  
  oci_execute($stm, OCI_NO_AUTO_COMMIT);
  $blob->save($pelicula_string); //guardamos el archivo como binario
  
  oci_commit($conexion); //ejecutamos el commit

  //liberamos la variable y cerramos conexion
  $blob->free();
  oci_free_statement($stm);
	
	if(!oci_error())
	{
		echo "<center><h1>Registro Exitoso<br><a href='Peliculas2.php'>Consultar Peliculas</a></h1></center>";	
	}
	else
	{
		echo "<center>Error al Registrar</center>";	
	}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

