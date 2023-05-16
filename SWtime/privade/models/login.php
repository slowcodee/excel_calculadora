<?php
#####################################################################################################################################################################################################################################
require "/laragon/www/SWtime/privade/config_BD/Connection.php";
include "/laragon/www/SWtime/privade/controllers/base.php";
#####################################################################################################################################################################################################################################
//variables del form
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];

#####################################################################################################################################################################################################################################
$sql = "SELECT * FROM `tb_instructors` WHERE `CorreoInstitucional` = '$email'";
$result = mysqli_query($conn, $sql);
$data = array(); // Crear un array vacío
#####################################################################################################################################################################################################################################
//si el resultado esta vacio 
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
} else { 
    
    session_start();
    $_SESSION['alert_message'] = '!ERROR EN LA CONTRASEÑA O CON EL EMAIL¡'; 
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_duration'] = 5; 
    header('Location: /privade/views/Index.php'); 
    die;
            
}

#####################################################################################################################################################################################################################################

if ($data != null) {
    // Ejemplo de uso
    $ciphertext = $data['CONTRASEÑA'];
    $key = "EstaEsMiClaveSecreta1234";
    $plaintext = decrypt($ciphertext, $key);
    
    //cheking the incriptation 
    /* echo $contraseña . 'password del input';
    echo '<br>';
    echo $plaintext . 'password de la base de datos';
     */

    if ($plaintext == $contraseña && $email == $data['CorreoInstitucional'] ) {
        // El usuario ha ingresado la contraseña correcta
        session_start();
        $_SESSION['NOMBRE'] = $data['NOMBRE'];
        $NombreUser = $_SESSION['NOMBRE'];
        global $NombreUser;
        header('Location: /privade/views/session/HomeSW.php'); 
        exit;

    } else {
        // La contraseña ingresada por el usuario es incorrecta
        session_start();
        $_SESSION['alert_message'] = '!ERROR EN LA CONTRASEÑA O CON EL EMAIL¡';
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_duration'] = 5; 
        header('Location: /privade/views/Index.php'); 
        die;

    }
} else {
    // El usuario no existe en la base de datos
    session_start();
    $_SESSION['alert_message'] = '!ERROR EN LA CONTRASEÑA O CON EL EMAIL¡';
    $_SESSION['alert_type'] = 'success';
    $_SESSION['alert_duration'] = 5; 
    header('Location: /privade/views/Index.php'); 
    die;

}

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
