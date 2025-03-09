<?php
$databaseHost = 'localhost';
$databaseName = 'crud_db';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>