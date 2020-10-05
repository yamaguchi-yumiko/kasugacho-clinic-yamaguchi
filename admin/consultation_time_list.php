<?php
require_once('config.php');
auth_confirm();
$time = new consultationTime();
$time_table = $time->getTimetable();
$consultation_time = $time->getConsultationTime();

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
                <td><?= $time_table[0]['name'] ?><br><?= $date = (new DateTime($time_table[0]['start_time']))->format('H:i') ?><br>〜<br><?= $date = (new DateTime($time_table[0]['end_time']))->format('H:i') ?></td>
                <td>
                    <?php if (!empty($consultation_time[0]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[0]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[0]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[1]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[1]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[1]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[2]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[2]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[2]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[3]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[3]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[3]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[4]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[4]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[4]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[5]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[5]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[5]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[6]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[6]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[6]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><?= $time_table[1]['name'] ?><br><?= $date = (new DateTime($time_table[1]['start_time']))->format('H:i') ?><br>〜<br><?= $date = (new DateTime($time_table[1]['end_time']))->format('H:i') ?></td>
                <td>
                    <?php if (!empty($consultation_time[7]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[7]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[7]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[8]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[8]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[8]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[9]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[9]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[9]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[10]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[10]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[10]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[11]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[11]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[11]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[12]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[12]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[12]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if (!empty($consultation_time[13]['consultation_type'])) : ?>
                        <?= getSymbol($consultation_time[13]['consultation_type']) ?>
                        <p class="remarks_indicate"><?= $consultation_time[13]['remarks'] ?></p>
                    <?php else : ?>
                        <?= '<p class="circle"></p>' ?>
                    <?php endif; ?>
                </td>
            </tr>

        </table>
        <p class="time-buttun"><a href="consultation_time_edit.php?time_edit">編集</a></p>
    </main>

    <footer class="footer">2020 ebacrop.inc</footer>
</body>

</html>