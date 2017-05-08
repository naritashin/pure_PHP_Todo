<?php
  require('functions.php');
  setToken();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
</head>
  <body>
    <section class="wrapper">
      <h2>新規登録</h2>
      <?php if(isset($_SESSION['err'])): ?>
      <p><?php echo $_SESSION['err'] ?></p>
      <?php endif; ?>
      <form action="store.php" method="POST">
        <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
        <div class="form_name">
          <label for="name">User Name</label>
          <div>
            <input type="text" name="name" class="name" required="required" placeholder="半角英数字のみ使用可能">
          </div>
        </div>
        <div class="form_password">
          <label for="password">Password</label>
          <div>
            <input type="password" name="password" class="password" required="required" placeholder="４文字以上、半角英数字のみ使用可能">
          </div>
        </div>
        <div class="confirmPassword">
          <label for="confirmPassword">Passwordの確認</label>
          <div>
            <input type="password" name="confirmPassword" class="password" required="required">
          </div>
        </div>
        <div class="form_submit">
          <button type="submit">新規作成</button>
        </div>
      </form>
    </section>
    <p>
      <a href="./login.php">ログイン</a>
    </p>
  <?php unsetSession(); ?>
  </body>
</html>