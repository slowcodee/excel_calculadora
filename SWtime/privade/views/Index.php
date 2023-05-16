<?PHP
session_start();
include "/laragon/www/SWtime/privade/controllers/base.php";
//require_once '/laragon/www/SWtime/privade/controllers/config.php';

if (isset($_SESSION['alert_message'])) {
    $alert_type = $_SESSION['alert_type'];
    $alert_message = $_SESSION['alert_message'];
    $alert_duration = isset($_SESSION['alert_duration']) ? $_SESSION['alert_duration'] * 1000 : 5000; // Duración del temporizador en milisegundos, por defecto 5 segundos
    
    echo '<div class="alert alert-warning ' . $alert_type . ' alert-dismissible fade show text-center" role="alert">' . $alert_message .
         '<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()"><span aria-hidden="true">&times;</span></button></div>';
    
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
<html>

    <title>LOGIN_SENA_HORAS_TRABAJO</title>
    
</head>
<body>
    <div class='container d-flex justify-content-center align-items-center' style="height: 100vh;">
        <form action='/privade/models/login.php' method='POST'>
            <h2 class="d-flex justify-content-center m-4">Login Form</h2>
            <div class='form-group'>
                <label for='username' class="d-flex justify-content-center">EMAIL</label>
                <input type='text' class='EMAIL form-control d-flex justify-content-center' placeholder='EMAIL SENA' id='email' name='email' required>
            </div>
            <div class='form-group'>
                <label for='pwd' class="d-flex justify-content-center">CONTRASEÑA</label>
                <input type='password' class='CONTRASEÑA form-control d-flex justify-content-center' placeholder='CONTRASEÑA' id='contraseña' name='contraseña' required>
            </div>
            <div>
                <a class="d-flex justify-content-center m-3" href="/privade/views/inscripcion.php">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="d-flex justify-content-center">
                <button type='submit' class='btn btn-primary'>Login</button>
            </div> 
        </form>
    </div>
</body>

    </div>
</body>
</html>