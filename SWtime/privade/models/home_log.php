<?php
session_start();

include "/laragon/www/SWtime/privade/config_BD/Connection.php";

$CEDULA = $_SESSION['ID_CC'];

$sql_instructors = "SELECT * FROM `tb_instructors` WHERE `ID_CC` = '$CEDULA'";
$result_instructors = mysqli_query($conn, $sql_instructors);

$sql_admin = "SELECT * FROM `tb_admin` WHERE `ID_CC` = '$CEDULA'";
$result_admin = mysqli_query($conn, $sql_admin);

if (mysqli_num_rows($result_instructors) > 0) {
    // La cédula está en la tabla tb_instructors
    $_SESSION['ROL'] = 'instructor';
    header('Location: /privade/views/session/Home1.php');
    exit();
} elseif (mysqli_num_rows($result_admin) > 0) {
    // La cédula está en la tabla tb_admin
    $_SESSION['ROL'] = 'admin';
    header('Location: /privade/views/session/Home1.php');
    exit();
} else {
    // El usuario no existe en la base de datos o la contraseña es incorrecta
    $alertMessage = urlencode('¡ERROR CEDULA NO ENCONTRADA EN LA BD!');
    $alertType = urlencode('success');
    $alertDuration = urlencode('5');

    $url = '/privade/views/Index.php?alert_message=' . $alertMessage . '&alert_type=' . $alertType . '&alert_duration=' . $alertDuration;
    header('Location: ' . $url);
    die();
}

?>


