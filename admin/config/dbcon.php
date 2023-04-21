<?php 

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'sklad_db';

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn)
{
    header("Location: ../errors/dberror.php");
    die();
}



?>