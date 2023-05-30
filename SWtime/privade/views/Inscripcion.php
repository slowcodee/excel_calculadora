<?php

include "/laragon/www/SWtime/privade/controllers/control_externo.php";


$alertMessage = isset($_GET['alert_message']) ? urldecode($_GET['alert_message']) : '';
$alertType = isset($_GET['alert_type']) ? urldecode($_GET['alert_type']) : '';
$alertDuration = isset($_GET['alert_duration']) ? urldecode($_GET['alert_duration']) : '';

if (!empty($alertMessage) && !empty($alertType) && !empty($alertDuration)) {
    if ($alertType == 'success') {
        echo '<div class="alert alert-success ' . $alertType . ' alert-dismissible fade show text-center" role="alert">' . $alertMessage .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()"><span aria-hidden="true">&times;</span></button></div>';
    } else {
        echo '<div class="alert alert-warning ' . $alertType . ' alert-dismissible fade show text-center" role="alert">' . $alertMessage .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()"><span aria-hidden="true">&times;</span></button></div>';
    }

    echo '<script>setTimeout(function() { document.getElementsByClassName("alert")[0].style.display = "none"; }, ' . ($alertDuration * 1000) . ');</script>';
}

echo '<script>
            function closeAlert() {
                document.getElementsByClassName("alert")[0].style.display = "none";
            }
        </script>';

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