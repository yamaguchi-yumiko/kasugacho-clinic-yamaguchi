<?php
require_once('config.php');
auth_confirm();

$doctor_info = new DoctorInfo();
$doctor_sort = $doctor_info->getDoctorInfo();

//削除を押したらdelete_flgを１にして非表示
if (isset($_GET['id'])) {
    $doctor_info->deleteDoctor($_GET['id']);
    header('Location: doctor_list.php');
    exit;
}
?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title>医師管理リストページ</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="../css/doctormanagement.css" media="all">
    <script type="text/javascript" src="../js/animation.js"></script>
</head>

<body class="list_conteaner">
    <header>
        <div class="header">
            <p>ログイン名[<?=$_SESSION['name']?>]さん、ご機嫌いかがですか？</p>
            <p><a href="logout.php">ログアウトする</a></p>
        </div>
        <div class="navlist">
            <ul>
                <li><a href="top.php">top</a></li>
                <li><a href="doctor_list.php">医師管理</a></li>
                <li><a href="consultation_time_list.php">診療時間管理</a></li>
            </ul>
        </div>
    </header>

    <main class="list_main">

        <div class="list_nav">
            <ul>
                <li><a href="#">医師管理名簿</a></li>
            </ul>
        </div>
        <?=getPage();?>
        <table class="listbox">
            <tr>
                <th>ID<div class="sort"><a href="?sort=id_desc">&#9650</a><a href="?sort=id_asc">&#9660</a></div>
                </th>
                <th>医師名<div class="sort"><a href="?sort=name_desc">&#9650</a><a href="?sort=name_asc">&#9660</a></div>
                </th>
                <th>画像</th>
                <th>登録日時</th>
                <th>更新日時<div class="sort"><a href="?sort=update_desc">&#9650</a><a href="?sort=update_asc">&#9660</a></div>
                </th>
                <th><a class="add_buttun" href="doctor_edit.php?type=add">新規登録</a></th>
            </tr>
            <?php foreach ($doctor_sort as $doctors) : ?>
                <tr>
                    <td><?=$doctors['id']?></td>
                    <td><?=$doctors['name']?></td>
                    <td><?=$doctors['img']?></td>
                    <td><?=$doctors['created_at']?></td>
                    <td><?=$doctors['updated_at']?></td>
                    <td><a class="buttun" href="doctor_edit.php?type=edit&id=<?=$doctors['id']?>">
                    編集</a><a class="buttun" href="?sort=id_desc&id=<?=$doctors['id']?>" onclick="return MoveChak()">削除</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </main>

    <footer class="footer">2020 ebacrop.inc</footer>
</body>

</html>