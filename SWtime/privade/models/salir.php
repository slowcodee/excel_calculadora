<?php
// Cerramos la sesión

session_start();
session_destroy();

// Redireccionamos al usuario a la página principal
header('Location: /privade/views/index.php');
die();

?>
