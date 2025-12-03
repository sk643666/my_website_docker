<?php
require_once __DIR__ . '/db.php';
$name = trim($_POST['name'] ?? '');
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');
if ($name === '' || $title === '' || $content === '') {
exit('필수 항목이 비었습니다. <a href="write.php">뒤로</a>');
}
$stmt = $pdo->prepare("INSERT INTO posts (name, title, content) VALUES (?, ?, ?)");
$stmt->execute([$name, $title, $content]);
header('Location: board.php');
exit;
