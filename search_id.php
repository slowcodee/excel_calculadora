<?php
########################################################################################################################################################  
/* this is the connection with the data base  */  
$inc=include "Connection.php"; 
########################################################################################################################################################  

/* this checks the data from the form */
if (isset($_POST['id'])) {
  $id = $_POST['id'];
// Resto del código para consultar la información de la base de datos
}   else {
  echo "El parámetro 'id' no se ha proporcionado en la URL";
} 

########################################################################################################################################################

//esta es la busqueda de la inforacion a la tabla y lo que nos permite imprimir los resultados  
$sql="SELECT * from tb_2023 where id = $id";
$result=mysqli_query($conn,$sql);
while($mostrar=mysqli_fetch_array($result)){  

########################################################################################################################################################    

$sql = "SELECT * FROM tb_2023 WHERE id = $id";
$result = mysqli_query($conn, $sql); 

if (mysqli_num_rows($result) > 0) {
  // Almacenar cada resultado en un array asociativo
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $programacion_detalle = $row["PROGRAMACION_DETALLE"];
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

########################################################################################################################################################  
//este codigo separa los dias con 0 con los dias que tienen numero diferente 
//echo"<H3>PROCESO DE SEPARACION DE LOS DIAS CON 0 DE LOS DIAS CON DIFERENTES INFORMCAION</H3>";
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
//echo"<h2>LOS DIAS DE LA SEMANA CON LA HORA Y LAS FECHAS DE TRABAO CON LOS MESES</h2>";
echo "<h3>Este es el array con los días y sus valores distintos de 0:</h3>";
foreach ($dias_valor as $dia => $horario) {
  echo $dia . ": " . $horario . "<br><br>";
} 

echo "<br><br>";
var_dump($dias_valor);
echo "<br><br>";
######################################################################################################################################################################

//dias de la semana pero en nuemros 
$daysOfWeek = array("lunes" => 1, "martes" => 2, "miercoles" => 3, "jueves" => 4, "viernes" => 5, "sabado" => 6, "domingo" => 7);
$dias_semana = array_keys($dias_valor);
// Convertimos los días de la semana en números del 1 al 7
$dias_numeros = array_map(function($dia) use ($daysOfWeek) {
    return $daysOfWeek[$dia];
}, $dias_semana);
/* // Imprimimos los días de la semana como números del 1 al 7, separados por coma
echo implode(", ", $dias_numeros);
echo "<BR><BR>"; */

####################################################################################################################################################################

$start = DateTime::createFromFormat('d/m/Y',$PROG_INICIO);
$end = DateTime::createFromFormat('d/m/Y',$PROG_FINAL)->modify('+1 day');

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

#############################################################################################################################################################


########################################################################################################################################################################################################################################*/

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
    <style>
    .tabla-izquierda {
        float: left;
        width: 45%; /* ajusta el ancho de las tablas según tus necesidades */
    }

    .tabla-derecha {
        float: right;
        width: 45%; /* ajusta el ancho de las tablas según tus necesidades */
    }
</style>
</head>
<body>

<!--############################################################################################################################################################################-->

<a href="/index.php"><p>regresar</p></a>

<!--############################################################################################################################################################################-->

<!-- tabla de la ficha -->
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
        <td>MIERCOLES</td>
        <td>JUEVES</td>
        <td>VIERNES</td>
        <td>SABADO</td>
        <td>DOMINGO</td>
        <td>estado</td>
    </tr>
<br><br>
    <tr>
    <td><?php echo $mostrar['id']?></td>
    <td><?php echo $mostrar['PROGRAMACION_DETALLE']?></td>
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

</table>
<?php }; ?>

<!--############################################################################################################################################################################-->

<!--esta tabla pone los dias en orden con el dia y la fecha-->
<br>
<table border="1" class="tabla-izquierda">
  <tr>
    <th>id</th>
    <th>Fecha</th>
    <th>horas</th>
  </tr>

  <?php
#########################################################################################################################################################################################################################
// Creamos un array vacío para almacenar las fechas ordenadas
$fechas_ordenadas = array();

// Iteramos a través de cada día de la semana en el array $fechas_semana
foreach ($fechas_semana as $dia => $fechas) {
    // Iteramos a través de cada fecha en el día de la semana actual
    foreach ($fechas as $fecha) {
        // Convertimos la fecha al formato "d-m-Y" y le agregamos el año 2023 para estandarizarlo
        $fecha_ordenada = date("d-m-Y", strtotime($fecha."-2023"));

#######################################################################################      
/*       foreach ($dias_valor as $dia => $horas_trabajo) {
        // Verificamos si hay horas de trabajo para este día
        if (!empty($horas_trabajo)) {
            // hacer algo con las horas de trabajo, como imprimirlas
            echo "El día $dia hay $horas_trabajo horas de trabajo asignadas. <br>";
        } else {
            // hacer algo si no hay horas de trabajo asignadas para este día
            echo "No hay horas $dia. <br>";
        }
    } */
##################################################################################
        // Agregamos la fecha, día de la semana y horas de trabajo a un nuevo array
        $fechas_ordenadas[] = array(
            "fecha" => $fecha_ordenada,
            "dia" => $dia,/* 
            "horas" => $horas_trabajo */
        );
    }
}

// Ordenamos las fechas en el array $fechas_ordenadas de forma ascendente utilizando la función usort
usort($fechas_ordenadas, function($a, $b) {
    return strtotime($a["fecha"]) - strtotime($b["fecha"]);
});
?>
<!--############################################################################################################################################################################-->
<!-- Iteramos a través de cada fecha en el array $fechas_ordenadas y generamos una fila en la tabla para cada una -->
<?php foreach ($fechas_ordenadas as $fecha) { ?>
        <tr>
            <td><?php echo $fecha["fecha"]; ?></td>
            <td><?php echo ucfirst($fecha["dia"]); ?></td>
            <td><?php echo"horas de trabajo working on";/* echo $fecha["horas"]; */ ?></td>
        </tr>
    <?php } ?>
</table>

<!--############################################################################################################################################################################-->

<!--esta tabla pone el listado de las fechas junto al dia-->
<br>
<table border="1" class="tabla-derecha">
  <tr>
    <th>Día de la semana</th>
    <th>Fechas</th>
  </tr>
  <?php foreach ($fechas_semana as $dia => $fechas) : ?>
    <tr>
      <td><?= "Los ".$dia." son:" ?></td>
      <td><?= implode(", ", $fechas) ?></td>
    </tr>
  <?php endforeach;?>
</table>

<!--############################################################################################################################################################################-->

</body>
</html> 
