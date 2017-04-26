<?php
require('conectionUsers.php');
// session_start();

function checkLogin($userData) {
  $userName = $userData['userName'];
  $password = getSelectPasswordDb($userName);

  if($userData['password'] === $password) {
    header('location: ./index.php');
  }
}