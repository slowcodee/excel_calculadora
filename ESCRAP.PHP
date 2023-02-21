<?php

/* 
$dias_semana = array("lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo");

if ($dayOfWeek == 1 && !empty($lunes)) {
  $lunes[] = $date->format("d-m");
}elseif ($dayOfWeek == 2 && !empty($martes)) {
  $martes[] = $date->format("d-m");
}elseif ($dayOfWeek == 3 && !empty($miercoles)) {
  $miercoles[] = $date->format("d-m");
}elseif ($dayOfWeek == 4 && !empty($jueves)) {
  $jueves[] = $date->format("d-m");
}elseif ($dayOfWeek == 5 && !empty($viernes)) {
  $viernes[] = $date->format("d-m");
}elseif ($dayOfWeek == 6 && !empty($sabado)) {
  $sabado[] = $date->format("d-m");
}elseif ($dayOfWeek == 7 && !empty($domingo)) {
  $domingo[] = $date->format("d-m");
}

foreach($daterange as $date){
    $dayOfWeek = $date->format("N");
    if ($dayOfWeek == 1) {
        $lunes[] = $date->format("d-m");
    } elseif ($dayOfWeek == 2) {
        $martes[] = $date->format("d-m");
    } elseif ($dayOfWeek == 3) {
        $miercoles[] = $date->format("d-m");
    } elseif ($dayOfWeek == 4) {
        $jueves[] = $date->format("d-m");
    } elseif ($dayOfWeek == 5) {
        $viernes[] = $date->format("d-m");
    } elseif ($dayOfWeek == 6) {
        $sabado[] = $date->format("d-m");
    } elseif ($dayOfWeek == 7) {
        $domingo[] = $date->format("d-m");
    }
}
 */

/* $horas_lunes = count($lunes) * 0; //4 horas de trabajo los lunes de 18:00 a 22:00
$horas_martes = count($martes) * 0;
$horas_miercoles = count($miercoles) * 0;
$horas_jueves = count($jueves) * 0;
$horas_viernes = count($viernes) * 0; //6 horas de trabajo los viernes de 8:00 a 14:00
$horas_sabado = count($sabado) * 0;
$horas_domingo = count($domingo) * 0;

$horas_totales = $horas_lunes + $horas_martes + $horas_miercoles + $horas_jueves + $horas_viernes + $horas_sabado + $horas_domingo;

echo "El número total de horas trabajadas es: " . $horas_totales . " horas\n";
 */


##########################################################################################################################################
/* //variables para la parte logica.
$start = DateTime::createFromFormat('d/m/Y',$PROG_INICIO);  // Se crea un nuevo objeto DateTime para la fecha de inicio, ejemplo: el 6 de febrero de 2023
$end = DateTime::createFromFormat('d/m/Y',$PROG_FINAL);  // Se crea un nuevo objeto DateTime para la fecha de finalización, ejemplo: el 31 de marzo de 2023
$interval = new DateInterval('P1D'); // Se crea un objeto DateInterval para representar un intervalo de un día, esto se almacena en la variable $interval
$daterange = new DatePeriod($start, $interval ,$end); // Se crea un objeto DatePeriod que representa un rango de fechas usando el objeto de inicio, el intervalo de tiempo y la fecha final
$lunes = array($lunes); // Se crea un array vacío llamado lunes
$martes = array(); // Se crea otro array vacío llamado martes
$miercoles = array(); // Se crea otro array vacío llamado miercoles
$jueves = array(); // Se crea otro array vacío llamado jueves
$viernes = array(); // Se crea otro array vacío llamado viernes
$sabado = array(); // Se crea otro array vacío llamado sabado
$domingo = array(); // Se crea otro array vacío llamado domingo */
##########################################################################
 /* 
if($inc){
  $consulta = "SELECT * FROM tb_2023";
  $resultado = mysquli_query($conn,$consulta);
  if($resultado){
    while($row = $resultado->fetch_array())
    $id = $row['id'];
  }
} 
 */

