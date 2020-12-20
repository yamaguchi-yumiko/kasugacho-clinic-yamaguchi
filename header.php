<?php
require_once('admin/config.php');
$consultationTime = new ConsultationTime();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
//曜日を取得
$m_week = $consultationTime->getWeek();
//タイムテーブルの時間を取得
$timetable = $consultationTime->getTimeTable();
foreach ($timetable as $value) {
    $week_array[$value['id']] = $m_week;
}
$consultation_time = $consultation_time + $week_array;
?>
<!DOCTYPE HTML>
<html lang="ja">
<!--header共通 -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title></title>
    <link rel="stylesheet" type="text/css" href="./css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/default.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/info.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/guide.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/access.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/doctorIntroduction.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/index.css" media="all">
    <!-- sp -->
    <link rel="stylesheet" type="text/css" href="./css/sp/default.css" media="all">
    <link rel="stylesheet" type="text/css" href="./css/sp/info.css" media="all">
    <!-- js -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <script type="text/javascript" src="./js/animation.js"></script>
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
                        <li>
                            <a href="index.php">TOP</a>
                        </li>
                        <li>
                            <a href="guide.php">病院案内</a>
                        </li>
                        <li>
                            <a href="doctorIntroduction.php?sort=directer_desc">医師紹介</a></li>
                        <li>
                            <a href="access.php">アクセス</a>
                        </li>
                        <li>
                            <a href="info.php">お知らせ</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="sp"></div>
        <div id="top" class="pc">
            <img src="./img/title-logo-1.png" alt="春日町診療所">
            <div class="tel">
                <p class="for-tel">お気軽にご相談ください</p>
                <a href="0339998810" class="tel-top">℡：03-3999-8810</a>
            </div>
            <ul>
                <li>
                    <a href="index.php">TOP</a>
                </li>
                <li>
                    <a href="guide.php"> 病院案内</a>
                </li>
                <li>
                    <a href="doctorIntroduction.php?sort=directer_desc">医師紹介</a>
                </li>
                <li>
                    <a href="access.php">アクセス</a>
                </li>
                <li>
                    <a href="info.php">お知らせ</a>
                </li>
            </ul>
        </div>
    </header>