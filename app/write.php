<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="UTF-8">
<title>글쓰기 | My Website</title>
<link rel="stylesheet" href="style.css">
<style>
.board { max-width: 700px; margin: 40px auto; }
label { display:block; margin:12px 0 6px; }
input[type="text"], textarea { width:100%; padding:10px; border:1px solid #ccc;
border-radius:8px; }
.actions { margin-top:16px; }
.btn { padding: 8px 14px; border:1px solid #004c99; background:#004c99; color:#fff;
text-decoration:none; border-radius:8px;}
.btn-outline { background:#fff; color:#004c99; }
</style>
</head>
<body>
<header>
<h1>글쓰기</h1>
<nav>
<a href="index.html">홈</a>
<a href="about.html">자기소개</a>
<a href="projects.html">프로젝트</a>
<a href="board.php">게시판</a>
</nav>
</header>
<main class="board">
<form action="save.php" method="post">
<label for="name">이름</label>
<input id="name" name="name" type="text" required maxlength="50">
<label for="title">제목</label>
<input id="title" name="title" type="text" required maxlength="200">
<label for="content">내용</label>
<textarea id="content" name="content" rows="10" required></textarea>
<div class="actions">
<button class="btn" type="submit">등록</button>
<a class="btn btn-outline" href="board.php">목록</a>
</div>
</form>
</main>
<footer>
<p>&copy; 2025 My Website</p>
</footer>
</body>
</html>