/*
//esto hace la busqueda en la tabla solo si el id=numero ingrsado son correctos osea estan en la bd
$sql = "SELECT * FROM tb_2023 WHERE id = $id";
//esto almacena la busqueda echa en la tabla 
$result=mysqli_query($conn,$sql);

 
echo "<h1>$resultado</h1>"; */ 
#############################################################################################################################################################################
/* <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>


<table border="1">
    <tr>
        <th>Fecha</th>
        <th>Día de la semana</th>
    </tr>

    <?php */

   /*  $start = new DateTime('2023-02-06'); // Establece la fecha de inicio del intervalo como 2023-02-06
    $end = new DateTime('2023-03-31'); // Establece la fecha de fin del intervalo como 2023-03-31
    $interval = new DateInterval('P1D'); // Establece el intervalo como un día (P1D significa "periodo de 1 día")
    $daterange = new DatePeriod($start, $interval ,$end); // Crea un objeto DatePeriod para el intervalo establecido
    $lunes = array(); // Inicializa un array para almacenar las fechas que corresponden a los lunes
    $martes = array();// Inicializa un array para almacenar las fechas que corresponden a los martes
    $miercoles = array(); // Inicializa un array para almacenar las fechas que corresponden a los miércoles
    $jueves = array();// Inicializa un array para almacenar las fechas que corresponden a los jueves
    $viernes = array();// Inicializa un array para almacenar las fechas que corresponden a los viernes
    $sabado = array();// Inicializa un array para almacenar las fechas que corresponden a los sabado
    $domingo = array(); // Inicializa un array para almacenar las fechas que corresponden a los domingo



    foreach($daterange as $date){ // Itera sobre el intervalo de fechas
        $dayOfWeek = $date->format("N"); // Obtiene el número del día de la semana (1 a 7, donde 1 es lunes y 7 es domingo)
        if ($dayOfWeek == 1) { // Si es lunes
            $lunes[] = $date->format("d-m"); // Agrega la fecha (en formato "d-m") al array de lunes
            echo "<tr>";
            echo "<td>" . $date->format("d-m-Y") . "</td>"; // Imprime la fecha en formato "d-m-Y" en una celda de la tabla
            echo "<td>" . "Lunes" . "</td>"; // Imprime "Lunes" en otra celda de la tabla
            echo "</tr>";
        } elseif ($dayOfWeek == 2) { // Si es martes
            $martes[] = $date->format("d-m"); // Agrega la fecha (en formato "d-m") al array de martes
            echo "<tr>";
            echo "<td>" . $date->format("d-m-Y") . "</td>"; // Imprime la fecha en formato "d-m-Y" en una celda de la tabla
            echo "<td>" . "Martes" . "</td>"; // Imprime "Martes" en otra celda de la tabla
            echo "</tr>";
        }elseif ($dayOfWeek == 3) { // Si es miércoles
            $miercoles[] = $date->format("d-m"); // Agrega la fecha (en formato "d-m") al array de miércoles
            echo "<tr>";
            echo "<td>" . $date->format("d-m-Y") . "</td>"; // Imprime la fecha en formato "d-m-Y" en una celda de la tabla
            echo "<td>" . "Miércoles" . "</td>"; // Imprime "Miércoles" en otra celda de la tabla
            echo "</tr>";
        }elseif ($dayOfWeek == 4) { // Si es jueves
            $jueves[] = $date->format("d-m"); // Agrega la fecha (en formato "d-m") al array de jueves
            echo "<tr>";
            echo "<td>" . $date->format("d-m-Y") . "</td>"; // Imprime la fecha en formato "d-m-Y" en una celda de la tabla
            echo "<td>" . "jueves" . "</td>"; // Imprime "Miércoles" en otra celda de la tabla
            echo "</tr>";
        }elseif ($dayOfWeek == 5) { // Si es viernes
            $viernes[] = $date->format("d-m"); // Agrega la fecha (en formato "d-m") al array de viernes
            echo "<tr>";
            echo "<td>" . $date->format("d-m-Y") . "</td>"; // Imprime la fecha en formato "d-m-Y" en una celda de la tabla
            echo "<td>" . "viernes" . "</td>"; // Imprime "viernes" en otra celda de la tabla
            echo "</tr>";
        }elseif ($dayOfWeek == 6) { // Si es sabado
            $sabado[] = $date->format("d-m"); // Agrega la fecha (en formato "d-m") al array de sabado
            echo "<tr>";
            echo "<td>" . $date->format("d-m-Y") . "</td>"; // Imprime la fecha en formato "d-m-Y" en una celda de la tabla
            echo "<td>" . "sabado" . "</td>"; // Imprime "sabado" en otra celda de la tabla
            echo "</tr>";
        }elseif ($dayOfWeek == 7) { // Si es domingo
            $domingo[] = $date->format("d-m"); // Agrega la fecha (en formato "d-m") al array de domingo
            echo "<tr>";
            echo "<td>" . $date->format("d-m-Y") . "</td>"; // Imprime la fecha en formato "d-m-Y" en una celda de la tabla
            echo "<td>" . "domingo" . "</td>"; // Imprime "domingo" en otra celda de la tabla
            echo "</tr>";
        }
    }
###################################################################################################################################################################

// Definimos un arreglo para almacenar los arreglos de cada día de la semana
$days = array();

// Separamos las fechas por día de la semana
foreach ($daterange as $date) {
  $dayOfWeek = $date->format("N");
  switch ($dayOfWeek) {
      case '1':
          $lunes[] = $date->format("d-m");
          break;
      case '2':
          $martes[] = $date->format("d-m");
          break;
      case '3':
          $miercoles[] = $date->format("d-m");
          break;
      case '4':
          $jueves[] = $date->format("d-m");
          break;
      case '5':
          $viernes[] = $date->format("d-m");
          break;
      case '6':
          $sabado[] = $date->format("d-m");
          break;
      case '7':
          $domingo[] = $date->format("d-m");
          break;
  }
}

// Almacenamos los arreglos de cada día de la semana en un arreglo principal
if (!empty($lunes)) {
  $days['Lunes'] = $lunes;
}
if (!empty($martes)) {
  $days['Martes'] = $martes;
}
if (!empty($miercoles)) {
  $days['Miércoles'] = $miercoles;
}
if (!empty($jueves)) {
  $days['Jueves'] = $jueves;
}
if (!empty($viernes)) {
  $days['Viernes'] = $viernes;
}
if (!empty($sabado)) {
  $days['Sábado'] = $sabado;
}
if (!empty($domingo)) {
  $days['Domingo'] = $domingo;
}

// Recorremos los arreglos de los días de la semana y realizamos los intervalos
foreach ($days as $dayOfWeek => $day) {
  // Verificamos si el arreglo está vacío o tiene valores iguales a 0
  if (empty($day) || count(array_filter($day, function($value) { return $value > 0; })) == 0) {
    continue;
  }
  
  echo "Día de la semana: $dayOfWeek\n";
  echo "Fechas: " . implode(", ", $day) . "\n";

  $num_days = count($day);
  if ($num_days == 1) {
    echo "Intervalo: " . $day[0] . " - " . $day[0] . "\n";
  } else {
    $i = 0;
    while ($i < $num_days) {
      $start_date = $day[$i
];
$j = $i + 1;
while ($j < $num_days && (strtotime($day[$j]) - strtotime($day[$j-1])) == 86400) {
$j++;
}
$end_date = $day[$j-1];
echo "Intervalo: " . $start_date . " - " . $end_date . "\n";
$i = $j;
}
}
}








 */
