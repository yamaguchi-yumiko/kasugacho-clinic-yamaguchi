<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="done_main">
    <?php getPage(); ?>
    <?php if (isset($_POST['done'])) : ?>
        <?php $consultationTime->editConsultationTime($_POST); ?>
    <?php endif; ?>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>