<?php
session_start();
require "/laragon/www/SWtime/privade/controllers/base.php";
require_once '/laragon/www/SWtime/privade/controllers/config.php';
require "/laragon/www/SWtime/privade/config_BD/Connection.php";

// Obtener los valores enviados por el enlace de redireccionamiento
$id_RAP = $_GET['id_RAP'];
$PROG_INICIO = $_GET['PROG_INICIO'];
$PROG_FINAL = $_GET['PROG_FINAL'];

/* 
// Imprimir los valores recibidos
echo "ID_RAP: $id_RAP <br>";
echo "PROG_INICIO: $PROG_INICIO <br>"; 
echo "PROG_FINAL : $PROG_FINAL <br>";  */

##########################################################################################################################################################################################
//boton así atrás 
echo '<a class="btn btn-danger btn-block btn-lg mb-2" href="/privade/views/session/SHARE/fichas_log/fichas_log.php" role="button">ATRAS</a>';

##########################################################################################################################################################################################

// Consulta a la base de datos para obtener la información
$sqll = "SELECT * FROM `tb_ralps` WHERE Id_RAP = '$id_RAP' AND PROG_INICIO = '$PROG_INICIO'";
$resultt = mysqli_query($conn, $sqll);

/* echo '<div class="table-responsive">'; */
// Verificar si se encontraron resultados
if (mysqli_num_rows($resultt) > 0) {
    // Imprimir la tabla HTML
    echo "<table class='table table-bordered table-dark table-responsive'>";
    echo "<tr>";
    echo "<th>ID_AI</th>";
    echo "<th>PROG_ACTION</th>";
    echo "<th>ID_PROGRAMA</th>";
    echo "<th>ID_FICHA</th>";
    echo "<th>NIVEL_FORMACION</th>";
    echo "<th>PROGRAMA</th>";
    echo "<th>ID_COMPETENCIA</th>";
    echo "<th>COMPETENCIA</th>";
    echo "<th>Id_RAP</th>";
    echo "<th>PROGRAMACION_DETALLE_(RAP)</th>";
    echo "<th>AMBIENTE</th>";
    echo "<th>INSTRUCTOR_ASIGNADO</th>";
    echo "<th>PROG_INICIO</th>";
    echo "<th>PROG_FINAL</th>";
    echo "<th>LUNES</th>";
    echo "<th>MARTES</th>";
    echo "<th>MIERCOLES</th>";
    echo "<th>JUEVES</th>";
    echo "<th>VIERNES</th>";
    echo "<th>SABADO</th>";
    echo "<th>DOMINGO</th>";
    echo "<th>PROG_ESTADO</th>";
    echo "<th>HORARIO DE FORMACION</th>";
    echo "<th>TITULO_FICHA</th>";
    echo "<th>FECHA FIN ETAPA LECTIVA</th>";
    echo "<th>Id_Ficha_RAP</th>";
    echo "<th>Item Type</th>";
    echo "<th>Path</th>";
    echo "</tr>";

    // Iterar sobre los resultados obtenidos
    while ($rowss = mysqli_fetch_assoc($resultt)) {
        // Imprimir una fila de la tabla HTML con los valores obtenidos
        echo "<tr>";
        foreach ($rowss as $valuee) {
            echo "<td>" . $valuee . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    echo '</div>';
} else {
    echo "No se encontraron resultados.";
}


##########################################################################################################################################################################################
$sql = "SELECT * FROM `tb_ralps` WHERE Id_RAP = '$id_RAP' AND PROG_INICIO = '$PROG_INICIO'";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Creamos un array para almacenar los resultados
    $data = array();

    // Recorremos los resultados y los almacenamos en el array
    while ($row = mysqli_fetch_assoc($result)) {
        $start = DateTime::createFromFormat('d/m/Y', $PROG_INICIO);
        $end = DateTime::createFromFormat('d/m/Y', $PROG_FINAL)->modify('+1 day');

        $interval = DateInterval::createFromDateString('1 day');
        $daterange = new DatePeriod($start, $interval, $end);

        // Definir los horarios de trabajo para cada día de la semana
        $horarios = array();

        // Función para obtener las horas trabajadas según el día de la semana y la fecha
       // Función para obtener las horas trabajadas según el día de la semana y la fecha
function obtenerHorasTrabajadas($dayOfWeek)
{
    global $row;

    switch ($dayOfWeek) {
        case 1: // Lunes
            return calcularHorasTrabajadas($row['LUNES']);
        case 2: // Martes
            return calcularHorasTrabajadas($row['MARTES']);
        case 3: // Miércoles
            return calcularHorasTrabajadas($row['MIERCOLES']);
        case 4: // Jueves
            return calcularHorasTrabajadas($row['JUEVES']);
        case 5: // Viernes
            return calcularHorasTrabajadas($row['VIERNES']);
        case 6: // Sábado
            return calcularHorasTrabajadas($row['SABADO']);
        case 7: // Domingo
            return calcularHorasTrabajadas($row['DOMINGO']);
        default:
            return "";
    }
}

// Función para calcular las horas trabajadas a partir del formato "18:00 - 23:00"
function calcularHorasTrabajadas($horas)
{
    if (strpos($horas, '-') !== false) {
        $horasArray = explode('-', $horas);
        $horaInicio = trim($horasArray[0]);
        $horaFin = trim($horasArray[1]);

        $horaInicioArray = explode(':', $horaInicio);
        $horaFinArray = explode(':', $horaFin);

        $horaInicioHoras = intval($horaInicioArray[0]);
        $horaInicioMinutos = intval($horaInicioArray[1]);

        $horaFinHoras = intval($horaFinArray[0]);
        $horaFinMinutos = intval($horaFinArray[1]);

        if ($horaFinHoras < $horaInicioHoras) {
            $horaFinHoras += 24; // Ajustar para incluir las horas del día siguiente
        }

        $horasTrabajadas = ($horaFinHoras - $horaInicioHoras) + (($horaFinMinutos - $horaInicioMinutos) / 60);

        return $horasTrabajadas;
    }

    return "";
}

// Función para obtener el nombre del día de la semana
function obtenerNombreDiaSemana($dayOfWeek)
{
    $diasSemana = array(
        1 => 'Lunes',
        2 => 'Martes',
        3 => 'Miércoles',
        4 => 'Jueves',
        5 => 'Viernes',
        6 => 'Sábado',
        7 => 'Domingo'
    );

    return $diasSemana[$dayOfWeek];
}

// Generate the first table
echo '<table border="1" class="table table-bordered table-dark table-hover table-striped text-center">';
echo '<tr>';
echo '<th>Fecha</th>';
echo '<th>Día de la semana</th>';
echo '<th>Horas trabajadas</th>';
echo '</tr>';

foreach ($daterange as $date) {
    $dayOfWeek = $date->format("N");
    $horasTrabajadas = obtenerHorasTrabajadas($dayOfWeek);

    if (!empty($horasTrabajadas)) {
        echo "<tr>";
        echo "<td>" . $date->format("d-m-Y") . "</td>";
        echo "<td>" . obtenerNombreDiaSemana($dayOfWeek) . "</td>";
        echo "<td>" . $horasTrabajadas . "</td>";
        echo "</tr>";
    }
}

echo '</table>';

// Generate the second table
echo '<br>';

echo '<table border="3" class="table table-bordered table-dark table-hover table-striped text-center">';
echo '<tr>';
echo '<th>Tipo de día</th>';
echo '<th>Número de días</th>';
echo '<th>Horas trabajadas por día</th>';
echo '<th>Total de horas trabajadas</th>';
echo '</tr>';

$totalHoras = 0;
$totalDias = 0;

foreach ($daterange as $date) {
    $dayOfWeek = $date->format("N");
    $horasTrabajadas = obtenerHorasTrabajadas($dayOfWeek);

    if (!empty($horasTrabajadas)) {
        $totalHoras += $horasTrabajadas;
        $totalDias++;
    }
}

echo '<tr>';
echo '<td>Total</td>';
echo '<td>' . $totalDias . '</td>';
echo '<td>' . $horasTrabajadas . ' </td>';
echo '<td>' . $totalHoras . ' horas</td>';
echo '</tr>';

echo '</table>';
    }
} else {
    // Manejo del error si la consulta no se ejecuta correctamente
    echo "Error en la consulta: " . mysqli_error($conn);
}



######################################################################################################################################

/* //muy importante 

// Suponiendo que tienes las fechas en las variables $PROG_INICIO y $PROG_FINAL

// Array de fechas
$fechas = array($PROG_INICIO, $PROG_FINAL);

// Recorrer el array de fechas
foreach ($fechas as &$fecha) {
    // Eliminar " 0:00" de la fecha si está presente
    if (strpos($fecha, ' 0:00') !== false) {
        $fecha = str_replace(' 0:00', '', $fecha);
    }
}

// $PROG_INICIO sin la hora
$inicioSinHora = $fechas;

// $PROG_FINAL sin la hora
$finalSinHora = $fechas;

// Hacer algo con $inicioSinHora y $finalSinHora
// ...
 */

######################################################################################################################################
?>