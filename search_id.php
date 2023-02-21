<?php
##########################################################################
/* this is the connection with the data base  */  
$inc=include "Connection.php"; 
##########################################################################
/* this checks the data from the form */
 if (isset($_POST['id'])) {
  $id = $_POST['id'];
// Resto del código para consultar la información de la base de datos
}   else {
  echo "El parámetro 'id' no se ha proporcionado en la URL";
} 

##########################################################################
    
$sql = "SELECT * FROM tb_2023 WHERE id = $id";
$result = mysqli_query($conn, $sql); 

if (mysqli_num_rows($result) > 0) {
  // Almacenar cada resultado en un array asociativo
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $programacion_detalle = $row["PROGRAMACION_DETALLE_(RAP_"];
    $instructor_asignado = $row["INSTRUCTOR_ASIGNADO"];
    $ambiente = $row["AMBIENTE"];
    $PROG_INICIO = $row["PROG_INICIO"];
    $PROG_FINAL = $row["PROG_FINAL"];
    $lunes = $row["LUNES"];
    $martes = $row["MARTES"];
    $miercoles = $row["MIERCOLES"];
    $jueves = $row["JUEVES"];
    $viernes = $row["VIERNES"];
    $sabado = $row["SABADO"];
    $domingo = $row["DOMINGO"];
    $prog_estado = $row["PROG_ESTADO"];
  }
} else {
  echo "No se encontraron resultados para el ID proporcionado.";
}

#########################################################################################################################################################################################################


/* $start = DateTime::createFromFormat('d/m/Y',$PROG_INICIO);
$end = DateTime::createFromFormat('d/m/Y',$PROG_FINAL);
$interval = new DateInterval('P1D');
$daterange = new DatePeriod($start, $interval ,$end);

// Definimos los arreglos para cada día de la semana
$lunes = array();
$martes = array();
$miercoles = array();
$jueves = array();
$viernes = array();
$sabado = array();
$domingo = array();

// Definimos un arreglo para almacenar los arreglos de cada día de la semana
$days = array();
 */
###############################################################################################################################################
//esta es la busqueda de la inforacion a la tabla y lo que nos permite imprimir los resultados  
$sql="SELECT * from tb_2023 where id = $id";
$result=mysqli_query($conn,$sql);

