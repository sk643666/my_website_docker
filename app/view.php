<?php
require_once __DIR__ . '/db.php';

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    exit('잘못된 접근입니다. <a href="board.php">목록</a>');
}

$stmt = $pdo->prepare("SELECT id, title, name, created_at, content FROM posts WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    exit('글을 찾을 수 없습니다. <a href="board.php">목록</a>');
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($post['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?> | My Website</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="page-board">
<header>
  <div class="header-inner">
    <div>
      <h1 class="site-title"><a href="index.html">개인 실습용 홈페이지</a></h1>
      <p class="site-subtitle">간단한 글을 남길 수 있는 게시판</p>
    </div>
    <nav>
      <div class="nav-links">
        <a href="index.html">홈</a>
        <a href="about.html">자기소개</a>
        <a href="projects.html">프로젝트</a>
        <a href="board.php" class="active">게시판</a>
      </div>
    </nav>
  </div>
</header>

<main>
  <section class="board">
    <article class="card">
      <header class="post-header">
        <h2 class="page-title">
          <?= htmlspecialchars($post['title'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>
        </h2>
        <div class="post-meta">
          작성자:
          <strong><?= htmlspecialchars($post['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></strong>
          &nbsp;|&nbsp;
          작성일:
          <?= htmlspecialchars($post['created_at'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?>
        </div>
      </header>

      <div class="post-content">
        <?= nl2br(htmlspecialchars($post['content'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')) ?>
      </div>

      <div class="actions">
        <a class="btn btn-secondary" href="board.php">목록</a>
        <a class="btn"
           href="delete.php?id=<?= (int)$post['id'] ?>"
           onclick="return confirm('삭제하시겠습니까?');">
          삭제
        </a>
      </div>
    </article>
  </section>
</main>

<footer>
  <p>&copy; 2025 My Website</p>
</footer>
</body>
</html>
