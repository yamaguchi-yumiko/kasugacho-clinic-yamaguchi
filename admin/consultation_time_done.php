<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
$done_message = $consultationTime->editConsultationTime($_POST);
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="done-main">
    <?php getPage(); ?>
    <p class="complete">
        <?=$done_message?>
    </p>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>