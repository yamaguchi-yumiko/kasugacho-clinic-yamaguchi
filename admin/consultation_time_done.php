<?php
require_once('config.php');
auth_confirm();
if (isset($_POST['done'])) {
    $consultationTime = new ConsultationTime();
    //タイムテーブルの時間を取得
    $timetable = $consultationTime->getTimeTable();
    //曜日を取得
    $week = $consultationTime->getWeek();
    //診療時間を取得
    $consultation_time = $consultationTime->getConsultationTime();
    // 診療時間のデータが入っていなければ追加、入っていれば更新
    foreach ($timetable as $value) {
        foreach (!empty($consultation_time) ? $consultation_time[$value['id']] : $week as $val) {
            $consultationTime->editConsultationTime(
                [$_POST['time_zone_' . $value['id']], $_POST['start_time_' . $value['id']], $_POST['end_time_' . $value['id']], $_POST['timetable_' . $value['id']],],
                $_POST[!empty($consultation_time) ? $val['week_id'] : $val['id']],
                $_POST['timetable_' . $value['id']],
                $_POST['consultation_type_' . (!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])],
                $_POST['remarks_' . (!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])]
            );
        }
    }
}
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="done_main">
    <?php getPage(); ?>
    <p class="complete">編集が完了しました。</p>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>