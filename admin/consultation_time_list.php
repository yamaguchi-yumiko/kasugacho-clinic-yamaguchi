<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//タイムテーブルの時間を取得
$timetable = $consultationTime->getTimeTable();
//診療時間の詳細を取得
$consultation_time = $consultationTime->getConsultationTime();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list_main">
    <?php getPage(); ?>
    <table class="consultation-listbox">
        <tr>
            <th></th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
            <th>日・祝</th>
        </tr>
        <tr>
            <td><?=$timetable[0]['name']?><br><?=toTimetableTime($timetable[0]['start_time'])?><br>〜<br><?=toTimetableTime($timetable[0]['end_time'])?></td>
            <td>
                <?=isset($consultation_time[0]['consultation_type']) ? getConsultationTimeMark($consultation_time[0]['consultation_type']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[0]['remarks']) ? $consultation_time[0]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[1]['consultation_type']) ? getConsultationTimeMark($consultation_time[1]['consultation_type'], $consultation_time[1]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[1]['remarks']) ? $consultation_time[1]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[2]['consultation_type']) ? getConsultationTimeMark($consultation_time[2]['consultation_type'], $consultation_time[2]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[2]['remarks']) ? $consultation_time[2]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[3]['consultation_type']) ? getConsultationTimeMark($consultation_time[3]['consultation_type'], $consultation_time[3]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[3]['remarks']) ? $consultation_time[3]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[4]['consultation_type']) ? getConsultationTimeMark($consultation_time[4]['consultation_type'], $consultation_time[4]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[4]['remarks']) ? $consultation_time[4]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[5]['consultation_type']) ? getConsultationTimeMark($consultation_time[5]['consultation_type'], $consultation_time[5]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[5]['remarks']) ? $consultation_time[5]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[6]['consultation_type']) ? getConsultationTimeMark($consultation_time[6]['consultation_type'], $consultation_time[6]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[6]['remarks']) ? $consultation_time[6]['remarks']: ''?></p>
            </td>
        </tr>
        <tr>
            <td><?=$timetable[1]['name']?><br><?=toTimetableTime($timetable[1]['start_time'])?><br>〜<br><?=toTimetableTime($timetable[1]['end_time'])?></td>
            <td>
                <?=isset($consultation_time[7]['consultation_type']) ? getConsultationTimeMark($consultation_time[7]['consultation_type'], $consultation_time[7]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"<?=isset($consultation_time[7]['remarks']) ? $consultation_time[7]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[8]['consultation_type']) ? getConsultationTimeMark($consultation_time[8]['consultation_type'], $consultation_time[8]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"<?=isset($consultation_time[8]['remarks']) ? $consultation_time[8]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[9]['consultation_type']) ? getConsultationTimeMark($consultation_time[9]['consultation_type'], $consultation_time[9]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"<?=isset($consultation_time[9]['remarks']) ? $consultation_time[9]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[10]['consultation_type']) ? getConsultationTimeMark($consultation_time[10]['consultation_type'], $consultation_time[10]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[10]['remarks']) ? $consultation_time[10]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[11]['consultation_type']) ? getConsultationTimeMark($consultation_time[11]['consultation_type'], $consultation_time[11]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[11]['remarks']) ? $consultation_time[11]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[12]['consultation_type']) ? getConsultationTimeMark($consultation_time[12]['consultation_type'], $consultation_time[12]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[12]['remarks']) ? $consultation_time[12]['remarks']: ''?></p>
            </td>
            <td>
                <?=isset($consultation_time[13]['consultation_type']) ? getConsultationTimeMark($consultation_time[13]['consultation_type'], $consultation_time[13]['remarks']) : '<p class="circle"></p>'?>
                <p class="remarks_indicate"><?=isset($consultation_time[13]['remarks']) ? $consultation_time[13]['remarks']: ''?></p>
            </td>
        </tr>
    </table>
    <p class="time-button"><a href="consultation_time_edit.php?type=edit">編集</a></p>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>