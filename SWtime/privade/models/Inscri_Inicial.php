<?php
include "/laragon/www/SWtime/privade/config_BD/Connection.php";

// Variables del formulario
$correo = $_POST['correo'];
$cedula = $_POST['cedula'];

$contraseña1 = $_POST['contraseña1'];
$contraseña2 = $_POST['contraseña2'];

$queries = array(
    "SELECT * FROM `tb_instructors` WHERE `C.C` = '$cedula'",
    "SELECT * FROM `tb_admin` WHERE `C.C` = '$cedula'"
);

$data = array();

// Realizar las consultas y almacenar los resultados en $data
foreach ($queries as $query) {
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $data[] = mysqli_fetch_assoc($result);
    }
}

// Verificar la cédula y el correo ingresados
$validCredentials = false;
foreach ($data as $item) {
    if ($cedula == $item['C.C'] && $correo == $item['CorreoInstitucional']) {
        $validCredentials = true;
        break;
    }
}

if ($validCredentials) {
    if ($contraseña1 == $contraseña2) {
        $contraseña = $contraseña1;
        $key = "EstaEsMiClaveSecreta1234";
        $ciphertext = encrypt($contraseña, $key);

        $sql_update_instructors = "UPDATE `tb_instructors` SET `CONTRASEÑA` = '$ciphertext' WHERE `C.C` = '$cedula'";
        $result_instructors = mysqli_query($conn, $sql_update_instructors);

        $sql_update_admin = "UPDATE `tb_admin` SET `CONTRASEÑA` = '$ciphertext' WHERE `C.C` = '$cedula'";
        $result_admin = mysqli_query($conn, $sql_update_admin);

        if ($result_instructors && $result_admin) {
            // Contraseña actualizada exitosamente
            $alertMessage = urlencode('ACTUALIZACION EXITOSA');
            $alertType = urlencode('success');
            $alertDuration = urlencode('5');

            $url = '/privade/views/Inscripcion.php?alert_message=' . $alertMessage . '&alert_type=' . $alertType . '&alert_duration=' . $alertDuration;
            header('Location: ' . $url);
            die();
        } else {
            // Error al actualizar la contraseña
            $alertMessage = urlencode('Error al actualizar la contraseña: ' . mysqli_error($conn));
            $alertType = urlencode('danger');
            $alertDuration = urlencode('5');

            $url = '/privade/views/Inscripcion.php?alert_message=' . $alertMessage . '&alert_type=' . $alertType . '&alert_duration=' . $alertDuration;
            header('Location: ' . $url);
            die();
        }
    } else {
        // Contraseñas no coinciden
        $alertMessage = urlencode('¡ERROR EN LA CONTRASEÑA!');
        $alertType = urlencode('warning');
        $alertDuration = urlencode('5');

        $url = '/privade/views/Inscripcion.php?alert_message=' . $alertMessage . '&alert_type=' . $alertType . '&alert_duration=' . $alertDuration;
        header('Location: ' . $url);
        die();
    }
} else {
    // Cédula y/o correo inválidos
    $alertMessage = urlencode('¡ERROR: INFORMACION INVALIDA!');
    $alertType = urlencode('warning');
    $alertDuration = urlencode('5');

    $url = '/privade/views/Inscripcion.php?alert_message=' . $alertMessage . '&alert_type=' . $alertType . '&alert_duration=' . $alertDuration;
    header('Location: ' . $url);
    die();
}

// Función de encriptación de contraseñas
function encrypt($texto, $key) {
    $cipher = "blowfish";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($texto, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $ciphertext = base64_encode($iv . $ciphertext);
    return $ciphertext;
}
?>
