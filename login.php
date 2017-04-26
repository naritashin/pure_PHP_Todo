<?php
  require('functionsUser.php');
  // unsetSession();
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
    </section>
  </body>
</html>