<?php
require_once('config.php');
auth_confirm();

$doctor_info = new DoctorInfo();

//GETパラメーターのURLのキーを値に変換、_で分割してGET判定
$param = getParam();

//登録ボタンが押されたらDBに登録する
if (isset($_POST['add_done'])) {

    //もし空の値であればNULLを追加
    $doctor_info->addDoctor([
        insertNull($_POST['name']),
        insertNull($_POST['roman']),
        insertNull($_POST['gender']),
        insertNull($_POST['specialty']),
        insertNull($_POST['belong']),
        insertNull($_POST['image']),
        insertNull($_POST['comment']),
        insertNull($_POST['directer_flg']),
        insertNull($_POST['directer_comment']),
    ]);

    header('Location: doctor_done.php?type=add');
    exit;
}

//更新ボタンが押されたらDBを更新する
if (isset($_POST['edit_done'])) {

    //もし空の値であればNULLを追加
    $doctor_info->editDoctor([
        insertNull($_POST['name']),
        insertNull($_POST['roman']),
        insertNull($_POST['gender']),
        insertNull($_POST['specialty']),
        insertNull($_POST['belong']),
        insertNull($_POST['image']),
        insertNull($_POST['comment']),
        $_POST['directer_flg'],
        insertNull($_POST['directer_comment']),
        $_POST['updatetime'],
        $_GET['id'],
    ]);

    header('Location: doctor_done.php?type=edit');
    exit;
}

//アップデート時の現在時刻を取得
$DateTime = new DateTime();

?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="device- initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title>医師編集確認ページ</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="../css/doctormanagement.css" media="all">
    <script type="text/javascript" src="../js/animation.js"></script>
</head>

<body class="add_conteaner">
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

    <main class="add_main">

        <div class="list_nav">
            <ul>
                <li><a href="#">医師管理名簿</a></li>
            </ul>
        </div>
        <?=getPage();?>
        <form action="" method="post">
            <!-- 入力値の受け渡し -->
            <input type="hidden" name="name" value="<?=$_POST['name']?>" />
            <input type="hidden" name="roman" value="<?=$_POST['roman']?>" />
            <input type="hidden" name="gender" value="<?=$_POST['gender']?>" />
            <input type="hidden" name="specialty" value="<?=$_POST['specialty']?>" />
            <input type="hidden" name="belong" value="<?=$_POST['belong']?>" />
            <input type="hidden" name="image" value="<?=$_POST['image']?>" />
            <input type="hidden" name="comment" value="<?=$_POST['comment']?>" />
            <input type="hidden" name="directer_flg" value="<?=$_POST['directer_flg']?>" />
            <input type="hidden" name="directer_comment" value="<?=$_POST['directer_comment']?>" />

            <table class="add_table">
                <tr>
                    <th>医師名</th>
                    <td><?=$_POST['name']?></td>
                </tr>
                <tr>
                    <th>ローマ字</th>
                    <td><?=$_POST['roman']?></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>
                        <?php if ($_POST['gender'] === '1') : ?>
                            <?='男性'?>
                        <?php elseif ($_POST['gender'] === '2') : ?>
                            <?='女性'?>
                        <?php else : ?>
                            <?='未選択'?>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <th>専門疾患</th>
                    <td><?=$_POST['specialty']?></td>
                </tr>
                <tr>
                    <th>所属学会・認定証</th>
                    <td><?=nl2br($_POST['belong'])?></td>
                </tr>
                <tr>
                    <th>画像ファイル名</th>
                    <td><?=$_POST['image']?></td>
                </tr>
                <tr>
                    <th>ひとこと</th>
                    <td><?=$_POST['comment']?></td>
                </tr>
                <tr>
                    <th>役職</th>
                    <td><?=$_POST['directer_flg'] === '1' ? '院長' : '医師'?></td>
                </tr>
                <tr>
                    <th>院長ひとこと</th>
                    <td><?=$_POST['directer_comment']?></td>
                </tr>
            </table>
            <!-- 編集画面の確認画面ボタンが押されたら -->
            <?php if (isset($param['edit'])) : ?>

                <input type="hidden" name=updatetime value="<?=$_POST['updatetime']?>">
                <input type="hidden" name=updatetime value="<?=$DateTime->format('Y-m-d H:i:s')?>">

                <div class="submid_conteaner">
                    <p><input class="submit" type="submit" value="戻る" formaction="doctor_edit.php?type=edit&id=<?=$_GET['id']?>"></p>
                    <p><input class="submit" type="submit" name="edit_done" value="編集を完了する"></p>
                </div>

                <!-- 登録画面の確認画面ボタンが押されたら -->
            <?php else : ?>
                <div class="submid_conteaner">
                    <p><input class="submit" type="submit" value="戻る" formaction="doctor_edit.php?type=add"></p>
                    <p><input class="submit" type="submit" name="add_done" value="登録完了する"></p>
                </div>
            <?php endif; ?>
    </main>

    <footer class="footer">2020 ebacrop.inc</footer>
</body>

</html>