while($mostrar=mysqli_fetch_array($result)){

######################################################################################################################################################
//lista de los dias check de la informacion de los nuemros diferentes
echo"<h2>INFORMACION BASE</h2> ";
echo"<br>";
echo " | lunes: ";
 echo $mostrar['LUNES'];
 echo " | martes: ";
 echo $mostrar['MARTES'];
 echo " | miercoles: ";
 echo $mostrar['MIERCOLES'];
 echo " | jueves: ";
 echo $mostrar['JUEVES'];
 echo " | viernes: ";
 echo $mostrar['VIERNES'];
 echo " | sabado: ";
 echo $mostrar['SABADO'];
 echo " | domingo: ";
 echo $mostrar['DOMINGO'];
 echo" | ";
 echo"<br><br>";
########################################################################################################################################################  
//este codigo separa los dias con 0 con los dias que tienen numero diferente 
echo"<H3>PROCESO DE SEPARACION DE LOS DIAS CON 0 DE LOS DIAS CON DIFERENTES INFORMCAION</H3>";
// Definir las variables
$lunes;
$martes; 
$miercoles; 
$jueves;
$viernes;
$sabado; 
$domingo; 

// Crear dos arrays vacíos para almacenar los días con valor 0 y los días con valor distinto
// Crear un array vacío para almacenar los días con valor distinto
// Iterar sobre cada variable
foreach (array("lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo") as $dia) {
  // Verificar si el valor de la variable es diferente a 0
  if ($$dia != 0) {
    // Almacenar el nombre del día y su valor en el array de días con valor distinto
    $dias_valor[$dia] = $$dia;
  }
}

echo "<h3>Este es el array con los días y sus valores distintos de 0:</h3>";
foreach ($dias_valor as $dia => $horario) {
  echo $dia . ": " . $horario . "<br><br>";
}
print_r($dias_valor);


######################################################################################################################################################################


// Definimos los días de la semana que queremos incluir en la lista

// Obtener un array con los días de la semana solamente
echo "<h3>este 2 array me separa la informacion y solo me deja los dias de la semana</h3>";
$dias_semana = array_keys($dias_valor);
echo implode(", ", $dias_semana);
echo "<br><br>";
####################################################################################################################################################################
//dias de la semana pero en nuemros 
$daysOfWeek = array("lunes" => 1, "martes" => 2, "miércoles" => 3, "jueves" => 4, "viernes" => 5, "sábado" => 6, "domingo" => 7);
$dias_semana = array_keys($dias_valor);

// Convertimos los días de la semana en números del 1 al 7
$dias_numeros = array_map(function($dia) use ($daysOfWeek) {
    return $daysOfWeek[$dia];
}, $dias_semana);

// Imprimimos los días de la semana como números del 1 al 7, separados por coma
echo implode(", ", $dias_numeros);

####################################################################################################################################################################
$start = DateTime::createFromFormat('d/m/Y',$PROG_INICIO);
$end = DateTime::createFromFormat('d/m/Y',$PROG_FINAL);

// Creamos un intervalo de un día
$interval = new DateInterval('P1D'); // P1D significa "un día"

// Creamos un objeto de período que recorre el rango de fechas con el intervalo dado
$daterange = new DatePeriod($start, $interval ,$end);

// Creamos un arreglo vacío para almacenar los días de la semana que se tienen en cuenta
$dias_semana = array(
    1 => 'lunes',
    2 => 'martes',
    3 => 'miércoles',
    4 => 'jueves',
    5 => 'viernes',
    6 => 'sábado',
    7 => 'domingo'
);

// Creamos un arreglo vacío para almacenar las fechas de los días de la semana que se tienen en cuenta
$fechas_semana = array();

// Iteramos a través de cada fecha en el rango de fechas
foreach($daterange as $date){

    // Obtenemos el número del día de la semana en formato ISO (1 a 7, donde 1 es lunes y 7 es domingo)
    $dayOfWeek = $date->format("N"); // N es el formato para día de la semana

    // Si el día de la semana se encuentra en el arreglo $dias_numeros, agregamos la fecha al arreglo correspondiente
    if (in_array($dayOfWeek, $dias_numeros)) {
        $dia = $dias_semana[$dayOfWeek];
        $fechas_semana[$dia][] = $date->format("d-m");
    }
}

// Imprimimos los días que se tienen en cuenta, separados por coma
foreach ($fechas_semana as $dia => $fechas) {
    echo "Los ".$dia." son: " . implode(", ", $fechas) . "\n";
}

?>




<!--#######################################################################################################################################################-->
 <!--este html con php genera la busqueda de la tabla basandose en el id ingresado anteriormente y tambien crea una tabla con las respuestas-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>

<br><br><br><br>

<table border="1">
    <tr>
        <td>id</td>
        <td>clase</td>
        <td>instructor</td>
        <td>salon</td>
        <td>fecha1</td>
        <td>fecha2</td>
        <td>LUNES</td>
        <td>MARTES</td>
        <td>mMIERCOLES</td>
        <td>JUEVES</td>
        <td>VIERNES</td>
        <td>SABADO</td>
        <td>DOMINGO</td>
        <td>estado</td>
    </tr>
<!--############################################################################################################################################################################-->
    
<!--############################################################################################################################################################################-->        
    <tr>
    <td><?php echo $mostrar['id']?></td>
    <td><?php echo $mostrar['PROGRAMACION_DETALLE_(RAP_']?></td>
    <td><?php echo $mostrar['INSTRUCTOR_ASIGNADO']?></td>
    <td><?php echo $mostrar['AMBIENTE']?></td>
    <td><?php echo $mostrar['PROG_INICIO']?></td>
    <td><?php echo $mostrar['PROG_FINAL']?></td>
    <td><?php echo $mostrar['LUNES']?></td>
    <td><?php echo $mostrar['MARTES']?></td>
    <td><?php echo $mostrar['MIERCOLES']?></td>
    <td><?php echo $mostrar['JUEVES']?></td>
    <td><?php echo $mostrar['VIERNES']?></td>
    <td><?php echo $mostrar['SABADO']?></td>
    <td><?php echo $mostrar['DOMINGO']?></td>
    <td><?php echo $mostrar['PROG_ESTADO']?></td>
    </tr>
<!--############################################################################################################################################################################-->
  <?php      
    }
    ?>
<!--############################################################################################################################################################################-->    
</table>
<br><br>
<!--############################################################################################################################################################################-->
<?php
/* 
echo "Los lunes son: " . implode(", ", $lunes) . "\n";
echo "<br><br>";
echo "Los martes son: " . implode(", ", $martes) . "\n";
echo "<br><br>";
echo "Los miércoles son: " . implode(", ", $miercoles) . "\n";
echo "<br><br>";
echo "Los jueves son: " . implode(", ", $jueves) . "\n";
echo "<br><br>";
echo "Los viernes son: " . implode(", ", $viernes) . "\n";
echo "<br><br>";
echo "Los sábados son: " . implode(", ", $sabado) . "\n";
echo "<br><br>";
echo "Los domingos son: " . implode(", ", $domingo) . "\n";
echo "<br><br><br><br>"; */

?>
<!--############################################################################################################################################################################-->

<!--############################################################################################################################################################################-->
</body>
</html>
