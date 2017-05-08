<?php
require('functions.php');
$res = checkReferer();

if ($res == 'login') {
  header('location: ./index.php');
} elseif ($res == 'register') {
  header('location: ./login.php');
} elseif ($res == 'logout') {
  header('location: ./login.php');
} elseif ($res != 'back') {
  header('location: ./index.php');
} elseif($res == 'index') {
  header('location: ./index.php');
} else {
  header('location: '.$_SERVER['HTTP_REFERER'].'');
}
