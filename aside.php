<!-- aside共通 -->
<!-- 診療時間 -->
<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? '' : '<aside class="pc">'?>
<section id="consultationHours" class="<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? 'odd' : ''?>">
    <h1>診療時間</h1>
    <div class="dl-table">
        <dl>
            <dt class="active-time">
            </dt>
            <?php foreach ($consultation_time['week'] as $week) : ?>
                <dt class="row1">
                    <?=$week['name']?>
                </dt>
            <?php endforeach; ?>
        </dl>
        <?php foreach ($consultation_time['timetable'] as $value) : ?>
            <dl>
                <dd class="active-time">
                    <span class="font-size"><?=h($value['name'])?></span><br><?=toTimetableTime(h($value['start_time']))?><br>~<br><?=toTimetableTime(h($value['end_time']))?>
                </dd>
                <?php foreach ($consultation_time['week'] as $key => $val) : ?>
                    <dd class="row1">
                        <p class="<?=isset($consultation_time['consultation'][$value['id']][$key]['consultation_type']) ? getConsultationTimeMark($consultation_time['consultation'][$value['id']][$key]['consultation_type']) : 'circle'?>"></p>
                    </dd>
                <?php endforeach; ?>
            </dl>
        <?php endforeach; ?>
    </div>
</section>
<!-- 春日町診療所 -->
<?php if (basename($_SERVER['PHP_SELF'], '.php') === 'index') : ?>
    <section id="houtoKasuga" class="evn">
        <img src="./img/main_picture.png" class="sp" alt="春日町病院">
        <div class="explain-for-kasugacyo">
            <h1>春日町診療所</h1>
            <p>患者に寄り添う診療所として・・・・・・<br>地域の皆様に信頼される医療を提供することを目標としております。<br>お気軽にご相談、ご来院ください。</p>
        </div>
    </section>
<?php endif; ?>
<!-- お問い合わせ -->
<section id="inquiry-aside" class="<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? 'odd' : ''?>">
    <h1>お問い合わせ</h1>
    <div class="inquiry-aside-box">
        <p>電話暗号</p>
        <a href=""><i></i>℡:03-3999-8810</a>
        <hr>
        <div class="smart-phone">
            <p>スマートフォン携帯電話の方はこちら</p>
            <img src="./img/ebaQR.png" alt="QR">
        </div>
    </div>
	<div class="contact-forme">
	<form action="contact.php" method="post">
		<input type="submit" value="お問い合わせフォームはこちら">
	</form>
	</div>
</section>
<!-- お知らせ -->
<section id="<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? 'info1' : 'info'?>" class="<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? 'evn' : ''?>">
    <h1>お知らせ</h1>
    <nav class="scroll-box">
        <ul>
            <li>
                <a href="">下記休診日のお知らせ</a>
                <span>
                    <p>May&nbsp;11,2017</p>
                </span>
            </li>
            <li>
                <a href="">スギ花粉・ダニによるアレルギー性鼻炎に対する舌下免疫治療法を始めました</a>
                <span>
                    <p>May&nbsp;28,2019</p>
                </span>
            </li>
        </ul>
    </nav>
</section>
<?=basename($_SERVER['PHP_SELF'], '.php') === 'index' ? '' : '</aside>'?>