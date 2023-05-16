<?php
if (!isset($_SESSION['NOMBRE'])) {
    // el usuario no ha iniciado sesión
    header("Location: /privade/views/index.php"); 
    die();
}

$NombreUser = $_SESSION['NOMBRE'];

if($NombreUser == null || $NombreUser == ''){
    echo 'usted no tiene autorizacion';
}
echo"<script>history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.go(1);
};
</script>";
?>
