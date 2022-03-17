<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vista Cuantitativa</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src=./cmain.js></script>
		<script src="footer.js"></script>
		<script src="nav.js"></script>
		<script src="./bootstrap.min.js"></script>
    	<link rel="stylesheet" href="./bootstrap.min.css">
    	<link rel="stylesheet" href="./ccvista.css">

</head>
<body>
<mi-nav></mi-nav>
<?php
include("conexion.php");
$conexionA=conectar();
if ($conexionA) {
?>
<h1>Empresa de Leonardo Calvillo Tapia</h1>
      <br>
      <fieldset>
<form>
<legend> Seleccione los datos</legend><p>
<label>Tabla:</label>
<select name="tabla" id="tabla">
<option value='' disable selected>Seleccione un valor</option>
<?php
$consultaA="select table_name as tablas FROM information_schema.tables WHERE table_schema = 'polizona_57'";
$resultadoA=mysqli_query($conexionA,$consultaA);
while($registroA=mysqli_fetch_array($resultadoA)){
	if($registroA['tablas']!="conjuntas" && $registroA['tablas']!="cconjuntas"){?>
	<option value='<?PHP echo "$registroA[tablas]"; ?>'><?PHP echo "$registroA[tablas]"; ?> </option>
	<?PHP }
}
} ?>
</select></p>
<p>
<label>Campo 1:</label>
<select name='combo1' id='combo1'class="combo1">
</select>
</p>
<p>
<label>Campo 2:</label>
<select name='combo2' id='combo2' class="combo2">
</select>
</p>
<p>
<label>Condición</label>
<input name='condi' id='condi' class="condi" type="text"/>
</p>
<p><button id='cvista' name='cvista' class="cvista btn btn-warning">Crear vista</button>
</p>
<label name='salida' id='salida' class="salida"></label>
</form>
</fieldset><br><br>
<mi-footer></mi-footer>
</body>
</html>