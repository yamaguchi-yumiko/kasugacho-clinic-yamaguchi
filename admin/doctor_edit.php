<?php
require_once('config.php');
auth_confirm();
$doctorInfo = new DoctorInfo();

if (isset($_GET['id'])) {
    $doctor_id = $doctorInfo->getDoctorId($_GET['id']);
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
            <?= getPage(); ?>
            <form action="" method="post">
            <input type="hidden" name="add_check">
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
                        <td>男性<input type="radio" name="gender" value="1" <?=(isset($_POST['gender']) && $_POST['gender'] === '1' ? 'checked' : '')?> checked>
                            女性<input type="radio" name="gender" value="2" <?=(isset($_POST['gender']) && $_POST['gender'] === '2' ? ' checked' : '')?>></td>
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
                        <td>医師<input type="radio" name="director" value="0" <?=(isset($_POST['director']) && $_POST['director'] === '0' ? 'checked' : '')?> checked>
                            院長<input type="radio" name="director" value="1" <?=(isset($_POST['director']) && $_POST['director'] === '1' ? 'checked' : '')?>></td>
                    </tr>
                    <tr>
                        <th>院長ひとこと</th>
                        <td><textarea name="directorcomment" cols="70" rows="10"><?=(isset($_POST['directorcomment']) ? $_POST['directorcomment'] : '')?></textarea></td>
                    </tr>
                </table>
                <div class="submid_conteaner">
                    <p><input class="submit" type="submit" name="" value="戻る" formaction="doctor_list.php"></p>
                    <p><input class="submit" type="submit" value="確認画面へ" formaction="doctor_conf.php"></p>
                </div>
            </form>
        <?php else : ?>
            <?php if (isset($_POST['add_return'])) : ?>
                <?= getPage(); ?>
                <form action="" method="post">
                <input type="hidden" name="edit_check">
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
                            <td>男性<input type="radio" name="gender" value="1" <?=(isset($_POST['gender']) && $_POST['gender'] === '1' ? 'checked' : '')?> checked>
                                女性<input type="radio" name="gender" value="2" <?=(isset($_POST['gender']) && $_POST['gender'] === '2' ? ' checked' : '')?>></td>
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
                            <td>医師<input type="radio" name="director" value="0" <?=(isset($_POST['director']) && $_POST['director'] === '0' ? 'checked' : '')?> checked>
                                院長<input type="radio" name="director" value="1" <?=(isset($_POST['director']) && $_POST['director'] === '1' ? 'checked' : '')?>></td>
                        </tr>
                        <tr>
                            <th>院長ひとこと</th>
                            <td><textarea name="directorcomment" cols="70" rows="10"><?=(isset($_POST['directorcomment']) ? $_POST['directorcomment'] : '')?></textarea></td>
                        </tr>
                    </table>
                    <div class="submid_conteaner">
                        <p><input class="submit" type="submit" value="戻る" formaction="doctor_list.php"></p>
                        <p><input class="submit" type="submit" value="確認画面へ" formaction="doctor_conf.php?id=<?=$doctor_id['id']?>"></p>
                    </div>

                </form>
            <?php else : ?>
                <?= getPage(); ?>
                <form action="" method="post">
                <input type="hidden" name="edit_check">
                    <input type="hidden" name="id" value="<?=($doctor_id['id'])?>" />
                    <table class="add_table">
                        <tr>
                            <th>医師名</th>
                            <td><input type="text" name="name" value="<?=$doctor_id['name']?>"></td>
                        </tr>
                        <tr>
                            <th>ローマ字</th>
                            <td><input type="text" name="roman" value="<?=$doctor_id['roman_name']?>"></td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>男性<input type="radio" name="gender" value="1" <?=$doctor_id['gender'] === '1' ? 'checked' : ''?>>
                                女性<input type="radio" name="gender" value="2" <?=$doctor_id['gender'] === '2' ? 'checked' : ''?>></td>
                        </tr>
                        <tr>
                            <th>専門疾患</th>
                            <td><input type="text" name="specialty" size=35 value="<?=$doctor_id['specialty_disease']?>"></td>
                        </tr>
                        <tr>
                            <th>所属学会・認定証</th>
                            <td><textarea name="belong" cols="70" rows="10"><?=$doctor_id['belong']?></textarea></td>
                        </tr>
                        <tr>
                            <th>画像ファイル名</th>
                            <td><input type="text" name="image" value="<?=$doctor_id['img']?>"></td>
                        </tr>
                        <tr>
                            <th>ひとこと</th>
                            <td><textarea name="comment" cols="70" rows="10"><?=$doctor_id['comment']?></textarea></td>
                        </tr>
                        <tr>
                            <th>役職</th>
                            <td>医師<input type="radio" name="director" value="0" <?=$doctor_id['directer_flg'] === '0' ? 'checked' : ''?>>
                                院長<input type="radio" name="director" value="1" <?=$doctor_id['directer_flg'] === '1' ? 'checked' : ''?>></td>
                        </tr>
                        <tr>
                            <th>院長ひとこと</th>
                            <td><textarea name="directorcomment" cols="70" rows="10"><?=$doctor_id['directer_comment']?></textarea></td>
                        </tr>
                    </table>

                    <div class="submid_conteaner">
                        <p><input class="submit" type="submit" name="" value="戻る" formaction="doctor_list.php"></p>
                        <p><input class="submit" type="submit" value="確認画面へ" formaction="doctor_conf.php?id=<?=$doctor_id['id']?>"></p>
                    </div>
                </form>
            <?php endif; ?>
        <?php endif; ?>

    </main>

    <footer class="footer">2020 ebacrop.inc</footer>

</body>

</html>