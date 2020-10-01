<?php
require_once('config.php');
auth_confirm();

$time = new consultationTime();
//タイムテーブルの時間を取得
$getTimeTable = $time->getTimetable();

$getConsultationTime = $time->getConsultationTime();

if (!empty($_POST)) {

    header('Location: consultation_time_conf.php?time_conf');
    exit;
}

?>

<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title>診療時間編集ページ</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="../css/doctormanagement.css" media="all">
    <script type="text/javascript" src="../js/animation.js"></script>
</head>

<body class="list_conteaner">
    <header>
        <div class="header">
            <p>ログイン名[<?= h($_SESSION['name']) ?>]さん、ご機嫌いかがですか？</p>
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

    <main class="list_main">

        <div class="list_nav">
            <ul>
                <li><a href="#">医師管理名簿</a></li>
            </ul>
        </div>
        <?= getPage(); ?>
        <form action="" method="post">
            <input type="hidden" name="monday" value="1">
            <input type="hidden" name="tuesday" value="2">
            <input type="hidden" name="wednesday" value="3">
            <input type="hidden" name="thursday" value="4">
            <input type="hidden" name="friday" value="5">
            <input type="hidden" name="saturday" value="6">
            <input type="hidden" name="sunday" value="7">
            <input type="hidden" name="timetable1" value="1">
            <input type="hidden" name="timetable2" value="2">

            <table class="consultation-edit-listbox">

                <tr>
                    <th></th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                    <th>日・祝</th>
                </tr>
                <tr>
                    <td><input type="text" size="10" name="time_name1" value="<?= $getTimeTable[0]['name'] ?>">診察時間<input type="text" size="10" name="start_time1" value="<?= $date = (new Datetime($getTimeTable[0]['start_time']))->format('H:i') ?>">〜<input type="text" size="10" name="end_time1" value="<?= $date = (new DateTime($getTimeTable[0]['end_time']))->format('H:i') ?>"></td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type1">
                                <option value="1" <?= (!empty($getConsultationTime[0]['consultation_type']) && $getConsultationTime[0]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[0]['consultation_type']) && $getConsultationTime[0]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[0]['consultation_type']) && $getConsultationTime[0]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select></label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks1" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[0]['consultation_type']) ? $getConsultationTime[0]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type2">
                                <option value="1" <?= (!empty($getConsultationTime[1]['consultation_type']) && $getConsultationTime[1]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[1]['consultation_type']) && $getConsultationTime[1]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[1]['consultation_type']) && $getConsultationTime[1]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks2" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[1]['consultation_type']) ? $getConsultationTime[1]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label"><select name="consultation_type3">
                                <option value="1" <?= (!empty($getConsultationTime[2]['consultation_type']) && $getConsultationTime[2]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[2]['consultation_type']) && $getConsultationTime[2]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[2]['consultation_type']) && $getConsultationTime[2]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks3" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[2]['consultation_type']) ? $getConsultationTime[2]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label"><select name="consultation_type4">
                                <option value="1" <?= (!empty($getConsultationTime[3]['consultation_type']) && $getConsultationTime[3]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[3]['consultation_type']) && $getConsultationTime[3]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[3]['consultation_type']) && $getConsultationTime[3]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks4" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[3]['consultation_type']) ? $getConsultationTime[3]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type5">
                                <option value="1" <?= (!empty($getConsultationTime[4]['consultation_type']) && $getConsultationTime[4]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[4]['consultation_type']) && $getConsultationTime[4]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[4]['consultation_type']) && $getConsultationTime[4]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks5" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[4]['consultation_type']) ? $getConsultationTime[4]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type6">
                                <option value="1" <?= (!empty($getConsultationTime[5]['consultation_type']) && $getConsultationTime[5]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[5]['consultation_type']) && $getConsultationTime[5]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[5]['consultation_type']) && $getConsultationTime[5]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks6" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[5]['consultation_type']) ? $getConsultationTime[5]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type7">
                                <option value="1" <?= (!empty($getConsultationTime[6]['consultation_type']) && $getConsultationTime[6]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[6]['consultation_type']) && $getConsultationTime[6]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[6]['consultation_type']) && $getConsultationTime[6]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks7" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[6]['consultation_type']) ? $getConsultationTime[6]['remarks'] : '') ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><input type="text" size="10" name="time_name2" value="<?= $getTimeTable[1]['name'] ?>">診察時間<input type="text" size="10" name="start_time2" value="<?= $date = (new DateTime($getTimeTable[1]['start_time']))->format('H:i') ?>">〜<input type="text" size="10" name="end_time2" value="<?= $date = (new DateTIme($getTimeTable[1]['end_time']))->format('H:i') ?>"></td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type8">
                                <option value="1" <?= (!empty($getConsultationTime[7]['consultation_type']) && $getConsultationTime[7]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[7]['consultation_type']) && $getConsultationTime[7]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[7]['consultation_type']) && $getConsultationTime[7]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks8" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[7]['consultation_type']) ? $getConsultationTime[7]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type9">
                                <option value="1" <?= (!empty($getConsultationTime[8]['consultation_type']) && $getConsultationTime[8]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[8]['consultation_type']) && $getConsultationTime[8]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[8]['consultation_type']) && $getConsultationTime[8]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks9" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[8]['consultation_type']) ? $getConsultationTime[8]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type10">
                                <option value="1" <?= (!empty($getConsultationTime[9]['consultation_type']) && $getConsultationTime[9]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[9]['consultation_type']) && $getConsultationTime[9]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[9]['consultation_type']) && $getConsultationTime[9]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks10" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[9]['consultation_type']) ? $getConsultationTime[9]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type11">
                                <option value="1" <?= (!empty($getConsultationTime[10]['consultation_type']) && $getConsultationTime[10]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[10]['consultation_type']) && $getConsultationTime[10]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[10]['consultation_type']) && $getConsultationTime[10]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks11" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[10]['consultation_type']) ? $getConsultationTime[10]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type12">
                                <option value="1" <?= (!empty($getConsultationTime[11]['consultation_type']) && $getConsultationTime[11]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[11]['consultation_type']) && $getConsultationTime[11]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[11]['consultation_type']) && $getConsultationTime[11]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks12" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[11]['consultation_type']) ? $getConsultationTime[11]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type13">
                                <option value="1" <?= (!empty($getConsultationTime[12]['consultation_type']) && $getConsultationTime[12]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[12]['consultation_type']) && $getConsultationTime[12]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[12]['consultation_type']) && $getConsultationTime[12]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks13" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[12]['consultation_type']) ? $getConsultationTime[12]['remarks'] : '') ?></textarea>
                    </td>
                    <td>
                        <label class="consultation-edit-label">
                            <select name="consultation_type14">
                                <option value="1" <?= (!empty($getConsultationTime[13]['consultation_type']) && $getConsultationTime[13]['consultation_type'] === '1' ? 'selected' : '') ?>>診察する</option>
                                <option value="2" <?= (!empty($getConsultationTime[13]['consultation_type']) && $getConsultationTime[13]['consultation_type'] === '2' ? 'selected' : '') ?>>特別診察</option>
                                <option value="99" <?= (!empty($getConsultationTime[13]['consultation_type']) && $getConsultationTime[13]['consultation_type'] === '99' ? 'selected' : '') ?>>診察しない</option>
                            </select>
                        </label>
                        <span>備考</span><br><textarea cols="14" rows="4" name="remarks14" placeholder="例)17:00まで"><?= (!empty($getConsultationTime[13]['consultation_type']) ? $getConsultationTime[13]['remarks'] : '') ?></textarea>
                    </td>
                </tr>
            </table>

            <div class="submid_time">
                <p class="time-buttun"><input type="submit" value="戻る" formaction="consultation_time_list.php"></p>
                <p class="time-buttun"><input type="submit" value="確認"></p>
            </div>

        </form>

    </main>

    <footer class="footer">2020 ebacrop.inc</footer>
</body>

</html>