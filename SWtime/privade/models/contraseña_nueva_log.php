<?php
session_start();
include "/laragon/www/SWtime/privade/config_BD/Connection.php";

$contraseña1 = $_POST['contraseña1'];
$contraseña2 = $_POST['contraseña2'];

$CEDULA = $_SESSION['ID_CC'];

$tables = array("tb_instructors", "tb_admin");

if ($contraseña1 == $contraseña2) {
    $contraseña = $contraseña1;
    $key = "EstaEsMiClaveSecreta1234";
    $ciphertext = encrypt($contraseña, $key);

    foreach ($tables as $table) {
        $sql = "UPDATE `$table` SET `CONTRASENA` = ? WHERE `ID_CC` = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $ciphertext, $CEDULA);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $_SESSION['alert_message'] = 'ACTUALIZACION EXITOSA';
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_duration'] = 5;
    header('Location: /privade/views/session/SHARE/contraseña_nueva.php');
    die;
} else {
    $_SESSION['alert_message'] = '¡ERROR EN LA CONTRASEÑA!';
    $_SESSION['alert_type'] = 'warning';
    $_SESSION['alert_duration'] = 5;
    header('Location: /privade/views/session/SHARE/contraseña_nueva.php');
    die;
}

function encrypt($texto, $key) {
    $cipher = "blowfish";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($texto, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $ciphertext = base64_encode($iv . $ciphertext);
    return $ciphertext;
}
?>

