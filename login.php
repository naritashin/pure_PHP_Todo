<?php
  require('functions.php');
  setToken();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
  </head>
  <body>
    <section class="wrapper">
      <h2>ログイン</h2>
      <?php if(isset($_SESSION['err'])): ?>
      <p><?php echo $_SESSION['err'] ?></p>
      <?php endif; ?>
      <?php if(isset($_SESSION['register'])): ?>
      <p><?php echo $_SESSION['register'] ?></p>
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
        <div class="form_submit">
          <button type="submit">ログイン</button>
        </div>
      </form>
      <p>
        <a href="./register.php">新規登録</a>
      </p>
    </section>
  <?php unsetSession(); ?>
  </body>
</html>