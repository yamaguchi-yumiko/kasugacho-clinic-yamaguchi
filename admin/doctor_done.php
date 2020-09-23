<?php
require_once('config.php');
auth_confirm();

?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="device- initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title>医師名簿登録完了ページ</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="../css/doctormanagement.css" media="all">
    <script type="text/javascript" src="../js/animation.js"></script>
</head>

<body class="add_conteaner">
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

    <main class="done_main">

        <div class="list_nav">
            <ul>
                <li><a href="#">医師管理名簿</a></li>
            </ul>
        </div>

        <?php if (isset($_GET['add_done'])) : ?>

            <?=getPage();?>
            <p class="complete">登録が完了しました。</p>

        <?php else : ?>

            <?=getPage();?>
            <p class="complete">編集が完了しました。</p>

        <?php endif; ?>
    </main>

    <footer class="footer">2020 ebacrop.inc</footer>
</body>

</html>