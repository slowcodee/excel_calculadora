<?php
    session_start();

    include "/laragon/www/SWtime/privade/controllers/base.php";
    include "/laragon/www/SWtime/privade/config_BD/Connection.php";
        
    // Imprime el valor almacenado en la variable de sesión 'NOMBRE'

    echo "<h2 class='text-center'>$_SESSION[NOMBRE]</h2>";
    //atras
    echo '<a class="btn btn-danger btn-block btn-lg mb-2" href="/privade/models/home_log.php" role="button">ATRAS</a>';

    // Almacena el valor de la variable de sesión 'NOMBRE' en la variable $NOMBREINSTRUCTOR
    $NOMBREINSTRUCTOR = $_SESSION['NOMBRE'];

    // Construye la consulta SQL para seleccionar los datos de la tabla 'tb_ralps' con el INSTRUCTOR_ASIGNADO igual al valor de $NOMBREINSTRUCTOR
    $FINDER = "SELECT `ID_AI`, `ID_FICHA`, `id_RAP`, `PROGRAMA`, `AMBIENTE`, `PROG_INICIO`, `PROG_FINAL` FROM `tb_ralps` WHERE `INSTRUCTOR_ASIGNADO` = '$NOMBREINSTRUCTOR'";

    // Ejecuta la consulta SQL y almacena el resultado en la variable $result
    $result = mysqli_query($conn, $FINDER);

    // Crea un array vacío llamado $datains para almacenar los datos recuperados de la consulta
    $datains = array();

    // Recorre el resultado de la consulta y agrega cada fila al array $datains
    while ($row = mysqli_fetch_assoc($result)) {
        $datains[] = $row;
    }

    // Define las columnas que se mostrarán en la tabla
    $columns = array("ID_AI", "ID_FICHA", "id_RAP", "PROGRAMA", "AMBIENTE" ,"PROG_INICIO", "PROG_FINAL");
?>

<div class="table-responsive">
    <table class="table table-bordered table-dark table-hover table-striped text-center table-responsive">
        <thead>
            <tr>
                <?php
                    foreach ($columns as $column) {
                        echo "<th>$column</th>"; // Imprime cada columna como encabezado de la tabla
                    }
                ?>
            </tr>
        </thead>
        <tbody>

        <?php

        // Recorre los datos en $datains y crea una fila por cada elemento
            foreach ($datains as $item) {
        
                echo '<tr role="button" onclick="irDetalleFicha(\'' . $item['PROG_INICIO'] . '\', \'' . $item['PROG_FINAL'] . '\', \'' . $item['id_RAP'] . '\')">'; // Pasar los parámetros al hacer clic en la fila

                    foreach ($columns as $column) {
                        
                        if (isset($item[$column])) { // Si existe el valor de la columna
                            echo "<td>" . $item[$column] . "</td>"; // Imprime el valor de la columna en una celda de la tabla
                        } else { // Si no existe el valor de la columna
                            echo "<td><p>PARA PROGRAMAR</p></td>"; // Imprime una celda vacía con el texto "PARA PROGRAMAR"
                        }
                    }
                
                echo "</tr>";
            }
            
            ?>
        </tbody>
    </table>
</div>
