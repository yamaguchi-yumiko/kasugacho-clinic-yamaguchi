<?php
require_once('config.php');
auth_confirm();

$doctor_info = new DoctorInfo();

//GETパラメーターのURLのキーを値に変換、_で分割してGET判定
$param = getParam();

//リスト画面の編集ボタンがが押されたたら医師情報の内容を取得
if (isset($param['edit'])) {
    $doctorId = $doctor_info->getDoctorIdInfo($_GET['id']);
}

?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="device- initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title>医師登録・編集ページ</title>
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

        <!-- リスト画面の編集ボタンが押されたら-->
        <?php if (isset($param['edit'])) : ?>
            <?=getPage();?>
            <form action="" method="post">
                <table class="add_table">
                    <tr>
                        <th>医師名</th>
                        <td><input type="text" name="name" value="<?=$doctorId['name']?>"></td>
                    </tr>
                    <tr>
                        <th>ローマ字</th>
                        <td><input type="text" name="roman" value="<?=$doctorId['roman_name']?>"></td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            未選択<input type="radio" name="gender" value="" <?=$doctorId['gender'] === NULL ? 'checked' : ''?>>
                            男性<input type="radio" name="gender" value="1" <?=$doctorId['gender'] === '1' ? 'checked' : ''?>>
                            女性<input type="radio" name="gender" value="2" <?=$doctorId['gender'] === '2' ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <th>専門疾患</th>
                        <td><input type="text" name="specialty" size=35 value="<?=$doctorId['specialty_disease']?>"></td>
                    </tr>
                    <tr>
                        <th>所属学会・認定証</th>
                        <td><textarea name="belong" cols="70" rows="10"><?=$doctorId['belong']?></textarea></td>
                    </tr>
                    <tr>
                        <th>画像ファイル名</th>
                        <td><input type="text" name="image" value="<?=$doctorId['img']?>"></td>
                    </tr>
                    <tr>
                        <th>ひとこと</th>
                        <td><textarea name="comment" cols="70" rows="10"><?=$doctorId['comment']?></textarea></td>
                    </tr>
                    <tr>
                        <th>役職</th>
                        <td>
                            医師<input type="radio" name="directer_flg" value="0" <?=$doctorId['directer_flg'] === '0' ? 'checked' : ''?>>
                            院長<input type="radio" name="directer_flg" value="1" <?=$doctorId['directer_flg'] === '1' ? 'checked' : ''?>>
                        </td>
                    </tr>
                    <tr>
                        <th>院長ひとこと</th>
                        <td><textarea name="directer_comment" cols="70" rows="10"><?=$doctorId['directer_comment']?></textarea></td>
                    </tr>
                </table>

                <div class="submid_conteaner">
                    <p><input class="submit" type="submit" value="戻る" formaction="doctor_list.php"></p>
                    <p><input class="submit" type="submit" value="確認画面へ" formaction="doctor_conf.php?type=edit&id=<?=$doctorId['id']?>"></p>
                </div>
            </form>
            <!-- リスト画面の登録ボタンが押されたら-->
        <?php else : ?>
            <?= getPage(); ?>
            <form action="" method="post">
                <table class="add_table">
                    <tr>
                        <th>医師名</th>
                        <td><input type="text" name="name" value="<?=(isset($_POST['name']) ? $_POST['name'] : '')?>"></td>
                    </tr>
                    <tr>
                        <th>ローマ字</th>
                        <td><input type="text" name="roman" value="<?=(isset($_POST['roman']) ? $_POST['roman'] : '')?>"></td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            未選択<input type="radio" name="gender" value="" <?=(isset($_POST['gender']) && $_POST['gender'] === '' ? 'checked' : '')?> checked>
                            男性<input type="radio" name="gender" value="1" <?=(isset($_POST['gender']) && $_POST['gender'] === '1' ? 'checked' : '')?>>
                            女性<input type="radio" name="gender" value="2" <?=(isset($_POST['gender']) && $_POST['gender'] === '2' ? ' checked' : '')?>>
                        </td>
                    </tr>
                    <tr>
                        <th>専門疾患</th>
                        <td><input type="text" name="specialty" size=35 value="<?=(isset($_POST['specialty']) ? $_POST['specialty'] : '')?>"></td>
                    </tr>
                    <tr>
                        <th>所属学会・認定証</th>
                        <td><textarea name="belong" cols="70" rows="10"><?=(isset($_POST['belong']) ? $_POST['belong'] : '')?></textarea></td>
                    </tr>
                    <tr>
                        <th>画像ファイル名</th>
                        <td><input type="text" name="image" value="<?=(isset($_POST['image']) ? $_POST['image'] : '')?>"></td>
                    </tr>
                    <tr>
                        <th>ひとこと</th>
                        <td><textarea name="comment" cols="70" rows="10"><?=(isset($_POST['comment']) ? $_POST['comment'] : '')?></textarea></td>
                    </tr>
                    <tr>
                        <th>役職</th>
                        <td>
                            医師<input type="radio" name="directer_flg" value="0" <?=(isset($_POST['directer_flg']) && $_POST['directer_flg'] === '0' ? 'checked' : '')?> checked>
                            院長<input type="radio" name="directer_flg" value="1" <?=(isset($_POST['directer_flg']) && $_POST['directer_flg'] === '1' ? 'checked' : '')?>>
                        </td>
                    </tr>
                    <tr>
                        <th>院長ひとこと</th>
                        <td><textarea name="directer_comment" cols="70" rows="10"><?=(isset($_POST['directer_comment']) ? $_POST['directer_comment'] : '')?></textarea></td>
                    </tr>
                </table>

                <!-- リスト画面の登録ボタンが押されたら、または編集画面の戻るボタンが押されたたら -->
                <?php if (isset($param['add'])) : ?>

                    <div class="submid_conteaner">
                        <p><input class="submit" type="submit" value="戻る" formaction="doctor_list.php"></p>
                        <p><input class="submit" type="submit" value="確認画面へ" formaction="doctor_conf.php?type=add"></p>
                    </div>

                    <!-- 編集画面の戻るボタンが押されたら -->
                <?php else : ?>

                    <div class="submid_conteaner">
                        <p><input class="submit" type="submit" value="戻る" formaction="doctor_list.php"></p>
                        <p><input class="submit" type="submit" value="確認画面へ" formaction="doctor_conf.php&id=<?=$doctorId['id']?>&type=edit"></p>
                    </div>

                <?php endif; ?>
                </form>

            <?php endif; ?>
    </main>

    <footer class="footer">2020 ebacrop.inc</footer>

</body>

</html>