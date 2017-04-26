<?php
  require('functions.php');
  setToken();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規作成</title>
</head>
<body>
  <?php if(isset($_SESSION['err'])): ?>
    <p><?php echo $_SESSION['err'] ?></p>
  <?php endif; ?>
  <form action="store.php" method="POST">
    <input type="hidden" name="token" value="<?php echo h($_SESSION['token']) ?>">
    <input type="text" name="todo">
    <input type="submit" value="作成">
  </form>
  <div>
    <a href="index.php">一覧にもどる</a>
  </div>
  <?php unsetSession(); ?>
</body>
</html>