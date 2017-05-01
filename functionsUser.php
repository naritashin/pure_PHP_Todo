<?php
require('conectionUsers.php');

function checkLogin () {
  if (empty($_SESSION['name'])) header('location: login.php');
}

function checkUser($userData) {
  $name = $userData['userName'];
  $password = getSelectPasswordDb($name);

  if ($userData['password'] === $password) {
    session_regenerate_id(TRUE);
    $_SESSION['name'] = $name;
    header('location: ./index.php');
  } else {
    $_SESSION['err'] = 'User Name または password が誤っています';
    header('location: '.$_SERVER['HTTP_REFERER'].'');
  };
}

function logout() {
  $_SESSION['name'] = '';
}

function createUser($userData) {
  $name = $userData['userName'];
  $password = $userData['password'];
  insertUserDb($name, $password);

  header('location: ./login.php');
}
