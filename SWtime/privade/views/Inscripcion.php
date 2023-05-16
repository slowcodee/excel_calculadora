<?php
session_start();
include "/laragon/www/SWtime/privade/controllers/base.php";

if (isset($_SESSION['alert_message'])) {
    $alert_type = $_SESSION['alert_type'];
    $alert_message = $_SESSION['alert_message'];
    $alert_duration = isset($_SESSION['alert_duration']) ? $_SESSION['alert_duration'] * 1000 : 5000; // Duración del temporizador en milisegundos, por defecto 5 segundos
    
    if ($alert_type == 'success') {
        echo '<div class="alert alert-success ' . $alert_type . ' alert-dismissible fade show text-center" role="alert">' . $alert_message .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()"><span aria-hidden="true">&times;</span></button></div>';
    } else {
        echo '<div class="alert alert-warning ' . $alert_type . ' alert-dismissible fade show text-center" role="alert">' . $alert_message .
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()"><span aria-hidden="true">&times;</span></button></div>';
    }

    echo '<script>setTimeout(function() { document.getElementsByClassName("alert")[0].style.display = "none"; }, ' . $alert_duration . ');</script>';
    
    unset($_SESSION['alert_type']);
    unset($_SESSION['alert_message']);
    unset($_SESSION['alert_duration']);
}

echo '<script>
    function closeAlert() {
        document.getElementsByClassName("alert")[0].style.display = "none";
    }
</script>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<title>LOGIN_SENA_HORAS_TRABAJO</title>
    
    </head>
    <body>
        <div class='container d-flex justify-content-center align-items-center' style="height: 100vh;">
            <form action='/privade/models/Inscri_Inicial.php' method='POST'>
                <h2 class="d-flex justify-content-center m-4">INSCRIPCION</h2>
                <div class='form-group'>
                    <label for='username' class="d-flex justify-content-center">CEDULA</label>
                    <input type='number' class='cedula form-control d-flex justify-content-center' placeholder='NUEMERO DE LA C.C' id='cedula' name='cedula' required>
                </div>
                <div class='form-group'>
                    <label for='username' class="d-flex justify-content-center">EMAIL</label>
                    <input type='email' class='correo form-control d-flex justify-content-center' placeholder='EMAIL SENA' id='correo' name='correo' required>
                </div>
                <div class='form-group'>
                    <label for='pwd' class="d-flex justify-content-center">CONTRASEÑA</label>
                    <input type='password' class='CONTRASEÑA1 form-control d-flex justify-content-center' placeholder='CONTRASEÑA' id='contraseña1' name='contraseña1' required>
                </div>
                <div class='form-group'>
                    <label for='pwd' class="d-flex justify-content-center">VALIDACION DE LA CONTRASEÑA</label>
                    <input type='password' class='CONTRASEÑA2 form-control d-flex justify-content-center' placeholder='CONTRASEÑA' id='contraseña2' name='contraseña2' required>
                </div>
                <div>
                    <a class="d-flex justify-content-center m-3" href="/privade/views/Index.php"> !INGRESA AQUI¡</a>
                </div>
                <div class="d-flex justify-content-center">
                    <button type='submit' class='btn btn-primary'>inscribete</button>
                </div> 
            </form>
        </div>
</body>
</html>