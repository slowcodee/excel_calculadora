<?php
session_start(); // Asegúrate de iniciar la sesión en la página de inicio

include "/laragon/www/SWtime/privade/controllers/base.php";
require_once '/laragon/www/SWtime/privade/controllers/config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body class="mb-5 mt5">
    <header>
        
    </header>

    <main>
      <div class="container">
        <div class="row flex-column justify-content-center align-items-center">

          <div class="col-12 col-md-6 mb-5 d-flex align-items-center justify-content-center">
            <h4 class="align-items-center m-5"><?php echo $_SESSION['NOMBRE'] ?></h4>
          </div>

          <div class="col-12 col-md-6 mb-5 text-center align-items-center">
            <a class="btn btn-primary btn-block btn-lg mb-2" href="/privade/views/session/SHARE/Tabla_Maestra.php" role="button">TABLA MAESTRA</a>
            <a class="btn btn-primary btn-block btn-lg mb-2" href="/privade/views/session/SHARE/Fichas.php" role="button">FICHAS</a>
            <a class="btn btn-primary btn-block btn-lg mb-2" href="/privade/views/session/SHARE/Contraseña_Nueva.php" role="button">CONTRASEÑA NUEVA</a>
            <a class="btn btn-danger btn-block btn-lg mb-2" href="/privade/models/salir.php" role="button">SALIR</a>
          </div>

        </div>
      </div>
    </main>

    <footer class="bg-dark fixed-bottom">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <img src="https://via.placeholder.com/50x50?text=Facebook" alt="Facebook" class="logo">
          <img src="https://via.placeholder.com/50x50?text=Telegram" alt="Telegram" class="logo">
          <img src="https://via.placeholder.com/50x50?text=Twitter" alt="Twitter" class="logo">
        </div>
      </div>
    </footer>

    <!--animacion de footer-->
    <style>
    .logo {
      margin: 0 20px;
      animation: blink 3s ;
      transition: none;
    }

    @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
    }
    </style>

  </body>
</html>
