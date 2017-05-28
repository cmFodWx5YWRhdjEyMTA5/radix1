<?php
// Database configuration
$dbHost = "localhost";
$dbUsername = "radixbea_rahul";
$dbPassword = "Rahul@4321%%";
$dbName = "radixbea_beauty";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>