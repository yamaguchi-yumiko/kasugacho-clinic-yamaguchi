<?php
require_once('config.php');
auth_confirm();
$doctorInfo = new DoctorInfo();

//リスト画面の登録ボタンが押されたら
if ($_GET["type"] == "add") {
    //POSTで送られてきた内容を表示
    $doctor_info = [];
} else {
    //医師情報の内容を取得
    $doctor_info = $doctorInfo->getDoctorInfo($_GET['id']);
}
$doctor_info = $_POST + $doctor_info;
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="add_main">
    <?php getPage(); ?>
    <?php getSubmitButton() ?>
    <table class="add_table">
        <tr>
            <th>医師名</th>
            <td><input type="text" name="name" value="<?=isset($doctor_info['name']) ? h($doctor_info['name']) : ''?>"></td>
        </tr>
        <tr>
            <th>ローマ字</th>
            <td><input type="text" name="roman" value="<?=isset($doctor_info['roman']) ? h($doctor_info['roman']) : ''?>"></td>
        </tr>
        <tr>
            <th>性別</th>
            <td>
                未選択<input type="radio" name="gender" value=""<?=empty($doctor_info['gender']) ? ' checked' : ''?>>
                男性<input type="radio" name="gender" value="1"<?=isset($doctor_info['gender']) && $doctor_info['gender'] === GENDER_MAN ? ' checked' : ''?>>
                女性<input type="radio" name="gender" value="2"<?=isset($doctor_info['gender']) && $doctor_info['gender'] === GENDER_WOMAN ? ' checked' : ''?>>
            </td>
        </tr>
        <tr>
            <th>専門疾患</th>
            <td><input type="text" name="specialty" size=35 value="<?=isset($doctor_info['specialty']) ? h($doctor_info['specialty']) : ''?>"></td>
        </tr>
        <tr>
            <th>所属学会・認定証</th>
            <td><textarea name="belong" cols="70" rows="10"><?=isset($doctor_info['belong']) ? h($doctor_info['belong']) : ''?></textarea></td>
        </tr>
        <tr>
            <th>画像ファイル名</th>
            <td><input type="text" name="img" value="<?=isset($doctor_info['img']) ? h($doctor_info['img']) : ''?>"></td>
        </tr>
        <tr>
            <th>ひとこと</th>
            <td><textarea name="comment" cols="70" rows="10"><?=isset($doctor_info['comment']) ? h($doctor_info['comment']) : ''?></textarea></td>
        </tr>
        <th>役職</th>
        <td>
            医師<input type="radio" name="directer_flg" value="0"<?=isset($doctor_info['directer_flg']) && $doctor_info['directer_flg'] === '0' ? ' checked' : ''?> checked>
            院長<input type="radio" name="directer_flg" value="1"<?=isset($doctor_info['directer_flg']) && $doctor_info['directer_flg'] === '1' ? ' checked' : ''?>>
        </td>
        </tr>
        <tr>
            <th>院長ひとこと</th>
            <td><textarea name="directer_comment" cols="70" rows="10"><?=isset($doctor_info['directer_comment']) ? h($doctor_info['directer_comment']) : ''?></textarea></td>
        </tr>
    </table>
    <div class="submid_conteaner">
        <p class="submit"><input type="submit" value="確認画面へ"></p>
    </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>