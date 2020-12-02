<!-- aside共通 -->
<!-- 診療時間 -->
<aside class="pc">
    <section id="consultationHours">
        <h1>診療時間</h1>
        <div class="dltable">
            <dl>
                <dt class="active-time">
                </dt>
                <?php foreach (WEEK as $value) : ?>
                    <dt class="row1">
                      <?=$value?>
                    </dt>
                <?php endforeach; ?>
            </dl>
            <dl>
                <dd class="active-time">
                    <span class="font-size"><?=$timetable[0]['name']?></span><br><?=toTimetableTime($timetable[0]['start_time'])?><br>~<br><?=toTimetableTime($timetable[0]['end_time'])?>
                </dd>
                <?php getConsultationTime(isset($consultation_time[0]['consultation_type']) ? MARK[$consultation_time[0]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[1]['consultation_type']) ? MARK[$consultation_time[1]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[2]['consultation_type']) ? MARK[$consultation_time[2]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[3]['consultation_type']) ? MARK[$consultation_time[3]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[4]['consultation_type']) ? MARK[$consultation_time[4]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[5]['consultation_type']) ? MARK[$consultation_time[5]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[6]['consultation_type']) ? MARK[$consultation_time[6]['consultation_type']] : 'circle');?>
            </dl>
            <dl>
                <dd class="active-time">
                    <span class="font-size"><?=$timetable[1]['name']?></span><br><?=toTimetableTime($timetable[1]['start_time'])?><br>~<br><?=toTimetableTime($timetable[1]['end_time'])?>
                </dd>
                <?php getConsultationTime(isset($consultation_time[7]['consultation_type']) ? MARK[$consultation_time[7]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[8]['consultation_type']) ? MARK[$consultation_time[8]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[9]['consultation_type']) ? MARK[$consultation_time[9]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[10]['consultation_type']) ? MARK[$consultation_time[10]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[11]['consultation_type']) ? MARK[$consultation_time[11]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[12]['consultation_type']) ? MARK[$consultation_time[12]['consultation_type']] : 'circle');?>
                <?php getConsultationTime(isset($consultation_time[13]['consultation_type']) ? MARK[$consultation_time[13]['consultation_type']] : 'circle');?>
        </div>
    </section>
    <!-- お問い合わせ -->
    <section id="inquiry1">
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
    <section id="info">
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
</aside>