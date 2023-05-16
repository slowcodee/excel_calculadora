<?php
session_start();
include "/laragon/www/SWtime/privade/config_BD/Connection.php";

#####################################################################################################################################################################################################################################*/

//variables del form

/* $cedula = $_POST['cedula']; */

$contraseña1 = $_POST['contraseña1'];
$contraseña2 = $_POST['contraseña2'];

#####################################################################################################################################################################################################################################

$sql = "SELECT * FROM `tb_instructors` WHERE `C.C` = '$cedula'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

#####################################################################################################################################################################################################################################

/* if($cedula == $data['C.C']){ */
    if($contraseña1 == $contraseña2){

        #################################################
        //encriptado de las contraseña FUNCION                    

        $contraseña=$contraseña1;
        $key = "EstaEsMiClaveSecreta1234";
        $ciphertext = encrypt($contraseña, $key);
        //CHECK THE NCRIPTION 
        
        /* echo "Texto encriptado: " . $ciphertext; */
        
        ##################################################
        
        // Actualizar la contraseña en la base de datos //
        
        $sql = "UPDATE `tb_instructors` SET `CONTRASEÑA` = '$ciphertext' WHERE `C.C` == session_satart() ";
        $result = mysqli_query($conn, $sql);
            echo'<br>';
            if ($result) {
            echo "Contraseña actualizada exitosamente.";
                } else {
            echo "Error al actualizar la contraseña: " . mysqli_error($conn);
                    }

        ##################################################
        //funcion de alert update correcto 
        
        $_SESSION['alert_message'] = 'ACTUALIZACION EXITOSA'; 
        $_SESSION['alert_type'] = 'success';
        $_SESSION['alert_duration'] = 5; 
        header('Location: /privade/views/session/contraseña_nueva.php'); 
        die;
        
        ################################################
      }else{
        
        $_SESSION['alert_message'] = '¡ERROR EN LA CONTRASEÑA!'; 
        $_SESSION['alert_type'] = 'warning';
        $_SESSION['alert_duration'] = 5; 
        header('Location: /privade/views/session/contraseña_nueva.php'); 
        die;
    }
/* }else{

        $_SESSION['alert_message'] = '¡ERROR INFORMACION INVALIDA!'; 
        $_SESSION['alert_type'] = 'warning';
        $_SESSION['alert_duration'] = 5; 
        header('Location: /privade/views/session/contraseña_nueva.php'); 
        die;

} */
#####################################################################################################################################################################################################################################

//encriptado de las contraseña FUNCION
function encrypt($texto, $key) {
  $cipher = "blowfish";
  $ivlen = openssl_cipher_iv_length($cipher);
  $iv = openssl_random_pseudo_bytes($ivlen);
  $ciphertext = openssl_encrypt($texto, $cipher, $key, OPENSSL_RAW_DATA, $iv);
  $ciphertext = base64_encode($iv . $ciphertext);
  return $ciphertext;
  }


?>