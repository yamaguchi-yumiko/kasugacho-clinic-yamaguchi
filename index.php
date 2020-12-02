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
?>
<!-- header共通 -->
<?php require_once('header.php'); ?>
<main id="main" role="main">
    <!-- 診療時間 -->
    <section id="consultationHours" class="odd">
        <h1>診療時間</h1>
        <table class="dltable1">
            <tbody>
                <tr>
                    <th class="active-time">
                    </th>
                    <?php foreach (WEEK as $value) : ?>
                        <th class="row9"><?= $value ?></th>
                    <?php endforeach; ?>
                </tr>
                <tr class="time-index">
                    <td class="active-time">
                        <span class="font-size"><?=$timetable[0]['name']?></span>
                        <p><?=toTimetableTime($timetable[0]['start_time'])?></p>
                        <p>~</p>
                        <p><?=toTimetableTime($timetable[0]['end_time'])?></p>
                    </td>
                    <?php getTopConsultationTime(isset($consultation_time[0]['consultation_type']) ? MARK[$consultation_time[0]['consultation_type']] : 'circle', isset($consultation_time[0]['remarks']) ? $consultation_time[0]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[1]['consultation_type']) ? MARK[$consultation_time[1]['consultation_type']] : 'circle', isset($consultation_time[1]['remarks']) ? $consultation_time[1]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[2]['consultation_type']) ? MARK[$consultation_time[2]['consultation_type']] : 'circle', isset($consultation_time[2]['remarks']) ? $consultation_time[2]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[3]['consultation_type']) ? MARK[$consultation_time[3]['consultation_type']] : 'circle', isset($consultation_time[3]['remarks']) ? $consultation_time[3]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[4]['consultation_type']) ? MARK[$consultation_time[4]['consultation_type']] : 'circle', isset($consultation_time[4]['remarks']) ? $consultation_time[4]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[5]['consultation_type']) ? MARK[$consultation_time[5]['consultation_type']] : 'circle', isset($consultation_time[5]['remarks']) ? $consultation_time[5]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[6]['consultation_type']) ? MARK[$consultation_time[6]['consultation_type']] : 'circle', isset($consultation_time[6]['remarks']) ? $consultation_time[6]['remarks'] : ''); ?>
                </tr>
                <tr class="time-index">
                    <td class="active-time">
                        <span class="font-size"><?=$timetable[1]['name']?></span>
                        <p><?=toTimetableTime($timetable[1]['start_time'])?></p>
                        <p>~</p>
                        <p><?=toTimetableTime($timetable[1]['end_time'])?></p>
                    </td>
                    <?php getTopConsultationTime(isset($consultation_time[8]['consultation_type']) ? MARK[$consultation_time[8]['consultation_type']] : 'circle', isset($consultation_time[8]['remarks']) ? $consultation_time[8]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[9]['consultation_type']) ? MARK[$consultation_time[9]['consultation_type']] : 'circle', isset($consultation_time[9]['remarks']) ? $consultation_time[9]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[7]['consultation_type']) ? MARK[$consultation_time[7]['consultation_type']] : 'circle', isset($consultation_time[7]['remarks']) ? $consultation_time[7]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[10]['consultation_type']) ? MARK[$consultation_time[10]['consultation_type']] : 'circle', isset($consultation_time[10]['remarks']) ? $consultation_time[10]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[11]['consultation_type']) ? MARK[$consultation_time[11]['consultation_type']] : 'circle', isset($consultation_time[11]['remarks']) ? $consultation_time[11]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[12]['consultation_type']) ? MARK[$consultation_time[12]['consultation_type']] : 'circle', isset($consultation_time[12]['remarks']) ? $consultation_time[12]['remarks'] : ''); ?>
                    <?php getTopConsultationTime(isset($consultation_time[13]['consultation_type']) ? MARK[$consultation_time[13]['consultation_type']] : 'circle', isset($consultation_time[13]['remarks']) ? $consultation_time[13]['remarks'] : ''); ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </section>
    <!-- 春日町診療所 -->
    <section id="houtoKasuga" class="evn">
        <img src="./img/main_picture.png" class="sp" alt="春日町病院">
        <div class="explain-for-kasugacyo">
            <h1>春日町診療所</h1>
            <p>患者に寄り添う診療所として・・・・・・ <br>地域の皆様に信頼される医療を提供することを目標としております。<br>お気軽にご相談、ご来院ください。</p>
        </div>
    </section>
    <!-- お問い合わせ -->
    <section id="inquiry1" class="odd">
        <h1>お問い合わせ</h1>
        <div class="inquiry-box1">
            <p>電話暗号</p>
            <a href=""><i></i>℡:03-3999-8810</a>
            <hr>
            <div class="smart-phone">
                <span class="sma">スマートフォン携帯電話の方はこちら</span>
                <img src="./img/ebaQR.png" alt="QR">
            </div>
        </div>
    </section>
    <!-- お知らせ -->
    <section id="info1" class="evn">
        <h1>お知らせ</h1>
        <nav class="scroll-box">
            <ul>
                <li>
                    <a href="">下記休診日のお知らせ</a>
                    <span><p>May 11,2017</p></span>
                </li>
                <li>
                    <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a>
                    <span><p>May 28,2019</p></span>
                </li>
            </ul>
        </nav>
    </section>
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