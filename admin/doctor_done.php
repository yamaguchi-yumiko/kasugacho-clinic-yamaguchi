<?php
require_once('config.php');
auth_confirm();
$doctorInfo = new DoctorInfo();
//登録ボタンが押されたら登録、編集ボタンが押されたら更新
if (isset($_POST['done'])) {
    $doctorInfo->setDoctor(
        $_POST['name'],
        $_POST['roman_name'],
        $_POST['gender'],
        $_POST['specialty_disease'],
        $_POST['belong'],
        $_POST['img'],
        $_POST['comment'],
        $_POST['directer_flg'],
        $_POST['directer_comment'],
        isset($_GET['id']) ? $_GET['id'] : '',
        $_GET['type']
    );
}
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="done_main">
    <?php getPage(); ?>
    <!-- 完了画面の文言を取得 -->
    <?php getDoneSentence(); ?>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>