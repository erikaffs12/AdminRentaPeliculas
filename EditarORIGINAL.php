<?php 
	$id=$_GET['id'];
?>

<?PHP include("Funciones.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>menu</title>
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
			this.enable();	//Habilita el botón Subir
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

</style> 

<body>
<img src="imagenes/pantalla.jpg" width="900" height="114" alt="imagen" />
<a href="index.html"> <img src="imagenes/atras.jpg"  class="dib1" ></a>

<div  style="text-align:justify" id="target">
<center><h3>EDITAR PELICUY MULTIMEDIA</h3></center>

<?php 
	$sql_paciente="SELECT P.NOMBRE, P.SINOPSIS, P.PROMOCION, C.CLASIFICACION, C.DESCRIPCION, P.VIDEO
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
<form id="Formulario" name="Formulario" method="post" action="Editar_Pelicula.php">
  <table width="500" border="1">
	<tr>
      <td>ID</td>
      <td><input type="text" name="ID" id="ID" value="<?php echo $id;?>" readonly/></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><input type="text" name="NOMBRE" id="NOMBRE" value="<?php echo $fila_paciente['NOMBRE'];?>" size=50/></td>
    </tr>
    <tr>
      <td>Sinopsis</td>
      <td><input type="text" name="SINOPSIS" id="SINOPSIS" value="<?php echo $fila_paciente['SINOPSIS'];?>" size=50/></td>
    </tr>
	<tr>
      <td>Estreno</td>
      <td><select name="Promocion" id="Promocion">
	<option value="<?php echo $fila_paciente['PROMOCION'];?>">SI</option>
        <option value="1">SI</option>
        <option value="0">NO</option>
      </select></td>
    </tr>
    <tr>
      <td>Clasificaci&oacute;n</td>
      <td>
      <select name="Clasificacion" id="Clasificacion">
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
      </td>
    </tr>
    <tr>
      <td>Multimedia</td>
      <td><input type="text"  name="Archivo" id="Archivo" value="<?php echo $fila_paciente["VIDEO"];?>"/><div id="upload_button">Buscar</div></td>
    </tr>
    </table>
	<p>
      <?php
	}
    ?>
    <label>
      <input type="submit" name="Enviar" id="Enviar" value="Enviar" />
    </label>
  </p>
  </div>
</form>
<p>&nbsp;</p>	
</body>
</html>

