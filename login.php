<?php
  require('functions.php');
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
  </head>
  <body>
    <section class="wrapper">
      <h2>Login</h2>
      <?php if(isset($_SESSION['err'])): ?>
      <p><?php echo $_SESSION['err'] ?></p>
      <?php endif; ?>
      <form action="store.php" method="POST">
        <div class="form_userName">
          <label for="userName">User Name</label>
          <div>
            <input type="text" name="userName" class="userName" required="required">
          </div>
        </div>
        <div class="form_password">
          <label for="password">Password</label>
          <div>
            <input type="password" name="password" class="password" required="required">
          </div>
        </div>
        <div class="form_submit">
          <button type="submit">Login</button>
        </div>
      </form>
      <p>
        <a href="./register.php">新規登録</a>
      </p>
    </section>
  <?php unsetSession(); ?>
  </body>
</html>