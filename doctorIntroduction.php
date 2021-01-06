<?php
require_once('admin/config.php');
$doctorInfo = new DoctorInfo();
//医師情報を取得
$doctors_Info = $doctorInfo->getDoctorsInfo();

$consultationTime = new ConsultationTime();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
?>
<!-- header共通 -->
<?php require_once('header.php'); ?>
<main>
    <!-- aside共通 -->
    <?php require_once('aside.php'); ?>
    <section id="hospitalGuide-doctor">
        <h1>医師紹介</h1>
        <?php foreach ($doctors_Info as $doctor) : ?>
            <div class="flexbox docter-man">
                <img src="./img/<?=h($doctor['img'])?>" class="waiting-room" alt="待合室">
                <div class="explain">
                    <h2><?=h($doctor['name'])?><span class="rs-1000"><?=h($doctor['roman_name'])?></span></h2>
                    <div class="explain-box">
                        <h3 class="w-25">専門疾患</h3>
                        <p><?=h($doctor['specialty_disease'])?></p>
                        <p class="w-25">所属学会・認定証</p>
                        <?=nl2br(h($doctor['belong']))?>
                    </div>
                </div>
                <hr class="sp">
                <div class="sp-one-things">
                    <p class="w-25 one-thing">ひとこと</p>
                    <p class="danraku"><?=nl2br(h($doctor['comment']))?></p>
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
                    <dt class="row">
                    </dt>
                    <?php foreach ($consultation_time['week'] as $week) : ?>
                        <dt class="row">
                            <?=$value['name']?>
                        </dt>
                    <?php endforeach; ?>
                </dl>
                <dl>
                    <dd class="row orange">
                        午前
                    </dd>
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
                    <dd class="row orange">
                        午後
                    </dd>
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
<!--fooder共通 -->
<?php require_once('fooder.php'); ?>