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
    <title>診療時間管理ページ</title>
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
        <table class="consultation-listbox">
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
                <td><?=$timeTable[0]['name']?><br><?=changeTimeFormat($timeTable[0]['start_time'])?><br>〜<br><?=changeTimeFormat($timeTable[0]['end_time'])?></td>
                <td>
                    <?php if (isset($consultationTime[0]['consultation_type'])) : ?>
                        <?= getMark($consultationTime[0]['consultation_type']) ?>
                        <p class="remarks_indicate"><?=$consultationTime[0]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[1]['consultation_type'])) : ?>
                        <?= getMark($consultationTime[1]['consultation_type']) ?>
                        <p class="remarks_indicate"><?=$consultationTime[1]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[2]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[2]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[2]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[3]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[3]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[3]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[4]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[4]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[4]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[5]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[5]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[5]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[6]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[6]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[6]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><?=$timeTable[1]['name'] ?><br><?=changeTimeFormat($timeTable[1]['start_time'])?><br>〜<br><?=changeTimeFormat($timeTable[1]['end_time'])?></td>
                <td>
                    <?php if (isset($consultationTime[7]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[7]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[7]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[8]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[8]['consultation_type']) ?>
                        <p class="remarks_indicate"><?=$consultationTime[8]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[9]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[9]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[9]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[10]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[10]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[10]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[11]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[11]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[11]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[12]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[12]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[12]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (isset($consultationTime[13]['consultation_type'])) : ?>
                        <?=getMark($consultationTime[13]['consultation_type'])?>
                        <p class="remarks_indicate"><?=$consultationTime[13]['remarks']?></p>
                    <?php else : ?>
                        <?='<p class="circle"></p>'?>
                    <?php endif; ?>
                </td>
            </tr>

        </table>
        <p class="time-buttun"><a href="consultation_time_edit.php?consultation&edit">編集</a></p>
    </main>

    <footer class="footer">2020 ebacrop.inc</footer>
</body>

</html>