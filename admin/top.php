<?php
require_once('config.php');
auth_confirm();
?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title>春日町診療所トップ</title>

    <link rel="stylesheet" type="text/css" href="../css/doctormanagement.css" media="all">
</head>

<body class="conteaner">

    <header>
        <div class="header">
            <p>ログイン名[<?=h($_SESSION['name'])?>]さん、ご機嫌いかがですか？</p>
            <p><a href="logout.php">ログアウトする</a></p>
        </div>
        <div class="navlist">
            <ul>
                <li><a href="top.php">top</a></li>
                <li><a href="doctor_list.php">医師管理</a></li>
            </ul>
        </div>
    </header>

    <main class="main">
        <P>アラートはありません。</P>
        <section>
            <div class="section">
                <p>新着情報</p>
            </div>
        </section>
        <section>
            <div class="section">
                <p>優先タスク</p>
            </div>
        </section>
    </main>

    <footer class="footer">2020 ebacrop.inc</footer>

</body>

</html>