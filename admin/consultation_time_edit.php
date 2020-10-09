<?php
require_once('config.php');
auth_confirm();

$time = new consultationTime();
//タイムテーブルの時間を取得
$timeTable = $time->getTimeTable();
//診療時間を取得
$consultationTime = $time->getConsultationTime();

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
            <p>ログイン名[<?=h($_SESSION['name'])?>]さん、ご機嫌いかがですか？</p>
            <p><a href="logout.php">ログアウトする</a></p>
        </div>
        <div class="navlist">
            <ul>
                <li><a href="top.php">top</a></li>
                <li><a href="doctor_list.php?doctor&list">医師管理</a></li>
                <li><a href="consultation_time_list.php?consultation&list">診療時間管理</a></li>
            </ul>
        </div>
    </header>

    <main class="list_main">

        <div class="list_nav">
            <ul>
                <li><a href="#">診療時間編集</a></li>
            </ul>
        </div>
        <?= getPage(); ?>
        <form action="" method="post">
            <!--曜日毎の値を送信 -->
            <input type="hidden" name="monday" value="1">
            <input type="hidden" name="tuesday" value="2">
            <input type="hidden" name="wednesday" value="3">
            <input type="hidden" name="thursday" value="4">
            <input type="hidden" name="friday" value="5">
            <input type="hidden" name="saturday" value="6">
            <input type="hidden" name="sunday" value="7">

            <!--タイムテーブルのID別に登録するための値を送信 -->
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
                <!-- 確認ページの戻るボタンが押されたら -->
                <?php if (isset($_POST['confreturn'])) : ?>
                    <tr>
                        <td><input type="text" size="10" name="time_name1" value="<?=(isset($_POST['time_name1'])) ? $_POST['time_name1'] : ''?>">
                            診察時間<input type="text" size="10" name="start_time1" value="<?=(isset($_POST['start_time1'])) ? $_POST['start_time1'] : ''?>">
                            〜<input type="text" size="10" name="end_time1" value="<?=(isset($_POST['end_time1'])) ? $_POST['end_time1'] : ''?>"></td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type1">
                                    <option value="1" <?=(isset($_POST['consultation_type1']) && $_POST['consultation_type1'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type1']) && $_POST['consultation_type1'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type1']) && $_POST['consultation_type1'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks1" placeholder="例)17:00まで"><?=(isset($_POST['remarks1']) ? $_POST['remarks1'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type2">
                                    <option value="1" <?=(isset($_POST['consultation_type2']) && $_POST['consultation_type2'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type2']) && $_POST['consultation_type2'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type2']) && $_POST['consultation_type2'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks2" placeholder="例)17:00まで"><?=(isset($_POST['remarks2']) ? $_POST['remarks2'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type3">
                                    <option value="1" <?=(isset($_POST['consultation_type3']) && $_POST['consultation_type3'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type3']) && $_POST['consultation_type3'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type3']) && $_POST['consultation_type3'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks3" placeholder="例)17:00まで"><?= (isset($_POST['remarks3']) ? $_POST['remarks3'] : '') ?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type4">
                                    <option value="1" <?=(isset($_POST['consultation_type4']) && $_POST['consultation_type4'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type4']) && $_POST['consultation_type4'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type4']) && $_POST['consultation_type4'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks4" placeholder="例)17:00まで"><?= (isset($_POST['remarks4']) ? $_POST['remarks4'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type5">
                                    <option value="1" <?=(isset($_POST['consultation_type5']) && $_POST['consultation_type5'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type5']) && $_POST['consultation_type5'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type5']) && $_POST['consultation_type5'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks5" placeholder="例)17:00まで"><?=(isset($_POST['remarks5']) ? $_POST['remarks5'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type6">
                                    <option value="1" <?=(isset($_POST['consultation_type6']) && $_POST['consultation_type6'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type6']) && $_POST['consultation_type6'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type6']) && $_POST['consultation_type6'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks6" placeholder="例)17:00まで"><?=(isset($_POST['remarks6']) ? $_POST['remarks6'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type7">
                                    <option value="1" <?=(isset($_POST['consultation_type7']) && $_POST['consultation_type7'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type7']) && $_POST['consultation_type7'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type7']) && $_POST['consultation_type7'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks7" placeholder="例)17:00まで"><?=(isset($_POST['remarks7']) ? $_POST['remarks7'] : '')?></textarea>
                        </td>
                    <tr>
                        <td><input type="text" size="10" name="time_name2" value="<?=(isset($_POST['time_name2'])) ? $_POST['time_name2'] : ''?>">
                            診察時間<input type="text" size="10" name="start_time2" value="<?=(isset($_POST['start_time2'])) ? $_POST['start_time2'] : ''?>">
                            〜<input type="text" size="10" name="end_time2" value="<?=(isset($_POST['end_time2'])) ? $_POST['end_time2'] : ''?>"></td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type8">
                                    <option value="1" <?=(isset($_POST['consultation_type8']) && $_POST['consultation_type8'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type8']) && $_POST['consultation_type8']==='2' ? 'selected' : '' )?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type8']) && $_POST['consultation_type8'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks8" placeholder="例)17:00まで"><?=(isset($_POST['remarks8']) ? $_POST['remarks8'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type9">
                                    <option value="1" <?=(isset($_POST['consultation_type9']) && $_POST['consultation_type9'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type9']) && $_POST['consultation_type9'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type9']) && $_POST['consultation_type9'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks9" placeholder="例)17:00まで"><?=(isset($_POST['remarks9']) ? $_POST['remarks9'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type10">
                                    <option value="1" <?=(isset($_POST['consultation_type10']) && $_POST['consultation_type10'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type10']) && $_POST['consultation_type10'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type10']) && $_POST['consultation_type10'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks10" placeholder="例)17:00まで"><?=(isset($_POST['remarks10']) ? $_POST['remarks10'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type11">
                                    <option value="1" <?=(isset($_POST['consultation_type11']) && $_POST['consultation_type11'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type11']) && $_POST['consultation_type11'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type11']) && $_POST['consultation_type11'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks11" placeholder="例)17:00まで"><?=(isset($_POST['remarks11']) ? $_POST['remarks11'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type12">
                                    <option value="1" <?=(isset($_POST['consultation_type12']) && $_POST['consultation_type12'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type12']) && $_POST['consultation_type12'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type12']) && $_POST['consultation_type12'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks12" placeholder="例)17:00まで"><?=(isset($_POST['remarks12']) ? $_POST['remarks12'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type13">
                                    <option value="1" <?=(isset($_POST['consultation_type13']) && $_POST['consultation_type13'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type13']) && $_POST['consultation_type13'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type13']) && $_POST['consultation_type13'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks13" placeholder="例)17:00まで"><?=(isset($_POST['remarks13']) ? $_POST['remarks13'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type14">
                                    <option value="1" <?=(isset($_POST['consultation_type14']) && $_POST['consultation_type14'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(isset($_POST['consultation_type14']) && $_POST['consultation_type14'] === '2' ? 'selected' : '')?>> 特別時間</option>
                                    <option value="99" <?=(isset($_POST['consultation_type14']) && $_POST['consultation_type14'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks14" placeholder="例)17:00まで"><?=(isset($_POST['remarks14']) ? $_POST['remarks14'] : '')?></textarea>
                        </td>
                    </tr>
                <!--初期表示-->
                <?php else : ?>
                    <tr>
                        <td><input type="text" size="10" name="time_name1" value="<?=$timeTable[0]['name']?>">診察時間<input type="text" size="10" name="start_time1" value="<?=changeTimeFormat($timeTable[0]['start_time'])?>">〜<input type="text" size="10" name="end_time1" value="<?=changeTimeFormat($timeTable[0]['end_time'])?>"></td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type1">
                                    <option value="1" <?=(!empty($consultationTime[0]['consultation_type']) && $consultationTime[0]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[0]['consultation_type']) && $consultationTime[0]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[0]['consultation_type']) && $consultationTime[0]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select></label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks1" placeholder="例)17:00まで"><?=(!empty($consultationTime[0]['consultation_type']) ? $consultationTime[0]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type2">
                                    <option value="1" <?=(!empty($consultationTime[1]['consultation_type']) && $consultationTime[1]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[1]['consultation_type']) && $consultationTime[1]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[1]['consultation_type']) && $consultationTime[1]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks2" placeholder="例)17:00まで"><?=(!empty($consultationTime[1]['consultation_type']) ? $consultationTime[1]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label"><select name="consultation_type3">
                                    <option value="1" <?=(!empty($consultationTime[2]['consultation_type']) && $consultationTime[2]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[2]['consultation_type']) && $consultationTime[2]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[2]['consultation_type']) && $consultationTime[2]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks3" placeholder="例)17:00まで"><?=(!empty($consultationTime[2]['consultation_type']) ? $consultationTime[2]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label"><select name="consultation_type4">
                                    <option value="1" <?=(!empty($consultationTime[3]['consultation_type']) && $consultationTime[3]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[3]['consultation_type']) && $consultationTime[3]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[3]['consultation_type']) && $consultationTime[3]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks4" placeholder="例)17:00まで"><?=(!empty($consultationTime[3]['consultation_type']) ? $consultationTime[3]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type5">
                                    <option value="1" <?=(!empty($consultationTime[4]['consultation_type']) && $consultationTime[4]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[4]['consultation_type']) && $consultationTime[4]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[4]['consultation_type']) && $consultationTime[4]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks5" placeholder="例)17:00まで"><?=(!empty($consultationTime[4]['consultation_type']) ? $consultationTime[4]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type6">
                                    <option value="1" <?=(!empty($consultationTime[5]['consultation_type']) && $consultationTime[5]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[5]['consultation_type']) && $consultationTime[5]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[5]['consultation_type']) && $consultationTime[5]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks6" placeholder="例)17:00まで"><?=(!empty($consultationTime[5]['consultation_type']) ? $consultationTime[5]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type7">
                                    <option value="1" <?=(!empty($consultationTime[6]['consultation_type']) && $consultationTime[6]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[6]['consultation_type']) && $consultationTime[6]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[6]['consultation_type']) && $consultationTime[6]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks7" placeholder="例)17:00まで"><?=(!empty($consultationTime[6]['consultation_type']) ? $consultationTime[6]['remarks'] : '')?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" size="10" name="time_name2" value="<?=$timeTable[1]['name'] ?>">診察時間<input type="text" size="10" name="start_time2" value="<?=changeTimeFormat($timeTable[1]['start_time'])?>">〜<input type="text" size="10" name="end_time2" value="<?=changeTimeFormat($timeTable[1]['end_time'])?>"></td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type8">
                                    <option value="1" <?=(!empty($consultationTime[7]['consultation_type']) && $consultationTime[7]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[7]['consultation_type']) && $consultationTime[7]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[7]['consultation_type']) && $consultationTime[7]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks8" placeholder="例)17:00まで"><?=(!empty($consultationTime[7]['consultation_type']) ? $consultationTime[7]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type9">
                                    <option value="1" <?=(!empty($consultationTime[8]['consultation_type']) && $consultationTime[8]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[8]['consultation_type']) && $consultationTime[8]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[8]['consultation_type']) && $consultationTime[8]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks9" placeholder="例)17:00まで"><?=(!empty($consultationTime[8]['consultation_type']) ? $consultationTime[8]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type10">
                                    <option value="1" <?=(!empty($consultationTime[9]['consultation_type']) && $consultationTime[9]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[9]['consultation_type']) && $consultationTime[9]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[9]['consultation_type']) && $consultationTime[9]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks10" placeholder="例)17:00まで"><?=(!empty($consultationTime[9]['consultation_type']) ? $consultationTime[9]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type11">
                                    <option value="1" <?=(!empty($consultationTime[10]['consultation_type']) && $consultationTime[10]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[10]['consultation_type']) && $consultationTime[10]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[10]['consultation_type']) && $consultationTime[10]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks11" placeholder="例)17:00まで"><?=(!empty($consultationTime[10]['consultation_type']) ? $consultationTime[10]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type12">
                                    <option value="1" <?=(!empty($consultationTime[11]['consultation_type']) && $consultationTime[11]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[11]['consultation_type']) && $consultationTime[11]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[11]['consultation_type']) && $consultationTime[11]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks12" placeholder="例)17:00まで"><?=(!empty($consultationTime[11]['consultation_type']) ? $consultationTime[11]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type13">
                                    <option value="1" <?=(!empty($consultationTime[12]['consultation_type']) && $consultationTime[12]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[12]['consultation_type']) && $consultationTime[12]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[12]['consultation_type']) && $consultationTime[12]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks13" placeholder="例)17:00まで"><?=(!empty($consultationTime[12]['consultation_type']) ? $consultationTime[12]['remarks'] : '')?></textarea>
                        </td>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type14">
                                    <option value="1" <?=(!empty($consultationTime[13]['consultation_type']) && $consultationTime[13]['consultation_type'] === '1' ? 'selected' : '')?>>診察する</option>
                                    <option value="2" <?=(!empty($consultationTime[13]['consultation_type']) && $consultationTime[13]['consultation_type'] === '2' ? 'selected' : '')?>>特別診察</option>
                                    <option value="99" <?=(!empty($consultationTime[13]['consultation_type']) && $consultationTime[13]['consultation_type'] === '99' ? 'selected' : '')?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br><textarea cols="14" rows="4" name="remarks14" placeholder="例)17:00まで"><?=(!empty($consultationTime[13]['consultation_type']) ? $consultationTime[13]['remarks'] : '')?></textarea>
                        </td>
                    </tr>
                <?php endif; ?>
            </table>

            <div class="submid_time">
                <p class="time-buttun"><input type="submit" value="戻る" formaction="consultation_time_list.php?consultation&list"></p>
                <p class="time-buttun"><input type="submit" name="conf" value="確認" formaction="consultation_time_conf.php?consultation&editConf"></p>
            </div>

        </form>

    </main>

    <footer class="footer">2020 ebacrop.inc</footer>
</body>

</html>