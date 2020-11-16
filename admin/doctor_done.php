<?php
require_once('config.php');
auth_confirm();
$doctorInfo = new DoctorInfo();
//登録ボタンが押されたら登録、編集ボタンが押されたら更新
if (isset($_POST['add_done']) || isset($_POST['edit_done'])) {
    $doctorInfo->addDoctor(
        $_POST['name'],
        $_POST['roman'],
        $_POST['gender'],
        $_POST['specialty'],
        $_POST['belong'],
        $_POST['img'],
        $_POST['comment'],
        $_POST['directer_flg'],
        $_POST['directer_comment'],
        (new DateTime())->format('Y-m-d H:i:s.u'),
        isset($_GET['id']) ? $_GET['id'] : ''
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