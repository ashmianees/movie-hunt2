<?php
$host = 'sql12.freesqldatabase.com';
$db = 'sql12767636';  // Your database name
$user = 'sql12767636'; // Your username
$pass = 'F54gcFTLQZ'; // Password from FreeSQLDatabase

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
