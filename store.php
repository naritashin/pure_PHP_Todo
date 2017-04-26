<?php
require('functions.php');
require('functionsUser.php');
// var_dump($_POST);
$res = checkReferer();
// var_dump($res);
if ($res == 'login') {
  checkLogin($_POST);
} elseif ($res != 'back') {
  header('location: ./index.php');
} elseif($res == 'index') {
  header('location: ./index.php');
} else {
  header('location: '.$_SERVER['HTTP_REFERER'].'');
}
