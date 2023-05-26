<?php
session_start();

include "/laragon/www/SWtime/privade/config_BD/Connection.php";

$CEDULA = $_SESSION['C.C'];


$sql_instructors = "SELECT * FROM `tb_instructors` WHERE `C.C` = '$CEDULA'";
$result_instructors = mysqli_query($conn, $sql_instructors);

$sql_admin = "SELECT * FROM `tb_admin` WHERE `C.C` = '$CEDULA'";
$result_admin = mysqli_query($conn, $sql_admin);

if (mysqli_num_rows($result_instructors) > 0) {
    // La cédula está en la tabla tb_instructors
    $INSTRUCTOR2;
    header('Location: /privade/views/session/HomeSW.php');
    exit(); 
} elseif (mysqli_num_rows($result_admin) > 0) {
    // La cédula está en la tabla tb_admin
    $ADMIN2;
    header('Location: /privade/views/session/HomeSW.php');
    exit();
} else {
    // La cédula no se encontró en ninguna de las tablas
    echo "Cédula no encontrada";
}
?>
