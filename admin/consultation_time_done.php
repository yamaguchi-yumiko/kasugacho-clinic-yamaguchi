<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//曜日を取得
$week = $consultationTime->getWeek();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
// タイムテーブルを更新、診療時間のデータが入っていなければ登録、入っていれば更新
if (isset($_POST['done'])) {
    $consultationTime->editConsultationTime($_POST['time'], $_POST['consultation']);
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