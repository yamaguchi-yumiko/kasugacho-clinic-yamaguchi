<?php
//ログイン許可が無ければログイン画面に戻る
function auth_confirm()
{
  if (empty($_SESSION['auth'])) {
    header('Location: login.php');
    exit;
  }
}
