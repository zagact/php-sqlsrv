<?php
// phpinfo();
// $serverName = "localhost\\sqlexpress";
// $connectionOptions = array(
//     "Database" => "master",
//     // "Uid" => "SQLEXPRESS",
//     // "PWD" => ""
// );

// // Establece la conexión
// $conn = sqlsrv_connect($serverName, $connectionOptions);

// if( $conn ) {
//     echo "Connection established.<br />";
// }else{
//     echo "Connection could not be established.<br />";
//     die( print_r( sqlsrv_errors(), true));
// }
// $serverName = "localhost\\sqlexpress"; // Nombre del servidor SQL Server
// $database = "master"; // Nombre de la base de datos

// try {
//     $conn = new PDO("sqlsrv:Server=$serverName;Database=$database");
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connection established.<br />";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
$serverName = "localhost\\sqlexpress"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"salamanca");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

// $serverName = "localhost\\sqlexpress"; // Nombre del servidor SQL Server Express
// $connectionOptions = array(
//     "Database" => "master", // Nombre de la base de datos
//     "Trusted_Connection" => true // Usar autenticación de Windows
// );

// // Establece la conexión
// $conn = sqlsrv_connect($serverName, $connectionOptions);

// if ($conn) {
//     echo "Connection established.<br />";
// } else {
//     echo "Connection could not be established.<br />";
//     die(print_r(sqlsrv_errors(), true));
// }


// $serverName = "localhost\\sqlexpress"; // Nombre del servidor SQL Server Express
// $database = "master"; // Nombre de la base de datos

// try {
//     $conn = new PDO("sqlsrv:Server=$serverName;Database=$database;Trusted_Connection=yes");
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connection established.<br />";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

?>