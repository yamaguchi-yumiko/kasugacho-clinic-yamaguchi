<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//タイムテーブルの時間
$timetable = $consultationTime->getTimeTable();
//診療時間の詳細
$consultation_time = $consultationTime->getConsultationTime();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list_main">
    <?php getPage(); ?>
    <form action="" method="post">
        <!--曜日毎の値を送信 -->
        <input type="hidden" name="monday" value="1">
        <input type="hidden" name="tuesday" value="2">
        <input type="hidden" name="wednesday" value="3">
        <input type="hidden" name="thursday" value="4">
        <input type="hidden" name="friday" value="5">
        <input type="hidden" name="saturday" value="6">
        <input type="hidden" name="sunday" value="7">
        <!--タイムテーブルのID別に登録するための値を送信 -->
        <input type="hidden" name="befoer_timetable" value="1">
        <input type="hidden" name="after_timetable" value="2">
        <table class="consultation-edit-listbox">
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
            <!-- 午前の情報を表示 -->
            <tr>
                <td>
                    <input type="text" size="10" name="before_time_zone" value="<?=$timetable[0]['name']?>">診察時間<input type="text" size="10" name="before_start_time" value="<?=toTimetableTime($timetable[0]['start_time'])?>">〜<input type="text" size="10" name="before_end_time" value="<?=toTimetableTime($timetable[0]['end_time'])?>">
                </td>
                <td>
                    <?php getEditMedicalDetails('before_monday_type', isset($consultation_time[0]['consultation_type']) ? $consultation_time[0]['consultation_type'] : '', 'before_monday_remarks', isset($consultation_time[0]['remarks']) ? $consultation_time[0]['remarks'] : ''); ?>
                <td>
                    <?php getEditMedicalDetails('before_tuesday_type', isset($consultation_time[1]['consultation_type']) ? $consultation_time[1]['consultation_type'] : '', 'before_tuesday_remarks', isset($consultation_time[1]['remarks']) ? $consultation_time[1]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('before_wednesday_type', isset($consultation_time[2]['consultation_type']) ? $consultation_time[2]['consultation_type'] : '', 'before_wednesday_remarks', isset($consultation_time[2]['remarks']) ? $consultation_time[2]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('before_thursday_type', isset($consultation_time[3]['consultation_type']) ? $consultation_time[3]['consultation_type'] : '', 'before_thursday_remarks', isset($consultation_time[3]['remarks']) ? $consultation_time[3]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('before_friday_type', isset($consultation_time[4]['consultation_type']) ? $consultation_time[4]['consultation_type'] : '', 'before_friday_remarks', isset($consultation_time[4]['remarks']) ? $consultation_time[4]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('before_saturday_type', isset($consultation_time[5]['consultation_type']) ? $consultation_time[5]['consultation_type'] : '', 'before_saturday_remarks', isset($consultation_time[5]['remarks']) ? $consultation_time[5]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('before_sunday_type', isset($consultation_time[6]['consultation_type']) ? $consultation_time[6]['consultation_type'] : '', 'before_sunday_remarks', isset($consultation_time[6]['remarks']) ? $consultation_time[6]['remarks'] : ''); ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" size="10" name="after_time_zone" value="<?=$timetable[1]['name']?>">診察時間<input type="text" size="10" name="after_start_time" value="<?=toTimetableTime($timetable[1]['start_time'])?>">〜<input type="text" size="10" name="after_end_time" value="<?=toTimetableTime($timetable[1]['end_time'])?>">
                </td>
                <td>
                    <?php getEditMedicalDetails('after_monday_type', isset($consultation_time[7]['consultation_type']) ? $consultation_time[7]['consultation_type'] : '', 'after_monday_remarks', isset($consultation_time[7]['remarks']) ? $consultation_time[7]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('after_tuesday_type', isset($consultation_time[8]['consultation_type']) ? $consultation_time[8]['consultation_type'] : '', 'after_tuesday_remarks', isset($consultation_time[8]['remarks']) ? $consultation_time[8]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('after_wednesday_type', isset($consultation_time[9]['consultation_type']) ? $consultation_time[9]['consultation_type'] : '', 'after_wednesday_remarks', isset($consultation_time[9]['remarks']) ? $consultation_time[9]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('after_thursday_type', isset($consultation_time[10]['consultation_type']) ? $consultation_time[10]['consultation_type'] : '', 'after_thursday_remarks', isset($consultation_time[10]['remarks']) ? $consultation_time[10]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('after_friday_type', isset($consultation_time[11]['consultation_type']) ? $consultation_time[11]['consultation_type'] : '', 'after_friday_remarks', isset($consultation_time[11]['remarks']) ? $consultation_time[11]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('after_saturday_type', isset($consultation_time[12]['consultation_type']) ? $consultation_time[12]['consultation_type'] : '', 'after_saturday_remarks', isset($consultation_time[12]['remarks']) ? $consultation_time[12]['remarks'] : ''); ?>
                </td>
                <td>
                    <?php getEditMedicalDetails('after_sunday_type', isset($consultation_time[13]['consultation_type']) ? $consultation_time[13]['consultation_type'] : '', 'after_sunday_remarks', isset($consultation_time[13]['remarks']) ? $consultation_time[13]['remarks'] : ''); ?>
                </td>
            </tr>
        </table>
        <div class="submid_time">
            <p class="time-button"><input type="submit" value="戻る" onClick="form.action='consultation_time_list.php';return true"></p>
            <p class="time-button"><input type="submit" name="conf" value="確認" onClick="form.action='consultation_time_conf.php?type=edit';return true"></p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>