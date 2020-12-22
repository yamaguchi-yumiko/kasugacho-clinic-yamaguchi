<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
if (isset($_POST['done'])) {
    $consultationTime->editConsultationTime($_POST);
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