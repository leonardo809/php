<?php

function processDrpdown($selectedVal,$modelo) {
    include("conexion.php");
    $conexionA=conectar();
    if ($conexionA) {
    $consultaA="call columnas('$selectedVal')";
	$resultadoA=mysqli_query($conexionA,$consultaA);
	while($registroA=mysqli_fetch_array($resultadoA)){
        if($registroA['columna']!=$modelo){
        echo "<option value='".$registroA['columna']."'>".$registroA['columna']."</option>";
        }
    }
    
}else{
    echo "<script>alert('Error en la conexion');</script>";
}
mysqli_close($conexionA);
}     

if ($_POST['dropdownValue']&&$_POST['modelo']){
    //call the function or execute the code
    processDrpdown($_POST['dropdownValue'],$_POST['modelo']);
}
?>