/*     ?>
</table>

<br>

<table border="1">
    <tr>
        <th>Tipo de día</th>
        <th>Número de días</th>
        <th>Horas trabajadas</th>
    </tr>
    <tr>
        <td>Lunes</td> <!-- Imprime "Lunes" en una celda de la tabla -->
        <td><?php echo count($lunes); ?></td> <!-- Imprime el número de fechas en el array de lunes en otra celda de la tabla -->
        <td><?php echo count($lunes) * (6 + (30/60)); ?> horas</td> <!-- Calcula y muestra el número de horas trabajadas en los lunes en otra celda de la tabla -->
    </tr>
    <tr>
        <td>Miércoles</td> <!-- Imprime "Miércoles" en una celda de la tabla

?> */
/* </body>
</html> */
############################################################################################################################################################################################
//este codigo separa los dias con numeros diferentes y junta a los dias que tenga dias iguales 
/* <?php

$lunes = 06;
$martes = 0;
$miercoles = 0;
$jueves = 06;
$viernes = 0;
$sabado = 0;
$domingo = 04;

$days = array(
    'lunes' => $lunes,
    'martes' => $martes,
    'miercoles' => $miercoles,
    'jueves' => $jueves,
    'viernes' => $viernes,
    'sabado' => $sabado,
    'domingo' => $domingo
);

$igual = array();
$diferente = array();

foreach ($days as $day => $value) {
  if (in_array($value, $igual)) {
    // Si el valor ya se encuentra en el array $igual, no se hace nada
  } elseif (in_array($value, $diferente)) {
    // Si el valor ya se encuentra en el array $diferente, no se hace nada
  } elseif (count(array_keys($days, $value)) > 1) {
    // Si el valor aparece más de una vez en el array original $days, se añade al array $igual
    $igual[] = $value;
  } else {
    // Si el valor no se repite en el array original $days, se añade al array $diferente
    $diferente[] = $value;
  }
}

echo "<table>";
echo "<tr><th>Días Iguales</th></tr>";

foreach ($days as $day => $value) {
    if (in_array($value, $igual)) {
        echo "<tr><td>$day</td></tr>";
    }
}

echo "</table>";

echo "<br>";

echo "<table>";
echo "<tr><th>Días Diferentes</th></tr>";

foreach ($days as $day => $value) {
    if (in_array($value, $diferente)) {
        echo "<tr><td>$day</td></tr>";
    }
}

echo "</table>";

?>  */
################################################################################################################################################################################################################