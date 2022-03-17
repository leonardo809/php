<?php
function crearvista($tabla,$campo1,$campo2,$condi) {
    include("conexion.php");
    $conexionA=conectar();
if ($conexionA) {
    $consulta="create or replace view cconjuntas as (select ".$campo1.", ".$campo2.", count(*)/(select count(*) from ".$tabla.") as conjunta from ".$tabla." where ".$condi." in(select distinct ".$campo1." from ".$tabla.") and ".$campo2." in(select distinct ".$campo2." from ".$tabla.") group by ".$campo2.", ".$campo1." order by ".$campo1.", ".$campo2.")";
            $registro=mysqli_query($conexionA,$consulta);
            if ($registro) {
                         echo '<div class="alert alert-success" role="alert">
                         Su tabla ha sido creada
                       </div>
                         ';
                         $consultaA="select * from cconjuntas";
                         $resultadoC=mysqli_query($conexionA,$consultaA);
                         echo "<table class='table table-success table-striped'>";
			                    echo "<th> ".$campo1."</th>";
			                    echo "<th> ".$campo2."</th>";
		                    	echo "<th> conjunta</th>";
		
			
			while($registroC=mysqli_fetch_array($resultadoC)){
        echo "<tr>";
					echo "<td>".$registroC[$campo1]." </td>";
					echo "<td>".$registroC[$campo2]." </td>";
					echo "<td>".$registroC['conjunta']." </td>";
				echo "</tr>";
                        }}
                    else {
                       echo '<div class="alert alert-danger" role="alert">
                       Error en la creación de la tabla
                     </div>
                       ';
                    }
}else{
    echo "<script>alert('Error en la conexion');</script>";
}
mysqli_close($conexionA);
}        
    

if ($_POST['tabla1'] && $_POST['combo1'] && $_POST['combo2'] && $_POST['condi']){
    //call the function or execute the code
    crearvista($_POST['tabla1'],$_POST['combo1'],$_POST['combo2'],$_POST['condi']);
    
}
?>