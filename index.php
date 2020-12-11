<?php
require_once('admin/config.php');
$doctorInfo = new DoctorInfo();
//院長情報を取得
$directer_info = $doctorInfo->getDirecterInfo();

$consultationTime = new ConsultationTime();
//タイムテーブルの時間を取得
$timetable = $consultationTime->getTimeTable();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
//曜日を取得
$week = $consultationTime->getWeek();
?>
<!-- header共通 -->
<?php require_once('header.php'); ?>
<main id="main" role="main">
    <!-- aside共通 -->
    <?php require_once('aside.php'); ?>
    <!-- 挨拶 -->
    <section id="greeting" class="odd last">
        <h1>ご挨拶</h1>
        <div class="sp-waku flexbox1">
            <img src="./img/<?=h($directer_info['img'])?>" alt="医者">
            <div class="docter-explain">
                <h2><?=h($directer_info['name'])?><span class="rs-1000"><?=h($directer_info['roman_name'])?></span></h2>
                <p>専門疾患</p>
                <p><?=h($directer_info['specialty_disease'])?></p>
                <hr>
                <p><?=nl2br(h($directer_info['directer_comment']))?></p>
            </div>
        </div>
    </section>
    <div class="pagetop sp">
        <a href="#" title="TOPへ"><img src="img/top.png" class="top" style="display: inline;"></a>
    </div>
</main>
<!--fooder共通 -->
<?php require_once('fooder.php'); ?>