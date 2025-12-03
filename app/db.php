<?php
$host= getenv('APP_DB_HOST') ?: 'db';
$db= getenv('APP_DB_NAME') ?: 'mysite';
$user= getenv('APP_DB_USER') ?: 'mysiteuser';
$pass= getenv('APP_DB_PASS') ?: 'StrongPassw0rd!';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
PDO::ATTR_ERRMODE
=> PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
PDO::ATTR_EMULATE_PREPARES
=> false,
];
try {
$pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
exit('DB 연결 실패: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8'));
}
