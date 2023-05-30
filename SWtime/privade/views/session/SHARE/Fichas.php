<?php
session_start();
require "/laragon/www/SWtime/privade/controllers/base.php";
require_once '/laragon/www/SWtime/privade/controllers/config.php';

if ($_SESSION['ROL'] == 'admin') {

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
        <div class='container'>
            
            <h1>fichas admin</h1>

                <div class="d-flex justify-content-center">
                    <a class="btn btn-danger btn-block btn-lg mb-2" href="/privade/views/session/HomeAD.php" role="button">atras</a>
                </div> 
                
        </div>
</body>
</html>

<?php

}else{

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
        <div class='container'>

            <h1>fichas instructor</h1>        

                <div class="d-flex justify-content-center">
                    <a class="btn btn-danger btn-block btn-lg mb-2" href="/privade/views/session/home1.php" role="button">atras</a>
                </div> 
                
        </div>
</body>
</html>

<?php
};
?>