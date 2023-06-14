<?php 
	$id=$_GET['id'];
?>

<?PHP include("Funciones.php"); ?>

<!DOCTYPE html>
<html lang="esp">
<head>
<meta charset="UTF-8"> <!-- lo hizo el burrow Hogo --> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Editar Multimedia</title>

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
<h1 class="titulo">Editar películas y multimedia</h1>

<?php 
	$sql_paciente="SELECT P.NOMBRE, P.SINOPSIS, P.PROMOCION, C.CLASIFICACION,
	C.DESCRIPCION, P.VIDEO, P.VIDEO_BLOB, P.TIPO_VIDEO, P.NOMBRE_VIDEO, P.STOCK, P.PRECIO, P.GENERO
	FROM PELICULA P
	JOIN CLASIFICACION C
	ON C.CLASIFICACION= P.CLASIFICACION
 	WHERE ID_PELICULA='$id'";
	$resultado_paciente=oci_parse($conexion,$sql_paciente);
	oci_execute($resultado_paciente);
	
	while( $fila_paciente = oci_fetch_array($resultado_paciente, OCI_RETURN_LOBS))  // OCI_BOTH OCI_NUM  OCI_ASSOC OCI_RETURN_NULLS   OCI_ASSOC+OCI_RETURN_NULLS  OCI_RETURN_LOBS
	{
?>

<p>&nbsp;</p>
<center>
<form id="Formulario" name="Formulario" method="post" action="Editar_Pelicula2.php"  enctype="multipart/form-data">
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">ID: </span>
			<input type="text" name="ID" id="ID" value="<?php echo $id;?>"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Nombre: </span>
			<input type="text" name="NOMBRE" id="NOMBRE" value="<?php echo $fila_paciente['NOMBRE'];?>"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Stock: </span>
			<input type="text" name="STOCK" id="STOCK" value="<?php echo $fila_paciente['STOCK'];?>"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Precio: </span>
			<input type="text" name="PRECIO" id="PRECIO" value="<?php echo $fila_paciente['PRECIO'];?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Género: </span>
			<input type="text" name="GENERO" id="GENERO" value="<?php echo $fila_paciente['GENERO'];?>"  class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	
	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Sinópsis: </span>
			<input type="text" name="SINOPSIS" id="SINOPSIS" value="<?php echo $fila_paciente['SINOPSIS'];?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
		</div>
	</div>	

	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Estreno: </span>
			<select name="Promocion" id="Promocion" class="form-select form-select-sm" aria-label=".form-select-sm example">
				<option value="<?php echo $fila_paciente['PROMOCION'];?>">SI</option>
				<option value="1">Si</option>
				<option value="2">No</option>
			</select>
		</div>
	</div>

	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Clasificación: </span>
			<select name="Clasificacion" id="Clasificacion" class="form-select form-select-sm" aria-label=".form-select-sm example">
			<option value="<?php echo $fila_paciente["CLASIFICACION"]; ?>" ><?php echo $fila_paciente["DESCRIPCION"]; ?></option>
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
				<input type="text" class="form-control" name="Archivo" id="Archivo" value="<?php echo $fila_paciente["VIDEO"];?>"/>
				<div id="upload_button">Buscar</div>
			</td>
		</div>
	</div>

	<div class="col-4">
		<div class="input-group mb-3">
			<span class="input-group-text" id="inputGroup-sizing-default">Multimedia blob: </span>
			<table>
		 		<tr>
					<td>
						<input type="file" class="form-control" name="Archivo" id="Archivo" style="width: 160px" /> 	  					
					</td>
					<td>
						<input type="text" name="nombre_video" id="nombre_video" style="text-align:justify; font-weight: bold; color: white; background-color: #333333;" value="<?php echo $fila_paciente['NOMBRE_VIDEO'];?> " disabled/>			 
					</td>
		 		</tr>
	 		</table>
		</div>
	</div>
	<input type="text" style="width: 440px" value= "<?php echo "ATENCION: Se visualizara blob nuevo hasta nueva consulta " ;?>" disabled/>			 

  <tr id = "preview" style="visibility = 'visible'">
			
	  <td></td>
	  <td WIDTH="401" HEIGHT="249" id="targeta">
	  
	  <?php 
	  
	  $archivo = $fila_paciente["VIDEO_BLOB"];
	  $tipoarchivo = $fila_paciente["TIPO_VIDEO"]; 			
	  $tipoextension = substr($tipoarchivo, 0, 5); 	
	  
	  if (strtoupper($tipoextension) == "IMAGE")
	  {
		  echo '<center><img width="401" height="249" src="data:'.trim($tipoarchivo).';base64,'.base64_encode($archivo) .'" /></center>'; 
	  } 
	  else if (strtoupper($tipoextension) == "VIDEO")
	  {			
		  echo '<div content="Content_Type:'.trim($tipoarchivo).'"><center>';
		  echo '<video width="401" height="249" controls="controls">';
		  echo '<source src="data:'.trim($tipoarchivo).';base64,'.base64_encode($archivo).'" type="'.trim($tipoarchivo).'"/>';
		  echo '</video>';
		  echo '</center></div>';
	  } 
	  else if (strtoupper($tipoextension) == "AUDIO")
	  {			
		  echo '<div content="Content_Type:'.trim($tipoarchivo).'"><center>';
		  echo '<audio width="401" height="85" controls="controls">';
		  echo '<source src="data:'.trim($tipoarchivo).';base64,'.base64_encode($archivo).'" type="'.trim($tipoarchivo).'"/>';
		  echo '</audio>';
		  echo '</center></div>';
	  } 
	  
	  else if (strtoupper($tipoextension) == "TEXT/")
	  {			
		  echo '<div content="Content_Type:'.trim($tipoarchivo).'"><center>';
		  echo $archivo;
		  echo '</center></div>';
	  } 		
			  
	  ?>		
	  
	  </td>		
	  
  </tr>
	
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

