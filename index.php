<?php
require_once('admin/config.php');
$doctor_info = new DoctorInfo();

//院長情報を取得
$directer_info = $doctor_info->getDirecterInfo();

$time = new ConsultationTime();
//タイムテーブルの時間を取得
$time_table = $time->getTimeTable();

//診療時間を取得
$consultation_time = $time->getConsultationTime();

$morning_time = [
    [$consultation_time[0]['consultation_type'], $consultation_time[0]['remarks'],],
    [$consultation_time[1]['consultation_type'], $consultation_time[1]['remarks'],],
    [$consultation_time[2]['consultation_type'], $consultation_time[2]['remarks'],],
    [$consultation_time[3]['consultation_type'], $consultation_time[3]['remarks'],],
    [$consultation_time[4]['consultation_type'], $consultation_time[4]['remarks'],],
    [$consultation_time[5]['consultation_type'], $consultation_time[5]['remarks'],],
    [$consultation_time[6]['consultation_type'], $consultation_time[6]['remarks'],],
];


$afternoon_time = [
    [$consultation_time[7]['consultation_type'], $consultation_time[7]['remarks'],],
    [$consultation_time[8]['consultation_type'], $consultation_time[8]['remarks'],],
    [$consultation_time[9]['consultation_type'], $consultation_time[9]['remarks'],],
    [$consultation_time[10]['consultation_type'], $consultation_time[10]['remarks'],],
    [$consultation_time[11]['consultation_type'], $consultation_time[11]['remarks'],],
    [$consultation_time[12]['consultation_type'], $consultation_time[12]['remarks'],],
    [$consultation_time[13]['consultation_type'], $consultation_time[13]['remarks'],],
];

?>


    <!-- header共通 -->
    <?php require_once('header.php'); ?>

    <main id="main" role="main">
        <!-- 診療時間 -->
        <section id="consultationHours" class="odd">
            <h1>診療時間</h1>
            <p></p>
            <table class="dltable1">
                <tbody>
                    <tr>
                        <th class="active-time"></th>
                        <th class="row9">月</th>
                        <th class="row9">火</th>
                        <th class="row9">水</th>
                        <th class="row9">木</th>
                        <th class="row9">金</th>
                        <th class="row9">土</th>
                        <th class="row9">日・祝</th>
                    </tr>
                    <tr class="time-index">
                        <td class="active-time">
                            <span class="font-size"><?=$time_table[0]['name']?></span>
                            <p><?=toTimetableTime($time_table[0]['start_time'])?></p>
                            <p>~</p>
                            <p><?=toTimetableTime($time_table[0]['end_time'])?></p>
                        </td>
                        <?php foreach ($morning_time as $morning) : ?>
                            <td class="row2">
                                <?php if (isset($morning[0])) : ?>
                                    <?=setMark($morning[0])?>
                                <?php else : ?>
                                    <?='<p class="circle"></p>'?>
                                <?php endif; ?>
                                <div class="list_reason"><?=$morning[1]?></div>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="time-index">
                        <td class="active-time"><span class="font-size"><?=$time_table[1]['name']?></span>
                            <p><?=toTimetableTime($time_table[1]['start_time'])?></p>
                            <p>~</p>
                            <p><?=toTimetableTime($time_table[1]['end_time'])?></p>
                        </td>
                        <?php foreach ($afternoon_time as $afternoon) : ?>
                            <td class="row2">
                                <?php if (isset($afternoon[0])) : ?>
                                    <?=setMark($afternoon[0])?>
                                <?php else : ?>
                                    <?='<p class="circle"></p>'?>
                                <?php endif; ?>
                                <div class="list_reason"><?=$afternoon[1]?></div>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                </tbody>
            </table>
            <p></p>
        </section>
        <!-- 春日町診療所 -->
        <section id="houtoKasuga" class="evn">
            <img src="./img/main_picture.png" class="sp" alt="春日町病院">
            <div class="explain-for-kasugacyo">
                <h1>春日町診療所</h1>
                <p>患者に寄り添う診療所として・・・・・・ <br>
                    地域の皆様に信頼される医療を提供することを目標としております。<br>
                    お気軽にご相談、ご来院ください。
                </p>
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
                    <li><a href="">下記休診日のお知らせ</a><span>
                            <p>May 11,2017</p>
                        </span>
                    </li>
                    <li> <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a><span>
                            <p>May 28,2019</p>
                        </span>
                    </li>
                    <li> <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a><span>
                            <p>May 28,2019</p>
                        </span>
                    </li>
                    <li> <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a><span>
                            <p>May 28,2019</p>
                        </span>
                    </li>
                    <li> <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a><span>
                            <p>May 28,2019</p>
                        </span>
                    </li>
                    <li> <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a><span>
                            <p>May 28,2019</p>
                        </span>
                    </li>
                    <li> <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a><span>
                            <p>May 28,2019</p>
                        </span>
                    </li>
                    <li> <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a><span>
                            <p>May 28,2019</p>
                        </span>
                    </li>
                    <li> <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a><span>
                            <p>May 28,2019</p>
                        </span>
                    </li>
                    <li> <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a><span>
                            <p>May 28,2019</p>
                        </span>
                    </li>
                </ul>
            </nav>
        </section>
        <!-- 挨拶 -->

        <section id="greeting" class="odd last">
            <h1>ご挨拶</h1>
            <div class="sp-waku flexbox1">
                <img src="./img/<?=$directer_info['img']?>" alt="医者">
                <div class="docter-explain">
                    <h2><?=$directer_info['name']?><span class="rs-1000"><?=$directer_info['roman_name']?></span></h2>
                    <p>専門疾患</p>
                    <p><?=$directer_info['specialty_disease']?></p>
                    <hr>
                    <p>
                        <?=nl2br($directer_info['directer_comment'])?>
                    </p>
                </div>
            </div>
        </section>
        <div class="pagetop sp">
            <a href="#" title="TOPへ">
                <img src="img/top.png" class="top" style="display: inline;">
            </a>
        </div>
    </main>
    <!--fooder共通 -->
    <?php require_once('fooder.php'); ?>
