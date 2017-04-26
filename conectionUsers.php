<?php
require_once('config.php');

function userConnectPdo() {
  try{
    return new PDO(DSN, DB_USER, DB_PASSWORD);
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit;
  }
}

function selectUsersAll() {
  $dbh = userConnectPdo();
  $sql = 'SELECT * FROM users';
  $user = array();
  foreach($dbh->query($sql) as $row) {
    array_push($user, $row);
  }
  return $user;
}

// function getSelectUserNameDb($userName) {// userName有無確認用
//   $dbh = userConnectPdo();
//   $sql = 'SELECT userName FROM users WHERE userName = :userName';
//   $stmt = $dbh->prepare($sql);
//   $stmt->excute(array(':userName' => (string)$userName));
//   $userDate = $stmt->fetch();

  // return boolean($userData['userName']);
// }

function getSelectPasswordDb($userName) {// password成否参照用
  $dbh = userConnectPdo();
  $sql = 'SELECT password FROM users WHERE userName = :userName';
  $stmt = $dbh->prepare($sql);
  $stmt->execute(array(':userName' => (string)$userName));
  $userData = $stmt->fetch();

  return $userData['password'];
}

function insertUserDb($userData) {// user作成用
  $dbh = userConnectPdo();
  $sql = 'INSERT INTO users (userName) VALUES (:userName)';
  $stmt = $dbh->prepare($sql);
  $stmt->bindParam(':userName', $userData, PDO::PARAM_STR);
  $stmt->excute();
}