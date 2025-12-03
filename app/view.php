<?php
require_once __DIR__ . '/db.php';
$id = (int)($_GET['id'] ?? 0);
$stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();
if (!$post) { exit('글을 찾을 수 없습니다. <a href="board.php">목록</a>'); }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($post['title']) ?> | My Website</title>
<link rel="stylesheet" href="style.css">
<style>
.board { max-width: 900px; margin: 40px auto; }
.meta { color:#666; margin-bottom:10px; }
pre { white-space: pre-wrap; word-break: break-word; }
.actions { margin-top: 16px; }
.btn { padding: 8px 14px; border:1px solid #004c99; background:#004c99; color:#fff;
text-decoration:none; border-radius:8px;}
.btn-outline { background:#fff; color:#004c99; }
</style>
</head>
<body>
<header>
<h1>게시글 보기</h1>
<nav>
<a href="index.html">홈</a>
<a href="about.html">자기소개</a>
<a href="projects.html">프로젝트</a>
<a href="board.php">게시판</a>
</nav>
</header>
<main class="board">
<h2><?= htmlspecialchars($post['title']) ?></h2>
<div class="meta">
작성자: <?= htmlspecialchars($post['name']) ?> | 작성일: <?=
htmlspecialchars($post['created_at']) ?>
</div>
<pre><?= htmlspecialchars($post['content']) ?></pre>
<div class="actions">
<a class="btn btn-outline" href="board.php">목록</a>
<a class="btn" href="delete.php?id=<?= (int)$post['id'] ?>" onclick="return confirm('삭제하시겠습
니까?');">삭제</a>
</div>
</main>
<footer>
<p>&copy; 2025 My Website</p>
</footer>
</body>
</html>
