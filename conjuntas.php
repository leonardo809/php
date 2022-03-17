<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src=./main.js></script>
	
    
    <script src="./footer.js"></script>
    <script src="./nav.js"></script>
    <script src="./bootstrap.min.js"></script>
    <link rel="stylesheet" href="./bootstrap.min.css">
    
</head>
<body>
<?PHP

	include("cVista.php");
	
	if($conexionA){
$c_existe="select * from conjuntas;";
$r_existe=mysqli_query($conexionA,$c_existe);

if($r_existe){
	?> <br>
	<h1>Calculo de probabilidades.</h1>
<fieldset>
	<?php
	$c_lista="select COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'polizona_57' AND TABLE_NAME = 'conjuntas';";
$r_lista=mysqli_query($conexionA,$c_lista);

$aux=array();
$cont=0;
while($rs_lista=mysqli_fetch_array($r_lista)){
	$aux[$cont]=$rs_lista["COLUMN_NAME"];
	$cont++;
}
$aux2=$aux[0];
$consultaA="select distinct ".$aux[0]." from conjuntas;";
$resultadoA=mysqli_query($conexionA,$consultaA);
	?>
	<br>
	<form method="POST" id="forma" action="conjuntas.php">
	<label for='opciones'> Seleccione el valor de <?PHP echo " $aux[0]"; ?> </label>
	<select name='campo1'>
	<option value='Seleccione el valor'>Seleccione un valor</option>
	<?PHP
	
	while($registroA=mysqli_fetch_array($resultadoA)){
		?>
		<option value='<?PHP echo "$registroA[$aux2]"; ?>'><?PHP echo "$registroA[$aux2]"; ?> </option>
		
		<?PHP
	}
	?>
	</select><br><br>
	<?php
	
	$consultaA="select distinct ".$aux[1]." from conjuntas;";
	$resultadoA=mysqli_query($conexionA,$consultaA);
	?>
	<label for='opciones'> Seleccione el valor de <?PHP echo" $aux[1]"; ?> </label>
	<select name='campo2'>
	<option value='Seleccione el valor'>Seleccione un valor</option>
	<?PHP
	$aux2=$aux[1];
	while($registroA=mysqli_fetch_array($resultadoA)){
		?>
		<option value='<?PHP echo "$registroA[$aux2]"; ?>'><?PHP echo "$registroA[$aux2]"; ?> </option>
		<?PHP
	}	
?>
	</select><br><br>
	<legend>¿Qué probabilidad quieres?</legend>
	<br>
	<input id="conjunta" value="Conjunta" name="conjunta" class="btn btn-primary" type="submit"/>
	<input type="submit" Value="Bayesiana" name="Bayesiana" class="btn btn-primary"/>
	<input type="submit" Value=" Condicional" name="condicional" class="btn btn-primary"/>
	<br><br>
</form>
<?php
if(isset($_POST['conjunta'])){
	$campo1=$_POST['campo1'];
	$campo2=$_POST['campo2'];
	if($campo1=="Seleccione el valor" || $campo2=="Seleccione el valor" ){
		echo "<script>alert('Seleccione valores aceptables');</script>";
	}else{
	$consultaA="select conjunta from conjuntas where " .$aux[0]. "='".$campo1."' and ".$aux[1]."='".$campo2."';";
	$resultadoA=mysqli_query($conexionA,$consultaA);
	while($registroA=mysqli_fetch_array($resultadoA)){
	?>
	<div> <?PHP echo"<div class='alert alert-success' role='alert'>
  $registroA[conjunta]
</div>" ;
	
	?> </div>
	<?PHP
}
	}
}
if(isset($_POST['Bayesiana'])){
	$campo1=$_POST['campo1'];
	$campo2=$_POST['campo2'];
	if($campo1=="Seleccione el valor" || $campo2=="Seleccione el valor" ){
		echo "<script>alert('Seleccione valores aceptables');</script>";
	}else{
	$consultaA="select conjunta/(select sum (conjunta) from conjuntas where ".$aux[0]."= '".$campo1."')*(select sum(conjunta) from conjuntas where ".$aux[0]."= '".$campo1."')/(select sum(conjunta) from conjuntas where ".$aux[1]."='".$campo2."') as bayesiana from conjuntas where ".$aux[0]."='".$campo1."' and ".$aux[1]."='".$campo2."';";
	$resultadoA=mysqli_query($conexionA,$consultaA);
	while($registroA=mysqli_fetch_array($resultadoA)){
	?>
	<div> <?PHP echo"<div class='alert alert-success' role='alert'>$registroA[bayesiana]</div>" ; ?></div>
	<?PHP
}
}
}
	if(isset($_POST['condicional'])){
	$campo1=$_POST['campo1'];
	$campo2=$_POST['campo2'];
	if($campo1=="Seleccione el valor" || $campo2=="Seleccione el valor" ){
		echo "<script>alert('Seleccione valores aceptables');</script>";
	}else{
	$consultaA="select conjunta/(select sum(conjunta) from conjuntas where ".$aux[0]."='".$campo1."') as condicional from conjuntas where ".$aux[0]."='".$campo1."' and ".$aux[1]."='".$campo2."';";
	$resultadoA=mysqli_query($conexionA,$consultaA);
	while($registroA=mysqli_fetch_array($resultadoA)){
	?>
	<div> <?PHP echo"<div class='alert alert-success' role='alert'>$registroA[condicional]</div>" ; ?></div>
	<?PHP
}
	}
}	
	}else{
		echo '<script>alet("No ha creado su tabla de conjuntos");</script>';
	}
}
else{
	?>
	<p><div class="alert alert-danger" role="alert">
	Error
</div></p>
	<?php
}
	
	?>
	</fieldset>
<mi-footer></mi-footer>
</body>
</html>
