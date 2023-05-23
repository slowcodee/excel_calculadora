<?php
session_start();
require "/laragon/www/SWtime/privade/controllers/base.php";
require_once '/laragon/www/SWtime/privade/controllers/config.php';

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
<title>SENA_HORAS_TRABAJO</title>
    
    </head>
    <body>
    <form action="/privade/models/contraseña_nueva_log.php" method="POST">
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
      <div class="col">
        <div class="text-center">
          <a class="btn btn-danger btn-block btn-lg mb-2" href="/privade/views/session/HomeSW.php" role="button">Atrás</a>
        </div>
        <div class="mt-3">
          <label for="contraseña1" class="d-flex justify-content-center">CONTRASEÑA</label>
          <input type="password" class="form-control" id="contraseña1" name="contraseña1" placeholder="CONTRASEÑA" required>
        </div>
        <div class="mt-3">
          <label for="contraseña2" class="d-flex justify-content-center">VALIDACION DE LA CONTRASEÑA</label>
          <input type="password" class="form-control" id="contraseña2" name="contraseña2" placeholder="CONTRASEÑA" required>
        </div>
        <div class="mt-3 text-center">
          <button type="submit" class="btn btn-primary btn-block btn-lg">Inscribete</button>
        </div>
      </div>
    </div>
  </div>
</form>

</html>