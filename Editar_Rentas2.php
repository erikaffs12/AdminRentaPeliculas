<?php 
	//$idEm=$_GET['id'];
?>

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
h1.titulo{
		margin-top: 20px;
		margin-bottom: 20px;
		color: white;
		font-family: 'Lobster Two', cursive;
		font-size: 80px;
		font-weight: 600;
		text-shadow: 3px 3px #114358;
		text-align: center;
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
  
$id = $_POST['ID_RENTA']; 
$peli = $_POST['ID_PELICULA']; 
$client = $_POST['ID_CLIENTE']; 
$FECHA_RENTA = $_POST['FECHA_RENTA'];
$FECHA_DEVOLUCION = $_POST['FECHA_DEVOLUCION'];
 
$fecha_rent=date('d/m/Y',strtotime($FECHA_RENTA));
$fecha_devl=date('d/m/Y',strtotime($FECHA_DEVOLUCION)); 

//echo "$fecha_rent";



	$sql_renta=" UPDATE RENTAR SET ID_PELICULA='$peli', ID_CLIENTE='$client', FECHA_RENTA='$fecha_rent',
	FECHA_DEVOLUCION='$fecha_devl'
	WHERE ID_RENTA='$id'";
  
	$stm = oci_parse($conexion,$sql_renta);
  
	oci_execute($stm);
	oci_commit($conexion); //ejecutamos el commit
  oci_free_statement($stm);

  if(!oci_error())
	{
		echo "<center><h1>Registro Actualizado<br><a href='Listar_Rentas.php'>Consultar rentas</a></h1></center>";	
	}
	else 
	{
		echo "<center>Error al Registrar</center>";	
	}

?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

