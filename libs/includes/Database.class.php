<?php

class Database
{
    public static $conn = null;
    public static function getconnection()
    {
        if (Database::$conn == null) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "vanam_dashboard";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($connection->connect_error) {
                die("Connection failed: " . $connection->connect_error);
            } else {
                // printf("new connection established....");
                Database::$conn = $connection;
                return Database::$conn;
            }
        } else {
            // printf("return existing connection established....");
            return Database::$conn;
        }
    }
}
?>
<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "vanam_dashboard";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}
?>