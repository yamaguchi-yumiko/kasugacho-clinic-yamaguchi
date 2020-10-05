<?php
require_once('admin/config.php');
$doctorInfo = new DoctorInfo();

//院長情報を取得
$director_info = $doctorInfo->getDirectorInfo();

?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex,nofollow,noarchive">
  <title></title>
  <!-- pc -->
  <link rel="stylesheet" type="text/css" href="./css/common.css" media="all">
  <link rel="stylesheet" type="text/css" href="./css/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="./css/index.css" media="all">
  <!-- sp -->
  <link rel="stylesheet" type="text/css" href="./css/sp/default.css" media="all">
  <link rel="stylesheet" type="text/css" href="./css/sp/index.css" media="all">
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
        <li><a href="guide.php"> 病院案内</a></li>
        <li><a href="doctorIntroduction.php">医師紹介</a></li>
        <li><a href="access.php">アクセス</a></li>
        <li><a href="info.php">お知らせ</a></li>
      </ul>
    </div>
  </header>
  <main id="main" role="main">
    <!-- 診療時間 -->
    <section id="consultationHours">
      <h1>診療時間</h1>
      <p></p>
      <table class="dltable">
        <tbody>
          <tr>
            <th class="active-time"></th>
            <th class="row1">月</th>
            <th class="row1">火</th>
            <th class="row1">水</th>
            <th class="row1">木</th>
            <th class="row1">金</th>
            <th class="row1">土</th>
            <th class="row1">日・祝</th>
          </tr>
          <tr>
            <td class="active-time">
              <span class="font-size">午前</span>
              <p>09:00</p>
              <p>~</p>
              <p>12:00</p>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark3">×</span>
              <div class="list_reason"></div>
            </td>
          </tr>
          <tr>
            <td class="active-time"><span class="font-size">午後</span>
              <p>14:00</p>
              <p>~</p>
              <p>15:00</p>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark2">▲</span>
              <div class="list_reason">17:00まで</div>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark1">●</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark3">×</span>
              <div class="list_reason"></div>
            </td>
            <td class="row2">
              <span class="mark3">×</span>
              <div class="list_reason"></div>
            </td>
          </tr>
        </tbody>
      </table>
      <p></p>
    </section>
    <!-- 春日町診療所 -->
    <section id="houtoKasuga">
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
    <section id="inquiry">
      <h1>お問い合わせ</h1>
      <div class="inquiry-box">
        <p>電話暗号</p>
        <a href=""><i></i>℡:03-3999-8810</a>
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
    <!-- 挨拶 -->

    <section id="greeting">
      <h1>ご挨拶</h1>
      <div class="sp-waku flexbox">
        <img src="./img/<?=h($director_info['img'])?>" alt="医者">
        <div class="docter-explain">
          <h2><?=h($director_info['name'])?><span class="rs-1000"><?=h($director_info['roman_name'])?></span></h2>
          <p>専門疾患</p>
          <p><?=h($director_info['specialty_disease'])?></p>
          <hr>
          <p>
            <?=nl2br(h($director_info['directer_comment']))?>
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