<?php
require('conection.php');
session_start();

function checkReferer() {
  $httpArr = parse_url($_SERVER['HTTP_REFERER']);
  return $res = transition($httpArr['path']);
}

function transition($path) {
  unsetSession();
  $data = $_POST;

  if (isset($data['todo'])) $res = validate($data['todo']);

  if ($path === '/index.php' && $data['type'] === 'delete') {
    deleteData($data['id']);
    return 'index';
  } elseif ($path === '/index.php' && $data['type'] === 'logout') {
    logout();
    return 'logout';
  } elseif ($path === '/login.php') {
    return checkUser($_POST);
  } elseif ($path === '/register.php') {
    return createUser($_POST);
    return 'register';
  } elseif (!$res || !empty($_SESSION['err'])) {
    return 'back';
  } elseif ($path === '/new.php') {
    create($data);
  } elseif ($path === '/edit.php'){
    update($data);
  }
}

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}

function setToken() {
  $token = sha1(uniqid(mt_rand(), true));
  $_SESSION['token'] = $token;
}

function checkToken($data) {
  if(empty($_SESSION['token']) || ($_SESSION['token'] != $data)) {
    $_SESSION['err'] = '不正な操作です';
    header('location: '.$_SERVER['HTTP_REFERER'].'');
    exit;
  }
  return true;
}

function unsetSession() {
  if(!empty($_SESSION['err']) || !empty($_SESSION['register'])) {
    $_SESSION['err'] = '';
    $_SESSION['register'] = '';
  }
}

function validate($data) {
  return $res = $data != "" ? TRUE : $_SESSION['err'] = '入力がありません';
}

function create($data) {
  if (checkToken($data['token'])) {
    insertDb($data['todo']);
  }
}

function update($data) {
  if (checkToken($data['token'])) {
    updateDb($data['id'], $data['todo']);
  }
}

function deleteData($id) {
  deleteDb($id);
}

function detail($id) {
  return getSelectData($id);
}

function index() {
  return $todos = selectAll();
}

//ここからlogin系統
function checkLogin () {
  if (empty($_SESSION['name'])) header('location: login.php');
}

function checkUser($userData) {
  $name = $userData['name'];
  $password = getSelectPasswordDb($name);
  validatePassword($userData);

  if (password_verify($userData['password'], $password) && checkToken($userData['token'])) {
    session_regenerate_id(TRUE);
    $_SESSION['name'] = $name;
    return 'login';
  } else {
    $_SESSION['err'] = 'User Name または password が誤っています';

    return 'back';
  };
}

function logout() {
  $_SESSION['name'] = '';
}

function createUser($userData) {
  $name = $userData['name'];
  $password = password_hash($userData['password'], PASSWORD_DEFAULT);
  validatePassword($userData);
  confirmPassword($userData['password'], $userData['confirmPassword']);

  if (!getSelectUserNameDb($name) && checkToken($userData['token'])) {
      insertUserDb($name, $password);
      $_SESSION['register'] = '新規作成しました。ログインしてください';

  return 'register';
  } else {
    $_SESSION['err'] = 'そのUser Name はすでに使用されています';

     return'back';
  };
}

function confirmPassword($password, $confirmPassword) {
  if ($password != $confirmPassword) {
    $_SESSION['err'] = '入力した「Password」と「Passwordの確認」が異なります。再度入力してください';

    header('location: '.$_SERVER['HTTP_REFERER'].'');
    exit;
  }
}

function validatePassword($data) {
  if (mb_strlen($data['password']) < 4) {
    $_SESSION['err'] = 'password は４文字以上で入力してください';

    header('location: '.$_SERVER['HTTP_REFERER'].'');
    exit;
  } elseif (preg_match('/[^A-Za-z0-9]/', $data['password']) || preg_match('/[^A-Za-z0-9]/', $data['name'])) {
    $_SESSION['err'] = 'User Name, Password は半角英数字のみ使用できます';

    header('location: '.$_SERVER['HTTP_REFERER'].'');
    exit;
  }
}