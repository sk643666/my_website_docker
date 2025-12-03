<?php require_once __DIR__ . '/db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>게시판 | My Website</title>
<link rel="stylesheet" href="style.css">
<style>
.board { max-width: 900px; margin: 40px auto; }
table { width: 100%; border-collapse: collapse; }
th, td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
.actions { text-align: right; margin: 20px 0; }
.btn { padding: 8px 14px; border: 1px solid #004c99; background:#004c99; color:#fff;
text-decoration:none; border-radius:8px; }
.btn-outline { background:#fff; color:#004c99; }
</style>
</head>
<body>
<header>
<h1>게시판</h1>
<nav>
<a href="index.html">홈</a>
<a href="about.html">자기소개</a>
<a href="projects.html">프로젝트</a>
<a href="board.php">게시판</a>
</nav>
</header>
<main class="board">
<div class="actions">
<a class="btn" href="write.php">글쓰기</a>
</div>
<table>
<thead>
<tr><th>번호</th><th>제목</th><th>작성자</th><th>작성일</th></tr>
</thead>
<tbody>
<?php
$stmt = $pdo->query("SELECT id, title, name, created_at FROM posts ORDER BY id
DESC");
foreach ($stmt as $row):
?>
<tr>
<td><?= (int)$row['id'] ?></td>
<td><a href="view.php?id=<?= (int)$row['id'] ?>"><?= htmlspecialchars($row['title'])
?></a></td>
<td><?= htmlspecialchars($row['name']) ?></td>
<td><?= htmlspecialchars($row['created_at']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</main>
<footer>
<p>&copy; 2025 My Website</p>
</footer>
</body>
</html>
