<?php
require_once('config.php');
auth_confirm();

$doctorInfo = new DoctorInfo();

//登録ボタンが押されたらDBに登録する
if (!empty($_POST['add_done'])) {
    $doctorInfo->addDoctor([$_POST['name'], $_POST['roman'], $_POST['gender'],$_POST['specialty'],$_POST['belong'], $_POST['image'], $_POST['comment'], $_POST['director'], $_POST['directorcomment']]);
    header('Location: doctor_done.php?add_done');
    exit;
}

//更新ボタンが押されたらDBを更新する
if (!empty($_POST['edit_done'])) {
    $doctorInfo->editDoctor([$_POST['name'],$_POST['roman'],$_POST['gender'],$_POST['specialty'],$_POST['belong'],$_POST['image'], $_POST['comment'],
    $_POST['director'],$_POST['directorcomment'], $_POST['datetime'], $_GET['id']]);
    header('Location: doctor_done.php?edit_done');
    exit;
}

//登録確認画面の戻るボタンが押されたら登録ページへリダイレクト
if (isset($_POST['add_return'])) {
    header("Location: doctor_edit.php?add");
    exit;
}

//編集確認画面の戻るボタンが押されたら編集ページへリダイレクト
if (isset($_POST['edit_return'])) {
    header("Location: doctor_edit.php?id=$_GET[id]");
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
            <p>ログイン名[<?=h($_SESSION['name'])?>]さん、ご機嫌いかがですか？</p>
            <p><a href="logout.php">ログアウトする</a></p>
        </div>
        <div class="navlist">
            <ul>
                <li><a href="top.php">top</a></li>
                <li><a href="doctor_list.php">医師管理</a></li>
                <li><a href="consultation_time_list.php?time">診療時間管理</a></li>
            </ul>
        </div>
    </header>

    <main class="add_main">

        <div class="list_nav">
            <ul>
                <li><a href="#">医師管理名簿</a></li>
            </ul>
        </div>

        <?php if (!isset($_GET['id'])) : ?>
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
                <input type="hidden" name="director" value="<?=$_POST['director']?>" />
                <input type="hidden" name="directorcomment" value="<?=$_POST['directorcomment']?>" />

                <table class="add_table">
                    <tr>
                        <th>医師名</th>
                        <td><?=h($_POST['name'])?></td>
                    </tr>
                    <tr>
                        <th>ローマ字</th>
                        <td><?=h($_POST['roman'])?></td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td><?=h($_POST['gender']) === '1' ? '男性' : '女性'?></td>
                    </tr>
                    <tr>
                        <th>専門疾患</th>
                        <td><?=h($_POST['specialty'])?></td>
                    </tr>
                    <tr>
                        <th>所属学会・認定証</th>
                        <td><?=nl2br(h($_POST['belong']))?></td>
                    </tr>
                    <tr>
                        <th>画像ファイル名</th>
                        <td><?=h($_POST['image'])?></td>
                    </tr>
                    <tr>
                        <th>ひとこと</th>
                        <td><?=h($_POST['comment'])?></td>
                    </tr>
                    <tr>
                        <th>役職</th>
                        <td><?=h($_POST['director']) === '1' ? '院長' : '医師'?></td>
                    </tr>
                    <tr>
                        <th>院長ひとこと</th>
                        <td><?=h($_POST['directorcomment'])?></td>
                    </tr>
                </table>
                <div class="submid_conteaner">
                    <p><input class="submit" type="submit" name="add_return" value="戻る"></p>
                    <p><input class="submit" type="submit" name="add_done" value="登録完了する"></p>
                </div>
            <?php else : ?>
                <?=getPage();?>
                <form action="" method="post">
                    <!-- 入力値の受け渡し -->
                    <input type="hidden" name="name" value="<?=$_POST['name']?>" />
                    <input type="hidden" name="roman" value="<?=$_POST['roman']?>" />
                    <input type="hidden" name="gender" value="<?=$_POST['gender']?>" />
                    <input type="hidden" name="specialty" value="<?=$_POST['specialty']?>" />
                    <input type="hidden" name="belong" value="<?=$_POST['belong']?>" />
                    <input type="hidden" name="image" value="<?=$_POST['image'] ?>" />
                    <input type="hidden" name="comment" value="<?=$_POST['comment']?>" />
                    <input type="hidden" name="director" value="<?=$_POST['director']?>" />
                    <input type="hidden" name="directorcomment" value="<?=$_POST['directorcomment']?>" />
                    <input type="hidden" name=datetime value="<?=$_POST['datetime'] ?>">
                    <input type="hidden" name=datetime value="<?=$DateTime->format('Y-m-d H:i:s')?>">

                    <table class="add_table">
                        <tr>
                            <th>医師名</th>
                            <td><?=h($_POST['name'])?></td>
                        </tr>
                        <tr>
                            <th>ローマ字</th>
                            <td><?=h($_POST['roman'])?></td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td><?=h($_POST['gender']) === '1' ? '男性' : '女性'?></td>
                        </tr>
                        <tr>
                            <th>専門疾患</th>
                            <td><?=h($_POST['specialty'])?></td>
                        </tr>
                        <tr>
                            <th>所属学会・認定証</th>
                            <td><?=nl2br(h($_POST['belong']))?></td>
                        </tr>
                        <tr>
                            <th>画像ファイル名</th>
                            <td><?=h($_POST['image'])?></td>
                        </tr>
                        <tr>
                            <th>ひとこと</th>
                            <td><?=h($_POST['comment'])?></td>
                        </tr>
                        <tr>
                            <th>役職</th>
                            <td><?=h($_POST['director']) === '1' ? '院長' : '医師'?></td>
                        </tr>
                        <tr>
                            <th>院長ひとこと</th>
                            <td><?=h($_POST['directorcomment'])?></td>
                        </tr>
                    </table>
                    <div class="submid_conteaner">
                        <p><input class="submit" type="submit" name="edit_return" value="戻る"></p>
                        <p><input class="submit" type="submit" name="edit_done" value="編集を完了する"></p>
                    </div>
                </form>
            <?php endif; ?>

    </main>

    <footer class="footer">2020 ebacrop.inc</footer>
</body>

</html>