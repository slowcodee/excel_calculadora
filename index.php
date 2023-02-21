<?php include "Connection.php"?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
   
<h1>Consulta de registro</h1>
    <form action="search_id.php" method="POST">
        <label>ID:</label>
        <input typ e="number" name="id">
        <br><br>
        <button type="submit">Consultar</button>
    </form>


</body>
</html>
