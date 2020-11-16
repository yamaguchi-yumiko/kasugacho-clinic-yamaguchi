<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
if (isset($_POST['done'])) {
    // 診療時間のデータが入っていなければ追加、入っていれば更新
    // 午前
    $consultationTime->editConsultationTime(
        [$_POST['before_time_zone'], $_POST['before_start_time'], $_POST['before_end_time'], $_POST['befoer_timetable']],
        $_POST['monday'],
        $_POST['befoer_timetable'],
        $_POST['before_monday_type'],
        $_POST['before_monday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['before_time_zone'], $_POST['before_start_time'], $_POST['before_end_time'], $_POST['befoer_timetable']],
        $_POST['tuesday'],
        $_POST['befoer_timetable'],
        $_POST['before_tuesday_type'],
        $_POST['before_tuesday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['before_time_zone'], $_POST['before_start_time'], $_POST['before_end_time'], $_POST['befoer_timetable']],
        $_POST['wednesday'],
        $_POST['befoer_timetable'],
        $_POST['before_wednesday_type'],
        $_POST['before_wednesday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['before_time_zone'], $_POST['before_start_time'], $_POST['before_end_time'], $_POST['befoer_timetable']],
        $_POST['thursday'],
        $_POST['befoer_timetable'],
        $_POST['after_thursday_type'],
        $_POST['before_thursday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['before_time_zone'], $_POST['before_start_time'], $_POST['before_end_time'], $_POST['befoer_timetable']],
        $_POST['friday'],
        $_POST['befoer_timetable'],
        $_POST['after_friday_type'],
        $_POST['before_friday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['before_time_zone'], $_POST['before_start_time'], $_POST['before_end_time'], $_POST['befoer_timetable']],
        $_POST['saturday'],
        $_POST['befoer_timetable'],
        $_POST['before_saturday_type'],
        $_POST['before_saturday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['before_time_zone'], $_POST['before_start_time'], $_POST['before_end_time'], $_POST['befoer_timetable']],
        $_POST['sunday'],
        $_POST['befoer_timetable'],
        $_POST['before_sunday_type'],
        $_POST['before_sunday_remarks']
    );
    // 午後
    $consultationTime->editConsultationTime(
        [$_POST['after_time_zone'], $_POST['after_start_time'], $_POST['after_end_time'], $_POST['after_timetable']],
        $_POST['monday'],
        $_POST['after_timetable'],
        $_POST['after_monday_type'],
        $_POST['after_monday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['after_time_zone'], $_POST['after_start_time'], $_POST['after_end_time'], $_POST['after_timetable']],
        $_POST['tuesday'],
        $_POST['after_timetable'],
        $_POST['after_tuesday_type'],
        $_POST['after_tuesday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['after_time_zone'], $_POST['after_start_time'], $_POST['after_end_time'], $_POST['after_timetable']],
        $_POST['wednesday'],
        $_POST['after_timetable'],
        $_POST['after_wednesday_type'],
        $_POST['after_wednesday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['after_time_zone'], $_POST['after_start_time'], $_POST['after_end_time'], $_POST['after_timetable']],
        $_POST['thursday'],
        $_POST['after_timetable'],
        $_POST['after_thursday_type'],
        $_POST['after_thursday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['after_time_zone'], $_POST['after_start_time'], $_POST['after_end_time'], $_POST['after_timetable']],
        $_POST['friday'],
        $_POST['after_timetable'],
        $_POST['after_friday_type'],
        $_POST['after_friday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['after_time_zone'], $_POST['after_start_time'], $_POST['after_end_time'], $_POST['after_timetable']],
        $_POST['saturday'],
        $_POST['after_timetable'],
        $_POST['after_saturday_type'],
        $_POST['after_saturday_remarks']
    );
    $consultationTime->editConsultationTime(
        [$_POST['after_time_zone'], $_POST['after_start_time'], $_POST['after_end_time'], $_POST['after_timetable']],
        $_POST['sunday'],
        $_POST['after_timetable'],
        $_POST['after_sunday_type'],
        $_POST['after_sunday_remarks']
    );
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