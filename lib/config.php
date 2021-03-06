<?php if (!defined('DATATABLES')) exit(); // Ensure being used in DataTables env.

// Enable error reporting for debugging (remove for production)
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once "../dbecommerce.php";
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Database user / pass
 */
$sql_details = array(
	"type" => "Mysql",     // Database type: "Mysql", "Postgres", "Sqlserver", "Sqlite" or "Oracle"
	"user" => $user,          // Database user name
	"pass" => $pass,          // Database password
	"host" => $host, // Database host
	"port" => "",          // Database connection port (can be left empty for default)
	"db"   => $db,          // Database name
	"dsn"  => "charset=utf8mb4",          // PHP DSN extra information. Set as `charset=utf8mb4` if you are using MySQL
	"pdo" => null   // PHP PDO attributes array. See the PHP documentation for all options
);

// /End development include

