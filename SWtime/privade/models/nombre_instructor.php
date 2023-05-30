<?php
session_start();
/* header('Location: /privade/views/session/nombre_instructorVW.php');*/    
#########################################################################################################################

include "/laragon/www/excel_nombre/private/Connection.php";

// Verificar si se ha enviado el nombre a través del formulario
if(isset($_POST["nombre"])){
    $nombre = $_POST['nombre'];
} else {
    echo "El nombre no existe.";
}

// Consultar la base de datos para obtener los registros con el nombre especificado
$sql = "SELECT * FROM `tb_2023` WHERE `INSTRUCTOR_ASIGNADO` = '$nombre'";
$result = mysqli_query($conn, $sql);

// Verificar si ocurrió un error al ejecutar la consulta
if (!$result) {
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
    exit;
}

$data = array(); // Crear un array vacío para almacenar los datos

// Recorrer los resultados de la consulta y añadir cada fila al array
while ($mostrar = mysqli_fetch_array($result)) {
    $data[] = $mostrar;
}

$_SESSION['data'] = $data; // Guardar el array en la variable de sesión para usarlo posteriormente

// Obtener los valores de la última fila obtenida (¿Quizás debes usar solo uno de estos? No se sabe con certeza sin más contexto)
while ($fila = mysqli_fetch_assoc($result)) {
    $id = $fila['id'];
    $programacion_detalle = $fila['PROGRAMACION_DETALLE'];
    $instructor_asignado = $fila['INSTRUCTOR_ASIGNADO'];
    $ambiente = $fila['AMBIENTE'];
    $prog_inicio = $fila['PROG_INICIO'];
    $prog_final = $fila['PROG_FINAL'];
    $lunes = $fila['LUNES'];
    $martes = $fila['MARTES'];
    $miercoles = $fila['MIERCOLES'];
    $jueves = $fila['JUEVES'];
    $viernes = $fila['VIERNES'];
    $sabado = $fila['SABADO'];
    $domingo = $fila['DOMINGO'];
    $prog_estado = $fila['PROG_ESTADO'];
}

$ids = array_column($data, 'id'); // Obtener un array con los valores de la columna 'id' del array de datos

var_dump($ids); // Imprimir el contenido del array de IDs (solo para fines de depuración)

?>

<script>
    window.location.href = '/public/result.php'; // Redirigir a la página de resultados
</script>



