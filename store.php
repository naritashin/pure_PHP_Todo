<?php
require('functions.php');
$res = checkReferer();

if ($res == 'login') {
  checkUser($_POST);
} elseif ($res == 'register') {
  createUser($_POST);
} elseif ($res == 'logout') {
  header('location: ./');
} elseif ($res != 'back') {
  header('location: ./index.php');
} elseif($res == 'index') {
  header('location: ./index.php');
} else {
  header('location: '.$_SERVER['HTTP_REFERER'].'');
}
