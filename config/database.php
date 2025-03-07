<?php
// phpinfo();
// DIRECT CONNECTION
$serverName = "localhost\\sqlexpress"; //serverName\instanceName

$connectionInfo = array( "Database"=>"salamanca");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

// PDO CONNECTION
// $serverName = "localhost\\sqlexpress"; // Nombre del servidor SQL Server Express
// $database = "salamanca"; // Nombre de la base de datos

// try {
//     $conn = new PDO("sqlsrv:Server=$serverName;Database=$database");
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connection established.<br />";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

?>