<!-- aside共通 -->
<!-- 診療時間 -->
<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? '' : '<aside class="pc">'?>
<section id="consultationHours" class="<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? 'odd' : ''?>">
    <h1>診療時間</h1>
    <div class="dltable">
        <dl>
            <dt class="active-time">
            </dt>
            <?php foreach ($m_week as $week) : ?>
                <dt class="row1">
                    <?=$week['name']?>
                </dt>
            <?php endforeach; ?>
        </dl>
        <?php foreach ($timetable as $value) : ?>
            <dl>
                <dd class="active-time">
                    <span class="font-size"><?=$value['name']?></span><br><?=toTimetableTime($value['start_time'])?><br>~<br><?=toTimetableTime($value['end_time'])?>
                </dd>
                <?php foreach ($consultation_time[$value['id']] as $val) : ?>
                    <dd class="row1">
                        <p class="<?=isset($val['consultation_type']) ? ($val['consultation_type'] == 1 ? 'circle' : ($val['consultation_type'] == 2 ? 'triangl' : ($val['consultation_type'] == 99 ? 'cross' : ''))) : 'circle'?>"></p>
                    </dd>
                <?php endforeach; ?>
            </dl>
        <?php endforeach; ?>
</section>
<!-- 春日町診療所 -->
<?php if (basename($_SERVER['PHP_SELF'], '.php') === 'index') : ?>
    <section id="houtoKasuga" class="evn">
        <img src="./img/main_picture.png" class="sp" alt="春日町病院">
        <div class="explain-for-kasugacyo">
            <h1>春日町診療所</h1>
            <p>患者に寄り添う診療所として・・・・・・ <br>地域の皆様に信頼される医療を提供することを目標としております。<br>お気軽にご相談、ご来院ください。</p>
        </div>
    </section>
<?php endif; ?>
<!-- お問い合わせ -->
<section id="inquiry1" class="<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? 'odd' : ''?>">
    <h1>お問い合わせ</h1>
    <div class="inquiry1-box">
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
<section id="<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? 'info1' : 'info' ?>" class="<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? 'evn' : ''?>">
    <h1>お知らせ</h1>
    <nav class="scroll-box">
        <ul>
            <li>
                <a href="">下記休診日のお知らせ</a>
                <span>
                    <p>May 11,2017</p>
                </span>
            </li>
            <li>
                <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a>
                <span>
                    <p>May 28,2019</p>
                </span>
            </li>
        </ul>
    </nav>
</section>
<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? '' : '</aside>'?>