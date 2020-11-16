<?php
require_once('config.php');
auth_confirm();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="add_main">
    <?php getPage(); ?>
    <table class="add_table">
        <tr>
            <th>医師名</th>
            <td><?=h($_POST['name'])?></td>
        </tr>
        <tr>
            <th>ローマ字</th>
            <td><?=h($_POST['roman'])?></td>
        </tr>
        <tr>
            <th>性別</th>
            <td>
                <!-- 確認画面の性別を取得 -->
                <?php getGenderName(); ?>
            </td>
        </tr>
        <tr>
            <th>専門疾患</th>
            <td><?=h($_POST['specialty'])?></td>
        </tr>
        <tr>
            <th>所属学会・認定証</th>
            <td><?=nl2br(h($_POST['belong']))?></td>
        </tr>
        <tr>
            <th>画像ファイル名</th>
            <td><?=h($_POST['img'])?></td>
        </tr>
        <tr>
            <th>ひとこと</th>
            <td><?=nl2br(h($_POST['comment']))?></td>
        </tr>
        <tr>
            <th>役職</th>
            <td><?=h($_POST['directer_flg'] === '1' ? '院長' : '医師')?></td>
        </tr>
        <tr>
            <th>院長ひとこと</th>
            <td><?=nl2br(h($_POST['directer_comment']))?></td>
        </tr>
    </table>
    <?php getSubmitButton() ?>
    <!-- 入力値の受け渡し -->
    <input type="hidden" name="name" value="<?=h($_POST['name'])?>" />
    <input type="hidden" name="roman" value="<?=h($_POST['roman'])?>" />
    <input type="hidden" name="gender" value="<?=h($_POST['gender'])?>" />
    <input type="hidden" name="specialty" value="<?=h($_POST['specialty'])?>" />
    <input type="hidden" name="belong" value="<?=h($_POST['belong'])?>" />
    <input type="hidden" name="img" value="<?=h($_POST['img'])?>" />
    <input type="hidden" name="comment" value="<?=h($_POST['comment'])?>" />
    <input type="hidden" name="directer_flg" value="<?=h($_POST['directer_flg'])?>" />
    <input type="hidden" name="directer_comment" value="<?=h($_POST['directer_comment'])?>" />
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>