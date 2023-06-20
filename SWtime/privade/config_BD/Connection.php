<?php
####################################################################################################################################################
$host = "localhost";
$username = "root";
$password = "";
$database = "bd_swtime";
// Create connection
$conn = mysqli_connect($host, $username, $password, $database);
###################################################################################################################################################
// Check connection
/* if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully database";
 */
###################################################################################################################################################
/* class Database{

    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "bd_swtime";

    function conectar() {
        try {
            $conn = "mysql:host=" . $this->host . "; bdname=" . $this->database;
    
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];

                $pdo = new PDO($conn, $this->username, $this->password, $options);
                return $pdo;
        } catch (PDOException $e) {
            echo 'error conexion: ' . $e->getMessage();
            exit;

        }
        


    }

}
 */
?> 