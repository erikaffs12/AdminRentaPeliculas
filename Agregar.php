<?PHP include("Funciones.php"); ?>

<!DOCTYPE html>
<html lang="esp">

<head>
  <meta charset="UTF-8"> <!-- lo hizo el burrow Hogo --> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Agregar Multimedia</title>

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
.nav-link{
      font-size: 20px;
      font-family: 'Bebas Neue';
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
		
	.dib1  {  
		position: absolute; 
		left: 1060px; 
		top: 35px; 
		width: 65px; 
		height: 45px; 
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
<h1 class="titulo">Agregar películas y multimedia</h1>

<p>&nbsp;</p>
<center>
<form id="Formulario" name="Formulario" method="post" action="Agregar_Pelicula2.php" enctype="multipart/form-data">
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Nombre: </span>
			<input type="text" name="Nombre" id="Nombre" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>

	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Stock: </span>
			<input name="STOCK" id="STOCK" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>
		
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Precio: </span>
			<input name="PRECIO" id="PRECIO" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>

	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Género: </span>
			<input name="GENERO" id="GENERO" class="form-control"  aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>

	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Sinópsis: </span>
			<textarea name="Sinopsis" id="Sinopsis" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
		</div>
	</div>
		
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Estreno: </span>
			<select name="Promocion" id="Promocion" class="form-select form-select-sm" aria-label=".form-select-sm example">
				<option selected>Escoge una opción</option>
				<option value="1">Si</option>
				<option value="2">No</option>
			</select>
		</div>
	</div>

	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Clasificación: </span>
			<select name="Clasificacion" id="Clasificacion" class="form-select form-select-sm" aria-label=".form-select-sm example">
				<?php
					$sql_clasificacion="SELECT * FROM clasificacion";
					$resultado_clasificacion=oci_parse($conexion, $sql_clasificacion); // oci_parse es equivalente a mysql_query (Pero los parametros van al reves)
					oci_execute($resultado_clasificacion);
					while($fila_clasificacion=oci_fetch_array($resultado_clasificacion)) //OCI_BOTH es el predeterminado
					{
						?>
							<option value="<?php echo $fila_clasificacion["CLASIFICACION"]; ?>" ><?php echo $fila_clasificacion["DESCRIPCION"]; ?></option>
						<?php
					}
				?>
			</select>
		</div>
	</div>
			
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Multimedia ruta: </span>
			<td>
				<input type="text" class="form-control" name="Archivo" id="Archivo" value=""/>
				<div id="upload_button">Buscar</div>
			</td>
		</div>
	</div>

	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Multimedia blob: </span>
			<td><input type="file" class="form-control" name="Archivo" id="Archivo" value=""/></td>
		</div>
	</div>

  &nbsp;&nbsp;&nbsp;&nbsp;
	<div class="d-grid gap-2">
    <label>
      <input type="submit" class="btn btn-outline-warning" name="Enviar" id="Enviar" value="Enviar" />
    </label>
  </div>

  </div>
</form>
<p>&nbsp;</p>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

