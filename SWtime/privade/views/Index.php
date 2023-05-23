<?PHP
include "/laragon/www/SWtime/privade/controllers/base.php";
//require_once '/laragon/www/SWtime/privade/controllers/config.php';

$alertMessage = isset($_GET['alert_message']) ? urldecode($_GET['alert_message']) : '';
$alertType = isset($_GET['alert_type']) ? urldecode($_GET['alert_type']) : '';
$alertDuration = isset($_GET['alert_duration']) ? urldecode($_GET['alert_duration']) : '';

if (!empty($alertMessage) && !empty($alertType) && !empty($alertDuration)) {
    echo '<div class="alert alert-warning ' . $alertType . ' alert-dismissible fade show text-center" role="alert">' . $alertMessage .
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closeAlert()"><span aria-hidden="true">&times;</span></button></div>';
    
    echo '<script>setTimeout(function() { document.getElementsByClassName("alert")[0].style.display = "none"; }, ' . ($alertDuration * 1000) . ');</script>';
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