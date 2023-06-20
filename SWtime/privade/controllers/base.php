<?php
session_status();

/* require_once "/laragon/www/SWtime/privade/controllers/config.php"; */

// Desactivar caché
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

/* <!--script de timer el cual indica que si el cursor del mouse no se muebe durante 2 minutos se cierra la session y regresa al login-->*/
echo '<script>
let timer;

// Función para redireccionar a cerrar.php
function redireccionar() {
  window.location.href = "/privade/models/salir.php";
}

function irDetalleFicha(fechaInicial, fechaFinal, id) {
  window.location.href = `/privade/views/session/SHARE/fichas_log/Fichas.php?PROG_INICIO=${fechaInicial}&PROG_FINAL=${fechaFinal}&id_RAP=${id}`;
}

// Función para restablecer el temporizador
function resetTimer() {
  clearTimeout(timer); // Limpiar el temporizador anterior
  timer = setTimeout(redireccionar,500000); // 10 segundos en milisegundos
}

// Función para reiniciar el temporizador al detectar movimiento del mouse
function reiniciarTimer() {
  resetTimer();
  document.removeEventListener("mousemove", reiniciarTimer);
  document.addEventListener("mousemove", reiniciarTimer);
}

// Evento para detectar el movimiento del mouse y reiniciar el temporizador
document.addEventListener("mousemove", reiniciarTimer);

// Iniciar el temporizador al cargar la página
resetTimer();
</script>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SENA HORAS</title>

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="viewport" content="width=768">
    <meta name="viewport" content="width=1200">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    
    <style>
      body {
        background-color: #222222;
        color: #ffffff;
      }
      a {
        color: #ffffff;
      }
      a:hover {
        color: #cccccc;
      }
    </style>

</head>
<body>

</body>
</html>