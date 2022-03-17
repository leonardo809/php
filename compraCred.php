<?PHP
	$hostname_localhost ="68.70.164.26";
	$database_localhost ="polizona_57";
	$username_localhost ="polizona_57";
	$password_localhost ="Calvillo-57";
	$json=array();
       // include("index.html"); 

echo '<head><script type="module" src="footer.js"></script>
<script type="module" src="./nav.js"></script>
<script src="./bootstrap.min.js"></script>
<link rel="stylesheet" href="./bootstrap.min.css"><head>';
echo'<mi-nav></mi-nav>';
//realiza conexion
    $conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
        
        if ($conexion) {
            $idEmpresa= $_POST ['idEmpresa'];
            $tInsumoA= $_POST ['totCompra'];
            
            //Bloquear registros vacios
            if ($_POST["idEmpresa"]!==""){
                //registro a DB
               $consulta="call compraCred('$idEmpresa','$totCompra')";
            } else {
               echo '<div class="alert alert-warning" role="alert">
			   Llene los campos completos
			 </div> <br>';
            }
            $registro=mysqli_query($conexion,$consulta);
                //Confirmacion
               if ($registro) {
		mysqli_close($conexion);
                 echo '<div class="alert alert-success" role="alert">
				 Registro almacenado
			   </div> <br>';
               }
            else {
               echo '<div class="alert alert-danger" role="alert">
			   Error en la ejecución del registro
			 </div> <br>';
            }
        }
		
$conexionA = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	$consultaA="select * from asiento order by idasiento;";
		$resultadoA=mysqli_query($conexionA,$consultaA);
		if($conexionA){
			echo '<table class="table table-striped">';
			echo "<th> idempresa</th>";
			echo "<th> idasiento</th>";
			echo "<th> fecasiento</th>";
			echo "<th> idoperacion</th>";
			echo "<th> monto</th>";
			
			while($registroA=mysqli_fetch_array($resultadoA)){
				$result["idempresa"]=$registroA['idempresa'];
				$result["idasiento"]=$registroA['idasiento'];
				$result["fecasiento"]=$registroA['fecasiento'];
				$result["idoperacion"]=$registroA['idoperacion'];
				$result["monto"]=$registroA['monto'];
				$json['Clasificador'][]=$result;
				
				echo "<tr>";
					echo "<td>".$registroA['idempresa']." </td>";
					echo "<td>".$registroA['idasiento']." </td>";
					echo "<td>".$registroA['fecasiento']." </td>";
					echo "<td>".$registroA['idoperacion']." </td>";
					echo "<td>".$registroA['monto']." </td>";
				echo "</tr>";
			}
			
			echo "</table>";
			
			json_encode($json);
			mysqli_close($conexionA);
		}
		else{
			echo '<div class="alert alert-danger" role="alert">
			Error
		  </div> <br>';
		}
		
$conexionAb = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	$consultaAb="select * from abono order by idasiento;";
		$resultadoAb=mysqli_query($conexionAb,$consultaAb);
		if($conexionAb){
			echo '<table class="table table-dark table-striped">';
			echo "<th> idempresa</th>";
			echo "<th> idasiento</th>";
			echo "<th> idabono</th>";
			echo "<th> idcuenta</th>";
			echo "<th> monto</th>";
			
			while($registroAb=mysqli_fetch_array($resultadoAb)){
				$result["idempresa"]=$registroAb['idempresa'];
				$result["idasiento"]=$registroAb['idasiento'];
				$result["idabono"]=$registroAb['idabono'];
				$result["idcuenta"]=$registroAb['idcuenta'];
				$result["monto"]=$registroAb['monto'];
				$json['Clasificador'][]=$result;
				
				echo "<tr>";
					echo "<td>".$registroAb['idempresa']." </td>";
					echo "<td>".$registroAb['idasiento']." </td>";
					echo "<td>".$registroAb['idabono']." </td>";
					echo "<td>".$registroAb['idcuenta']." </td>";
					echo "<td>".$registroAb['monto']." </td>";
				echo "</tr>";
			}
			
			echo "</table>";
			
			json_encode($json);
			mysqli_close($conexionAb);
		}
		else{
			echo '<div class="alert alert-danger" role="alert">
			Error
		  </div> <br>';
		}
		
		
$conexionC = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	$consultaC="select * from cargo order by idasiento;";
		$resultadoC=mysqli_query($conexionC,$consultaC);
		if($conexionC){
			echo "<table class='table table-success table-striped'>";
			echo "<th> idempresa</th>";
			echo "<th> idasiento</th>";
			echo "<th> idcargo</th>";
			echo "<th> idcuenta</th>";
			echo "<th> monto</th>";
			
			while($registroC=mysqli_fetch_array($resultadoC)){
				$result["idempresa"]=$registroC['idempresa'];
				$result["idasiento"]=$registroC['idasiento'];
				$result["idcargo"]=$registroC['idcargo'];
				$result["idcuenta"]=$registroC['idcuenta'];
				$result["monto"]=$registroC['monto'];
				$json['Clasificador'][]=$result;
				
				echo "<tr>";
					echo "<td>".$registroC['idempresa']." </td>";
					echo "<td>".$registroC['idasiento']." </td>";
					echo "<td>".$registroC['idcargo']." </td>";
					echo "<td>".$registroC['idcuenta']." </td>";
					echo "<td>".$registroC['monto']." </td>";
				echo "</tr>";
			}
			
			echo "</table>";
			
			json_encode($json);
			mysqli_close($conexionC);
		}
		else{
			echo '<div class="alert alert-danger" role="alert">
			Error
		  </div> <br>';
		}
			
            echo '<mi-footer></mi-footer>';
	?>