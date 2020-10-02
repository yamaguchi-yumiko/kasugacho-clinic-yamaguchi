<?php
require_once('config.php');
auth_confirm();

$time = new consultationTime();
//タイムテーブルの時間を取得
$time_table = $time->getTimetable();

$consultation_time = $time->getConsultationTime();

if (isset($_POST['edit_return'])) {
    header('Location:consultation_time_edit.php?time_edit');
    exit;
}


if (!empty($_POST['done'])) {

    $time->addConsultationTime([$_POST['monday'], $_POST['timetable1'], $_POST['consultation_type1'], $_POST['remarks1']]);
    $time->addConsultationTime([$_POST['tuesday'], $_POST['timetable1'], $_POST['consultation_type2'], $_POST['remarks2']]);
    $time->addConsultationTime([$_POST['wednesday'], $_POST['timetable1'], $_POST['consultation_type3'], $_POST['remarks3']]);
    $time->addConsultationTime([$_POST['thursday'], $_POST['timetable1'], $_POST['consultation_type4'], $_POST['remarks4']]);
    $time->addConsultationTime([$_POST['friday'], $_POST['timetable1'], $_POST['consultation_type5'], $_POST['remarks5']]);
    $time->addConsultationTime([$_POST['saturday'], $_POST['timetable1'], $_POST['consultation_type6'], $_POST['remarks6']]);
    $time->addConsultationTime([$_POST['sunday'], $_POST['timetable1'], $_POST['consultation_type7'], $_POST['remarks7']]);

    $time->addConsultationTime([$_POST['monday'], $_POST['timetable2'], $_POST['consultation_type8'], $_POST['remarks8']]);
    $time->addConsultationTime([$_POST['tuesday'], $_POST['timetable2'], $_POST['consultation_type9'], $_POST['remarks9']]);
    $time->addConsultationTime([$_POST['wednesday'], $_POST['timetable2'], $_POST['consultation_type10'], $_POST['remarks10']]);
    $time->addConsultationTime([$_POST['thursday'], $_POST['timetable2'], $_POST['consultation_type11'], $_POST['remarks11']]);
    $time->addConsultationTime([$_POST['friday'], $_POST['timetable2'], $_POST['consultation_type12'], $_POST['remarks12']]);
    $time->addConsultationTime([$_POST['saturday'], $_POST['timetable2'], $_POST['consultation_type13'], $_POST['remarks13']]);
    $time->addConsultationTime([$_POST['sunday'], $_POST['timetable2'], $_POST['consultation_type14'], $_POST['remarks14']]);

    $time->updateTime1([$_POST['time_name1'], $_POST['start_time1'], $_POST['end_time1']]);
    $time->updateTime2([$_POST['time_name2'], $_POST['start_time2'], $_POST['end_time2']]);

    header('Location: consultation_time_done.php?time_done');
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

    <main class="list_main">

        <div class="list_nav">
            <ul>
                <li><a href="#">医師管理名簿</a></li>
            </ul>
        </div>
        <?=getPage();?>
        <form action="" method="post">
        <!-- 入力値の受け渡し -->
            <input type="hidden" name="monday" value="1">
            <input type="hidden" name="tuesday" value="2">
            <input type="hidden" name="wednesday" value="3">
            <input type="hidden" name="thursday" value="4">
            <input type="hidden" name="friday" value="5">
            <input type="hidden" name="saturday" value="6">
            <input type="hidden" name="sunday" value="7">
            <input type="hidden" name="timetable1" value="1">
            <input type="hidden" name="timetable2" value="2">

            <input type="hidden" name="consultation_type1" value="<?=$_POST['consultation_type1']?>">
            <input type="hidden" name="remarks1" value="<?=$_POST['remarks1']?>">
            <input type="hidden" name="consultation_type2" value="<?=$_POST['consultation_type2']?>">
            <input type="hidden" name="remarks2" value="<?=$_POST['remarks2']?>">
            <input type="hidden" name="consultation_type3" value="<?=$_POST['consultation_type3']?>">
            <input type="hidden" name="remarks3" value="<?=$_POST['remarks3']?>">
            <input type="hidden" name="consultation_type4" value="<?=$_POST['consultation_type4']?>">
            <input type="hidden" name="remarks4" value="<?=$_POST['remarks4']?>">
            <input type="hidden" name="consultation_type4" value="<?=$_POST['consultation_type4']?>">
            <input type="hidden" name="remarks4" value="<?=$_POST['remarks4']?>">
            <input type="hidden" name="consultation_type5" value="<?=$_POST['consultation_type5']?>">
            <input type="hidden" name="remarks5" value="<?=$_POST['remarks5']?>">
            <input type="hidden" name="consultation_type2" value="<?=$_POST['consultation_type5']?>">
            <input type="hidden" name="remarks5" value="<?=$_POST['remarks5']?>">
            <input type="hidden" name="consultation_type6" value="<?=$_POST['consultation_type6']?>">
            <input type="hidden" name="remarks6" value="<?=$_POST['remarks6']?>">
            <input type="hidden" name="consultation_type7" value="<?=$_POST['consultation_type7']?>">
            <input type="hidden" name="remarks7" value="<?=$_POST['remarks7']?>">
            <input type="hidden" name="consultation_type7" value="<?=$_POST['consultation_type7']?>">
            <input type="hidden" name="remarks8" ls
            value="<?=$_POST['remarks8']?>">
            <input type="hidden" name="consultation_type8" value="<?=$_POST['consultation_type8']?>">
            <input type="hidden" name="remarks8" value="<?=$_POST['remarks8']?>">
            <input type="hidden" name="consultation_type8" value="<?=$_POST['consultation_type8']?>">
            <input type="hidden" name="remarks7" value="<?=$_POST['remarks7']?>">
            <input type="hidden" name="consultation_type9" value="<?=$_POST['consultation_type9']?>">
            <input type="hidden" name="remarks9" value="<?=$_POST['remarks9']?>">
            <input type="hidden" name="consultation_type10" value="<?=$_POST['consultation_type10']?>">
            <input type="hidden" name="remarks10" value="<?=$_POST['remarks10']?>">
            <input type="hidden" name="consultation_type11" value="<?=$_POST['consultation_type11']?>">
            <input type="hidden" name="remarks11" value="<?=$_POST['remarks11']?>">
            <input type="hidden" name="consultation_type12" value="<?=$_POST['consultation_type12']?>">
            <input type="hidden" name="remarks12" value="<?=$_POST['remarks12']?>">
            <input type="hidden" name="consultation_type13" value="<?=$_POST['consultation_type13']?>">
            <input type="hidden" name="remarks13" value="<?=$_POST['remarks13']?>">
            <input type="hidden" name="consultation_type14" value="<?=$_POST['consultation_type14']?>">
            <input type="hidden" name="remarks14" value="<?=$_POST['remarks14']?>">

            <input type="hidden" name="time_name1" value="<?=$_POST['time_name1']?>">
            <input type="hidden" name="start_time1" value="<?=$_POST['start_time1']?>">
            <input type="hidden" name="end_time1" value="<?=$_POST['end_time1']?>">

            <input type="hidden" name="time_name2" value="<?=$_POST['time_name2']?>">
            <input type="hidden" name="start_time2" value="<?=$_POST['start_time2']?>">
            <input type="hidden" name="end_time2" value="<?=$_POST['end_time2']?>">

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
                    <td class="time"><p><?=$_POST['time_name1']?></p>診療時間<p><?=getDateTime($_POST['start_time1']) ?></p>〜<p><?=getDateTime($_POST['end_time1'])?></p></td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type1'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks1']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type2'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks2']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type3'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks3']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type4'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks4']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type5'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks5']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type6'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks6']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type7'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks7']?></p>
                    </td>
                </tr>
                <tr>
                <td class="time"><p><?=$_POST['time_name2'] ?></p>診療時間<p><?=getDateTime($_POST['start_time2']) ?></p>〜<p><?=getDateTime($_POST['end_time2'])?></p></td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type8'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks8']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type9'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks9']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type10'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks10']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type11'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks11']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type12'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks12']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type13'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks13']?></p>
                    </td>
                    <td>
                        <p class="consultation"><?=getSelectName($_POST['consultation_type14'])?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=$_POST['remarks14']?></p>
                    </td>
                </tr>
            </table>
            <div class="submid_time">
                <p class="time-buttun"><input type="submit" name="edit_return" value="戻る"></p>
                <p class="time-buttun"><input type="submit" name="done" value="完了"></p>
            </div>

        </form>

    </main>

    <footer class="footer">2020 ebacrop.inc</footer>
</body>

</html>