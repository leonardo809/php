<?php
function crearvista($tabla,$campo1,$campo2) {
    include("conexion.php");
    $conexionA=conectar();
if ($conexionA) {
    $consulta="create or replace view conjuntas as (select ".$campo1.", ".$campo2.", count(*)/(select count(*) from ".$tabla.") as conjunta from ".$tabla." where ".$campo1." in(select distinct ".$campo1." from ".$tabla.") and ".$campo2." in(select distinct ".$campo2." from ".$tabla.") group by ".$campo2.", ".$campo1." order by ".$campo1.", ".$campo2.")";
            $registro=mysqli_query($conexionA,$consulta);
            if ($registro) {
                         echo '<div class="alert alert-success" role="alert">
                         Su tabla ha sido creada
                       </div>';
                        }
                    else {
                       echo '<div class="alert alert-danger" role="alert">
                       error en la creación de la tabla
                     </div>';
                    }
}else{
    echo "<script>alert('Error en la conexion');</script>";
}
mysqli_close($conexionA);
}        
    

if ($_POST['tabla1'] && $_POST['combo1'] && $_POST['combo2']){
    //call the function or execute the code
    crearvista($_POST['tabla1'],$_POST['combo1'],$_POST['combo2']);
    
}
?>