<?php include("Funciones.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Consultar Empleados</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bree+Serif&display=swap" rel="stylesheet">

<style type="text/css">
<!--
body {
	background-image: url();
	background-repeat: no-repeat;
	background-color: #333333;
}
-->
</style>
	</head>
		<style> 
	#target { 
		font: Verdana, Geneva, sans-serif; 	
		color: black;
	    text-align:center;			
	} 	
	#targeta { 
		font: Verdana, Geneva, sans-serif; 
		color: black; 
		text-align:justify;
	} 	
	.dib1 {  
		position: absolute; left: 1060px; top: 35px; width: 65px; height: 45px; 
	}
	.nav-link{
      font-size: 20px;
      font-family: 'Bebas Neue';
    }
	#global {
      max-width: 100%;
      height: auto;
      overflow-x: scroll;
    }
    #mensajes {
      height: auto;
    }
	a {
		text-decoration: none;
		color: white;
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

<div width="50%">
<table class="table table-sm table-hover table-responsive">  
	<tr>
		<th id="target">ID_Empleado</th>
    	<th id="target">RFC</th>
        <th id="target">Nombre</th>
		<th id="target">Fecha de nacimiento</th>
		<th id="target">Fecha de contratación</th>
        <th id="target">Género</th>
	</tr>

	<?php
		$sql_empleado="SELECT ID_EMPLEADO, RFC, NOMBRE_EMPLEADO, FECHA_NACIMIENTO, FECHA_INGRESO, GENERO_EMPLEADO
		FROM EMPLEADO ORDER BY ID_EMPLEADO ASC" ;
		$resultado_empleado=oci_parse($conexion,$sql_empleado);
		oci_execute($resultado_empleado);
		while( $fila_empleado = oci_fetch_assoc($resultado_empleado))  // OCI_BOTH OCI_NUM  OCI_ASSOC OCI_RETURN_NULLS   OCI_ASSOC+OCI_RETURN_NULLS  OCI_RETURN_LOBS
		{
	?>

	<tr  id="target">
		<td><?php echo $fila_empleado['ID_EMPLEADO']; ?></td>	
    	<td><?php echo $fila_empleado['RFC']; ?></td>	
        <td><?php echo $fila_empleado["NOMBRE_EMPLEADO"]; ?></td>
		<td><?php echo $fila_empleado["FECHA_NACIMIENTO"]; ?></td>
		<td><?php echo $fila_empleado["FECHA_INGRESO"]; ?></td>
        <td><?php echo $fila_empleado["GENERO_EMPLEADO"]; ?></td>
		

		<td> 
		<button type="button" class="btn btn-success">
		<?php echo "<center><a href='Editar_Empleados.php?id=".$fila_empleado['RFC']."'>Editar</a></h1></center>";
		?>	
		</button>
		</td>

		<td>
		<button type="button" class="btn btn-danger">
		<?php echo "<center><a href='Eliminar_Empleados.php?id=".$fila_empleado['RFC']."'>Eliminar</a></h1></center>";
		?>	
		</button> 
		</td>
				
		</td>
    </tr>	
<?php
	}
?>
</div>

</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
