<?php
// includes/db.php
// Database Configuration for CVWISE

$host = 'localhost';
$db   = 'cvwise';
$user = 'root';
$pass = ''; // default empty for XAMPP/MAMP
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    // Uncomment when database is set up
    // $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // For MVP frontend focus, we will allow the app to run without DB connected
    // throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>