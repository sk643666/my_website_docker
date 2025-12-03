<?php
// DB 연결 (필수)
require_once __DIR__ . '/db.php';

// 게시글 목록 가져오기
try {
    $sql = "SELECT id, title, name, created_at FROM posts ORDER BY id DESC";
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // 개발 중에는 에러 내용을 보고, 배포 시에는 사용자용 메세지만 보여주는 식으로 바꾸면 됨
    die('게시글을 불러오는 중 오류가 발생했습니다: ' . htmlspecialchars($e->getMessage()));
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>게시판 | 개인 실습용 홈페이지</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="page-board">
<header>
  <div class="header-inner">
    <div>
      <h1 class="site-title"><a href="index.html">My Simple Homepage</a></h1>
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
    <div class="board-header">
      <h2>게시판</h2>
      <div class="actions">
        <a href="write.php" class="btn">글쓰기</a>
      </div>
    </div>

    <div class="board-table-wrapper">
      <table>
        <thead>
          <tr>
            <th style="width:10%;">번호</th>
            <th>제목</th>
            <th style="width:20%;">작성자</th>
            <th style="width:20%;">작성일</th>
          </tr>
        </thead>
        <tbody>
        <?php if (empty($rows)): ?>
          <tr>
            <td colspan="4" style="text-align:center;">아직 작성된 글이 없습니다.</td>
          </tr>
        <?php else: ?>
          <?php foreach ($rows as $row): ?>
            <tr>
              <td><?= htmlspecialchars($row['id']) ?></td>
              <td>
                <a href="view.php?id=<?= urlencode($row['id']) ?>">
                  <?= htmlspecialchars($row['title']) ?>
                </a>
              </td>
              <td><?= htmlspecialchars($row['name']) ?></td>
              <td><?= htmlspecialchars($row['created_at']) ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </section>
</main>

<footer>
  <p>&copy; 2025 My Website</p>
</footer>
</body>
</html>
