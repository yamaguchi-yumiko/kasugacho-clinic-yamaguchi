<?php
require_once('admin/config.php');
$doctorInfo = new DoctorInfo();

//医師情報を取得
$doctor_info = $doctorInfo->getDoctorInfo();



?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/default.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/doctorIntroduction.css" media="all">

    <!-- sp -->
    <link rel="stylesheet" type="text/css" href="./css/sp/default.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/sp/doctorIntroduction.css" media="all">
    <!-- js -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript" src="./js/animation.js"></script>
    <script type="text/javascript">
    </script>
</head>

<body>
    <div id='top-fixed' class='sp'></div>
    <header id="headerTop">
        <div class='hamburger sp'>
            <ul class="accordion-menu">
                <li>
                    <div class="menu-trigger dropdownlink " href="">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <ul class="submenuItems">
                        <li><a href="index.php">TOP</a></li>
                        <li><a href="guide.php">病院案内</a></li>
                        <li><a href="doctorIntroduction.php">医師紹介</a></li>
                        <li><a href="access.php">アクセス</a></li>
                        <li><a href="info.php">お知らせ</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="sp">
        </div>
        <div id="top" class="pc">
            <img src="./img/title-logo-1.png" alt="春日町診療所">
            <div class="tel">
                <p class="for-tel">お気軽にご相談ください</p>
                <a href="0339998810" class="tel-top">
                    ℡：03-3999-8810
                </a>
            </div>
            <ul>
                <li><a href="index.php">TOP</a></li>
                <li><a href="guide.php">病院案内</a></li>
                <li><a href="doctorIntroduction.php">医師紹介</a></li>
                <li><a href="access.php">アクセス</a></li>
                <li><a href="info.php">お知らせ</a></li>
            </ul>
        </div>
    </header>
    <main id="main" role="main">
        <aside class="pc">
            <!-- 診療時間 -->
            <section id="consultationHours">
                <h1>診療時間</h1>
                <div class="dltable">
                    <dl>
                        <dt class="active-time"></dt>
                        <dt class="row1">月</dt>
                        <dt class="row1">火</dt>
                        <dt class="row1">水</dt>
                        <dt class="row1">木</dt>
                        <dt class="row1">金</dt>
                        <dt class="row1">土</dt>
                        <dt class="row8">日・祝</dt>
                        <!-- <dt class="row8">日・祝日</dt> -->
                    </dl>
                    <dl>
                        <dd class="active-time"><span class="font-size">午前</span><br>9:00<br>~<br>12:00</dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1 bathu">
                            <p>×</p>
                        </dd>
                        <dd class="row8 bathu">
                            <p>×</p>
                        </dd>
                    </dl>
                    <dl>
                        <dd class="active-time"><span class="font-size">午後</span><br>15:00<br>~<br>18:00</dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row1">
                            <p>●</p>
                        </dd>
                        <dd class="row8 bathu">
                            <p>×</p>
                        </dd>
                    </dl>
                </div>
            </section>
            <!-- お問い合わせ -->
            <section id="inquiry">
                <h1>お問い合わせ</h1>
                <div class="inquiry-box">
                    <p>電話暗号</p>
                    <a href=""><i></i>TEL:03-3999-8810</a>
                    <hr>
                    <div class="smart-phone">
                        <p>スマートフォン携帯電話の方はこちら</p>
                        <img src="./img/ebaQR.png" alt="QR">
                    </div>
                </div>
            </section>
            <!-- お知らせ -->
            <section id="info">
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
        </aside>
        <section id="hospitalGuide">
            <h1>医師紹介</h1>
            <?php foreach ($doctor_info as $doctor_info) : ?>
                <div class="flexbox docter-man">
                    <img src="./img/<?=h($doctor_info['img'])?>" class="waiting-room" alt="待合室">
                    <div class="explain">
                        <h2><?=h($doctor_info['name']) ?><span class="rs-1000"> <?=h($doctor_info['roman_name'])?></span></h2>
                        <div class="explain-box">
                            <h3 class="w-25">専門疾患</h3>
                            <p><?=h($doctor_info['specialty_disease'])?></p>
                            <p class="w-25">所属学会・認定証</p>
                            <?=nl2br(h($doctor_info['belong']))?>
                        </div>
                    </div>
                    <hr class="sp">
                    <div class="sp-one-things">
                        <p class="w-25 one-thing">ひとこと</p>
                        <p class="danraku">
                            <?=nl2br(h($doctor_info['comment']))?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="docter-schedule">
                <h2>外来担当医表</h2>
                <div class="doctor-charge sp">
                    <p><span class="blue">●</span>＝今村宗嗣</p>
                    <p><span class="pink">●</span>＝今村友美</p>
                </div>
                <div class="schedule">
                    <dl>
                        <dt class="row"></dt>
                        <dt class="row">月</dt>
                        <dt class="row">火</dt>
                        <dt class="row">水</dt>
                        <dt class="row">木</dt>
                        <dt class="row">金</dt>
                        <dt class="row">土</dt>
                    </dl>
                    <dl>
                        <dd class="row orange">午前</dd>
                        <dd class="row blue sp-circle">
                            今村宗嗣
                        </dd>
                        <dd class="row pink" id="pink1">
                            今村友美
                        </dd>
                        <dd class="row blue">
                            今村宗嗣
                        </dd>
                        <dd class="row blue">
                            今村宗嗣
                        </dd>
                        <dd class="row blue">
                            今村宗嗣
                        </dd>
                        <dd class="row blue">
                            今村宗嗣
                        </dd>
                    </dl>
                    <dl>
                        <dd class="row orange">午後</dd>
                        <dd class="row  blue">
                            今村宗嗣
                        </dd>
                        <dd class="row blue">
                            今村宗嗣
                        </dd>
                        <dd class="row blue">
                            今村宗嗣
                        </dd>
                        <dd class="row blue">
                            今村宗嗣
                        </dd>
                        <dd class="row pink" id="pink2">
                            今村友美
                        </dd>
                        <dd class="row orange">

                        </dd>
                    </dl>
                </div>
                <p class="pc">※火曜日AM・金曜日PMは女性医師が担当です。</p>
                <p class="caution pc">※担当医は予告無く変わることもありますので、詳細はお問い合わせください。</p>
            </div>
        </section>
    </main>
    <footer>
        <p>春日町診療所</p>
        <div class="">
            <dl>
                <dt class="">所在地：</dt>
                <dt class="">連絡先：</dt>
                <dt class="">駐車場：</dt>
                <dt class="">診療科：</dt>
            </dl>
            <dl>
                <dd class="">〒174-0074 東京都練馬区春日町3-29-401-102</dd>
                <dd class="">03-3999-8810</dd>
                <dd class="">10台（無料）</dd>
                <dd class="">内科/皮膚科/アレルギー科/リマウチ科</dd>
            </dl>
        </div>
    </footer>
</body>

</html>