<?php
session_start();

include "/laragon/www/excel_nombre/private/Connection.php";

########################################################################################################
//mira si ese nombre existe o no en la base de datos
if(isset($_POST["nombre"])){
    $nombre = $_POST['nombre'];
}else{
    echo"el nombre no existe.";
}

#########################################################################################################
//trae la informacion mediante un select mediante el nombre
$sql = "SELECT ALL * FROM `tb_2023` WHERE `INSTRUCTOR_ASIGNADO` = '$nombre'";
$result = mysqli_query($conn, $sql); 
$data = array(); // Crear un array vacío 

while($mostrar=mysqli_fetch_array($result)){
        $data[] = $mostrar; // Añadir cada fila del resultado al array
    }
 $_SESSION['data'] = $data;  // Guardar el array en la variable de sesión

########################################################################################################################################################################################
while ($fila = mysqli_fetch_assoc($result)) {
            $id =$fila['id'];
            $programacion_detalle =$fila['PROGRAMACION_DETALLE'];
            $instructor_asignado =$fila['INSTRUCTOR_ASIGNADO'];
            $ambiente = $fila['AMBIENTE'];
            $PROG_INICIO =$fila['PROG_INICIO'];
            $PROG_FINAL = $fila['PROG_FINAL'];
            $lunes =$fila['LUNES'];
            $martes =$fila['MARTES'];
            $miercoles =$fila['MIERCOLES']; 
            $jueves = $fila['JUEVES'];
            $viernes =$fila['VIERNES'];
            $sabado = $fila['SABADO'];
            $domingo = $fila['DOMINGO'];
            $prog_estado = $fila['PROG_ESTADO'];
};
########################################################################################################################################################################################

 $ids = array_column($data, 'id');
/* var_dump($data);   */

var_dump($ids);
/* $_SESSION['id'] = $ids;  */
########################################################################################################################################################################################
/* 
$lunes, $martes, $miercoles, $jueves, $viernes, $sabado, $domingo */
/* 
foreach (array("lunes", "martes", "miercoles", "jueves", "viernes", "sabado", "domingo") as $dia) {
    // Verificar si el valor de la variable es diferente a 0
    if ($$dia != 0) {
      // Almacenar el nombre del día y su valor en el array de días con valor distinto
        $dias_valor[$dia] = $$dia;
    }
} */

/* $_SESSION['dias_valor'] = $dias_valor; // Guardar el array en la variable de sesión
 */// Redirigir a otra página
########################################################################################################################################################################################

?>
<script>
window.location.href = '/public/result.php';
</script> 