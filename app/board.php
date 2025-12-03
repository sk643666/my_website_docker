<?php require_once __DIR__ . '/db.php'; ?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>게시판 | My Website</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
  <div class="container header-inner">
    <h1 class="logo">My Website</h1>
    <nav class="main-nav">
      <a href="index.html">홈</a>
      <a href="about.html">자기소개</a>
      <a href="projects.html">프로젝트</a>
      <a href="board.php" class="active">게시판</a>
    </nav>
  </div>
</header>

<main class="board container">
  <h2 class="page-title">게시판</h2>

  <div class="actions">
    <a class="btn" href="write.php">글쓰기</a>
  </div>

  <table class="board-table">
    <thead>
      <tr><th>번호</th><th>제목</th><th>작성자</th><th>작성일</th></tr>
    </thead>
    <tbody>
    <?php
    $stmt = $pdo->query("SELECT id, title, name, created_at FROM posts ORDER BY id DESC");
    foreach ($stmt as $row):
    ?>
      <tr>
        <td><?= (int)$row['id'] ?></td>
        <td><a href="view.php?id=<?= (int)$row['id'] ?>"><?= htmlspecialchars($row['title']) ?></a></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['created_at']) ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</main>

<footer class="site-footer">
  <div class="container">
    <p>&copy; 2025 My Website</p>
  </div>
</footer>
</body>
</html>
