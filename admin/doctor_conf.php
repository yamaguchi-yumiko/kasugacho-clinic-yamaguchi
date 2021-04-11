<?php
require_once('config.php');
auth_confirm();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="add-main">
    <?php getPage(); ?>
    <table class="add-table">
        <tr>
            <th>
                医師名
            </th>
            <td>
                <?=h($_POST['name'])?>
            </td>
        </tr>
        <tr>
            <th>
                ローマ字
            </th>
            <td>
                <?=h($_POST['roman_name'])?>
            </td>
        </tr>
        <tr>
            <th>
                性別
            </th>
            <td>
                <!-- 確認画面の性別を取得 -->
                <?php getGenderName(); ?>
            </td>
        </tr>
        <tr>
            <th>
                専門疾患
            </th>
            <td>
                <?=h($_POST['specialty_disease'])?>
            </td>
        </tr>
        <tr>
            <th>
                所属学会・認定証
            </th>
            <td>
                <?=nl2br(h($_POST['belong']))?>
            </td>
        </tr>
        <tr>
            <th>
                画像ファイル名
            </th>
            <td>
                <?=h($_POST['img'])?>
            </td>
        </tr>
        <tr>
            <th>
                ひとこと
            </th>
            <td>
                <?=nl2br(h($_POST['comment']))?>
            </td>
        </tr>
        <tr>
            <th>
                役職
            </th>
            <td>
                <?=h($_POST['directer_flg'] == 1 ? '院長' : '医師')?>
            </td>
        </tr>
        <tr>
            <th>
                院長ひとこと
            </th>
            <td>
                <?=nl2br(h($_POST['directer_comment']))?>
            </td>
        </tr>
    </table>
    <form action="doctor_done.php?type=<?=($_GET['type'])?><?=$_GET['type'] === 'edit' ? '&id=' . $_GET['id'] : ''?>" method="post">
        <!-- 入力値の受け渡し -->
        <input type="hidden" name="name" value="<?=h($_POST['name'])?>">
        <input type="hidden" name="roman_name" value="<?=h($_POST['roman_name'])?>">
        <input type="hidden" name="gender" value="<?=h($_POST['gender'])?>">
        <input type="hidden" name="specialty_disease" value="<?=h($_POST['specialty_disease'])?>">
        <input type="hidden" name="belong" value="<?=h($_POST['belong'])?>">
        <input type="hidden" name="img" value="<?=h($_POST['img'])?>">
        <input type="hidden" name="comment" value="<?=h($_POST['comment'])?>">
        <input type="hidden" name="directer_flg" value="<?=h($_POST['directer_flg'])?>">
        <input type="hidden" name="directer_comment" value="<?=h($_POST['directer_comment'])?>">
        <div class="submit-container">
            <p class="submit">
                <input type="submit" value="戻る" formaction="doctor_edit.php?type=<?=($_GET['type'])?><?=$_GET['type'] === 'edit' ? '&id=' . $_GET['id'] : ''?>">
            </p>
            <p class="submit">
                <input type="submit" name="done" value="<?=TYPE_NAME[$_GET['type']]?>を完了する" >
            </p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>