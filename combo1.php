<?php

function processDrpdown($selectedVal) {
    include("conexion.php");
    $conexionA=conectar();
if ($conexionA) {
    $consultaA="call columnas('$selectedVal')";
	$resultadoA=mysqli_query($conexionA,$consultaA);
	while($registroA=mysqli_fetch_array($resultadoA)){
        echo "<option value='".$registroA['columna']."'>".$registroA['columna']."</option>";
    }
}else{
    echo "<script>alert('Error en la conexion');</script>";
}
mysqli_close($conexionA);
}        

if ($_POST['dropdownValue']){
    //call the function or execute the code
    processDrpdown($_POST['dropdownValue']);
}
?>