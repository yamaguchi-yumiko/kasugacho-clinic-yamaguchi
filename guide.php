<?php
require_once('admin/config.php');
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
<main>
    <!-- aside共通 -->
    <?php require_once('aside.php'); ?>
    <section id="hospitalGuide">
        <h1>病院案内</h1>
        <div class="sp-inside">
            <img src="./img/waitingRoom.jpg" class="waiting-room" alt="待合室">
            <div class="philosophy">
                <h2>病院の理念</h2>
                <p>
                    <span class="sp-space">&emsp;</span>私達が心掛けておりますのは、患者さんの立場に立って診療させていただくことです。患者さんの訴えに耳を傾け、症状を的確に理解し、診療方針等も納得いただけるまでご説明いたします。
                </p>
                <p>
                    <span class="sp-space">&emsp;</span>より専門的な医療が必要と判断された患者さんには近隣の医療機関と連携し、速やかに紹介させていただきます。
                    <span class="new-line">地域の患者さんの健やかな毎日を支えていくため、生活習慣病をはじめとする病気の予防にも注力していく所存ですので、安心して気軽にご相談・受診していただければ幸いです。</span>
                </p>
                <p>
                    院長　今村　宗嗣
                </p>
            </div>
            <div class="flexbox1">
                <div class="parking">
                    <h2>駐車場</h2>
                    <img src="./img/parking.png" alt="駐車場">
                    <p>
                        当クリニックの裏手側に車両10台分の駐車場が完備しております。クリニックご利用のお客様のみで、駐車料金は発生しません。<br><span>（共同駐車場のためご利用頂けない場合もご合います。）</span>
                    </p>
                </div>
                <div class="examination-room">
                    <h2>診察室</h2>
                    <img src="./img/examinationRoom.jpg" alt="診察室">
                    <p>
                        最新の治療施設を備えております。<br>患者様の状態により様々な治療のために対応致します。
                    </p>
                </div>
            </div>
        </div>
    </section>
</main>
<!--fooder共通 -->
<?php require_once('fooder.php'); ?>