<?php 
	$idEm=$_GET['id'];
?>

<?PHP include("Funciones.php"); ?>

<!DOCTYPE html>
<html lang="esp">
<head>
<meta charset="UTF-8"> <!-- lo hizo el burrow Hogo --> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Editar Rentas</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lobster+Two:ital@1&display=swap" rel="stylesheet">

<script language="javascript" src="js/jquery.js"></script>
<script language="javascript" src="js/AjaxUpload.2.0.min.js"></script>
<script language="javascript">
	$(document).ready(function(){
	var button = $("#upload_button"), interval; 
	new AjaxUpload("#upload_button", {
        action: "ajax/TIP_Subir.php",
		onSubmit : function(file , ext){
			if (! (ext && /^(mp4|avi|mp3|txt|jpg|png)$/.test(ext))){	//Solo se permititen archivos de tipo: mp4, avi, mp3, txt, jpg, png
				alert("Solo se permiten archivos de tipo: mp4, avi, mp3, txt, jpg o png");
				return false;	//Cancela la carga
			} else {
				button.text("Cargando");
				this.disable();
			}
		},
		onComplete: function(file, response){
			button.text("Buscar");
			this.enable();	//Habilita el bot�n Subir
			alert ("Archivo Cargado");	
			$('#Archivo').val(response);
		}
	});
});
</script>
<style type="text/css">
<!--
body {
	background-image: url();
	background-repeat: no-repeat;
	background-color: #333333;
}
-->
</style></head>

<style> 
		#target { 
			font: Verdana, Geneva, sans-serif; 
			color: #FFFFFF;
            text-align:center;			

		} 
		
				#targeta { 
			font: Verdana, Geneva, sans-serif; 
			color: #FFFFFF; 
			style="text-align:justify;

		} 
		.dib1  {  position: absolute; left: 1060px; top: 35px; width: 65px; height: 45px; }
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
		#upload_button{
			color: black;
			text-align: center;
			margin-top: 6px;
		}
</style> 

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

<div  style="text-align:justify" id="target">
<h1 class="titulo">Editar Rentas</h1>

<?php
	// $idEm = $_POST['ID_EMPLEADO'];
	$sql_renta="SELECT ID_RENTA, ID_PELICULA, ID_CLIENTE, FECHA_RENTA, FECHA_DEVOLUCION
	FROM RENTAR 
 	WHERE ID_RENTA ='$idEm'";
	$resultado_renta=oci_parse($conexion,$sql_renta);
	oci_execute($resultado_renta);
	
	while( $fila_renta = oci_fetch_array($resultado_renta, OCI_RETURN_LOBS))  // OCI_BOTH OCI_NUM  OCI_ASSOC OCI_RETURN_NULLS   OCI_ASSOC+OCI_RETURN_NULLS  OCI_RETURN_LOBS
	{
?>

<p>&nbsp;</p>
<center>
<form id="Formulario" name="Formulario" method="post" action="Editar_Rentas2.php"  enctype="multipart/form-data">
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">ID de renta: </span>
			<input type="text" name="ID_RENTA" id="ID_RENTA" value="<?php echo $fila_renta['ID_RENTA'];?>"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Pelicula: </span>
			<input type="text" name="ID_PELICULA" id="ID_PELICULA" value="<?php echo $fila_renta['ID_PELICULA'];?>"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Cliente: </span>
			<input type="text" name="ID_CLIENTE" id="ID_CLIENTE" value="<?php echo $fila_renta['ID_CLIENTE'];?>"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Fecha de renta: </span>
			<input type="date" name="FECHA_RENTA" id="FECHA_RENTA" value="<?php echo date('Y-m-d',strtotime($fila_renta['FECHA_RENTA']));?>"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Fecha de devolución: </span>
			<input type="date" name="FECHA_DEVOLUCION" id="FECHA_DEVOLUCION" value="<?php echo date('Y-m-d',strtotime($fila_renta['FECHA_DEVOLUCION']));?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	

	
	<p>
      <?php
	}
    ?>
    <div class="d-grid gap-2">
    <label>
      <input type="submit" class="btn btn-outline-warning" name="Enviar" id="Enviar" value="Enviar" />
    </label>
  </p>
  </div>
</form>
<p>&nbsp;</p>	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

