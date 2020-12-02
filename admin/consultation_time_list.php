<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//タイムテーブルの時間を取得
$timetable = $consultationTime->getTimeTable();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list_main">
    <?php getPage(); ?>
    <table class="consultation-listbox">
        <tr>
            <th>
            </th>
            <?php foreach (WEEK as $value) : ?>
                <th>
                    <?=$value?>
                </th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td><?=$timetable[0]['name']?><br><?=toTimetableTime($timetable[0]['start_time'])?><br>〜<br><?=toTimetableTime($timetable[0]['end_time'])?></td>
            <?php getConfMedicalDetails(isset($consultation_time[0]['consultation_type']) ? MARK[$consultation_time[0]['consultation_type']] : 'circle', isset($consultation_time[0]['remarks']) ? $consultation_time[0]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[1]['consultation_type']) ? MARK[$consultation_time[1]['consultation_type']] : 'circle', isset($consultation_time[1]['remarks']) ? $consultation_time[1]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[2]['consultation_type']) ? MARK[$consultation_time[2]['consultation_type']] : 'circle', isset($consultation_time[2]['remarks']) ? $consultation_time[2]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[3]['consultation_type']) ? MARK[$consultation_time[3]['consultation_type']] : 'circle', isset($consultation_time[3]['remarks']) ? $consultation_time[3]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[4]['consultation_type']) ? MARK[$consultation_time[4]['consultation_type']] : 'circle', isset($consultation_time[4]['remarks']) ? $consultation_time[4]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[5]['consultation_type']) ? MARK[$consultation_time[5]['consultation_type']] : 'circle', isset($consultation_time[5]['remarks']) ? $consultation_time[5]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[6]['consultation_type']) ? MARK[$consultation_time[6]['consultation_type']] : 'circle', isset($consultation_time[6]['remarks']) ? $consultation_time[6]['remarks'] : '') ?>
        </tr>
        <tr>
            <td><?=$timetable[1]['name']?><br><?=toTimetableTime($timetable[1]['start_time'])?><br>〜<br><?=toTimetableTime($timetable[1]['end_time'])?></td>
            <?php getConfMedicalDetails(isset($consultation_time[7]['consultation_type']) ? MARK[$consultation_time[7]['consultation_type']] : 'circle', isset($consultation_time[7]['remarks']) ? $consultation_time[7]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[8]['consultation_type']) ? MARK[$consultation_time[8]['consultation_type']] : 'circle', isset($consultation_time[8]['remarks']) ? $consultation_time[8]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[9]['consultation_type']) ? MARK[$consultation_time[9]['consultation_type']] : 'circle', isset($consultation_time[9]['remarks']) ? $consultation_time[9]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[10]['consultation_type']) ? MARK[$consultation_time[10]['consultation_type']] : 'circle', isset($consultation_time[10]['remarks']) ? $consultation_time[10]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[11]['consultation_type']) ? MARK[$consultation_time[11]['consultation_type']] : 'circle', isset($consultation_time[11]['remarks']) ? $consultation_time[11]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[12]['consultation_type']) ? MARK[$consultation_time[12]['consultation_type']] : 'circle', isset($consultation_time[12]['remarks']) ? $consultation_time[12]['remarks'] : '') ?>
            <?php getConfMedicalDetails(isset($consultation_time[13]['consultation_type']) ? MARK[$consultation_time[13]['consultation_type']] : 'circle', isset($consultation_time[13]['remarks']) ? $consultation_time[13]['remarks'] : '') ?>
        </tr>
    </table>
    <div class="time-button">
        <form action="consultation_time_edit.php?type=edit" method="post">
            <p><input type="submit" value="編集"></p>
        </form>
    </div>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>