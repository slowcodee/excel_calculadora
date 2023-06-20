<?php
#####################################################################################################################################################################################################################################
require "/laragon/www/SWtime/privade/config_BD/Connection.php";
include "/laragon/www/SWtime/privade/controllers/base.php";
#####################################################################################################################################################################################################################################
//variables del form
$email = $_POST['email'];
$contraseña = $_POST['CONTRASENA'];

#####################################################################################################################################################################################################################################
// Variables de consulta
$queries = array(
    "SELECT * FROM `tb_instructors` WHERE `CorreoInstitucional` = '$email'",
    "SELECT * FROM `tb_admin` WHERE `CorreoInstitucional` = '$email'"
);

// Arrays para almacenar los datos
$data = array();

// Realizar las consultas y almacenar los resultados en $data
foreach ($queries as $query) {
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $data[] = mysqli_fetch_assoc($result);
    }
}

// Verificar los datos y ejecutar el código correspondiente
foreach ($data as $item) {
    if (!empty($item)) {
        // El item tiene información
        // Ejemplo de uso
        $ciphertext = $item['CONTRASENA'];
        $key = "EstaEsMiClaveSecreta1234";
        $plaintext = decrypt($ciphertext, $key);

        if ($plaintext == $contraseña && $email == $item['CorreoInstitucional']) {
            // El usuario ha ingresado la contraseña correcta
            session_start();
            $_SESSION['NOMBRE'] = $item['NOMBRE'];
            $NOMBREUSER = $_SESSION['NOMBRE'];
            $_SESSION['ID_CC'] = $item['ID_CC'];
            $CEDULA = $_SESSION['ID_CC'];
            header('Location: /privade/models/home_log.php');
            exit;
        } else {
            // El usuario no existe en la base de datos o la contraseña es incorrecta
            $alertMessage = urlencode('¡ERROR EN LA CONTRASEÑA O EN EL EMAIL!');
            $alertType = urlencode('success');
            $alertDuration = urlencode('5');

            $url = '/privade/views/Index.php?alert_message=' . $alertMessage . '&alert_type=' . $alertType . '&alert_duration=' . $alertDuration;
            header('Location: ' . $url);
            die();
        }
    }
}

// Si no se encuentra ningún dato válido, redireccionar
$alertMessage = urlencode('¡ERROR EN LA CONTRASEÑA O EN EL EMAIL!');
$alertType = urlencode('success');
$alertDuration = urlencode('5');

$url = '/privade/views/Index.php?alert_message=' . $alertMessage . '&alert_type=' . $alertType . '&alert_duration=' . $alertDuration;
header('Location: ' . $url);
die();

// Función de desencriptado
function decrypt($ciphertext, $key) {
    $cipher = "blowfish";
    $ciphertext = base64_decode($ciphertext);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($ciphertext, 0, $ivlen);
    $ciphertext = substr($ciphertext, $ivlen);
    $plaintext = openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return $plaintext;
}

mysqli_close($conn);

#####################################################################################################################################################################################################################################
?>
