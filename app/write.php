<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>글쓰기 | My Website</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="page-board">
<header>
  <div class="header-inner">
    <div>
      <h1 class="site-title"><a href="index.html">My Simple Homepage</a></h1>
      <p class="site-subtitle">새 글을 작성하는 페이지</p>
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
      <h2 class="page-title">새 글 작성</h2>
      <p class="page-description">
        아래 양식을 작성한 후 <strong>등록</strong> 버튼을 누르면 게시판에 글이 올라갑니다.
      </p>

      <form action="save.php" method="post">
        <label for="name">이름</label>
        <input id="name" name="name" type="text" required maxlength="50">

        <label for="title">제목</label>
        <input id="title" name="title" type="text" required maxlength="200">

        <label for="content">내용</label>
        <textarea id="content" name="content" rows="10" required></textarea>

        <div class="actions">
          <a class="btn btn-secondary" href="board.php">목록</a>
          <button class="btn" type="submit">등록</button>
        </div>
      </form>
    </article>
  </section>
</main>

<footer>
  <p>&copy; 2025 My Website</p>
</footer>
</body>
</html>
