<?php
require_once('config.php');
auth_confirm();
//リスト画面の登録ボタンが押されたら
if ($_GET['type'] === 'add') {
    //POSTで送られてきた内容を表示
    $doctor_info = [];
} elseif ($_GET['type'] === 'edit' && isset($_GET['id'])) {
    $doctorInfo = new DoctorInfo();
    //医師情報の内容を取得
    $doctor_info = $doctorInfo->getDoctorInfo($_GET['id']);
}
$doctor_info = $_POST + $doctor_info;
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="add-main">
    <?php getPage(); ?>
    <form action="doctor_conf.php?type=<?=($_GET['type'])?><?=$_GET['type'] === 'edit' ? '&id=' . $_GET['id'] : ''?>" method="post">
        <table class="add-table">
            <tr>
                <th>
                    医師名
                </th>
                <td>
                    <input type="text" name="name" value="<?=isset($doctor_info['name']) ? h($doctor_info['name']) : ''?>">
                </td>
            </tr>
            <tr>
                <th>
                    ローマ字
                </th>
                <td>
                    <input type="text" name="roman_name" value="<?=isset($doctor_info['roman_name']) ? h($doctor_info['roman_name']) : ''?>">
                </td>
            </tr>
            <tr>
                <th>
                    性別
                </th>
                <td>
                    未選択<input type="radio" name="gender" value=""<?=empty($doctor_info['gender']) ? ' checked' : ''?>>
                    <?php foreach (GENDER as $key => $value) : ?>
                        <?=$value?><input type="radio" name="gender" value="<?=$key?>"<?=isset($doctor_info['gender']) && $key == $doctor_info['gender'] ? ' checked' : ''?>>
                    <?php endforeach; ?>
                </td>
            </tr>
            <tr>
                <th>
                    専門疾患
                </th>
                <td>
                    <input type="text" name="specialty_disease" size=35 value="<?=isset($doctor_info['specialty_disease']) ? h($doctor_info['specialty_disease']) : ''?>">
                </td>
            </tr>
            <tr>
                <th>
                    所属学会・認定証
                </th>
                <td>
                    <textarea name="belong" cols="70" rows="10"> <?=isset($doctor_info['belong']) ? h($doctor_info['belong']) : ''?></textarea>
                </td>
            </tr>
            <tr>
                <th>
                    画像ファイル名
                </th>
                <td>
                    <input type="text" name="img" value="<?=isset($doctor_info['img']) ? h($doctor_info['img']) : ''?>">
                </td>
            </tr>
            <tr>
                <th>
                    ひとこと
                </th>
                <td>
                    <textarea name="comment" cols="70" rows="10"><?=isset($doctor_info['comment']) ? h($doctor_info['comment']) : ''?></textarea>
                </td>
            </tr>
            <th>
                役職
            </th>
            <td>
                医師<input type="radio" name="directer_flg" value="0"<?=!isset($doctor_info['directer_flg']) || $doctor_info['directer_flg'] == 0 ? ' checked' : ''?>>
                院長<input type="radio" name="directer_flg" value="1"<?=isset($doctor_info['directer_flg']) && $doctor_info['directer_flg'] == 1 ? ' checked' : ''?>>
            </td>
            </tr>
            <tr>
                <th>
                    院長ひとこと
                </th>
                <td>
                    <textarea name="directer_comment" cols="70" rows="10"><?=isset($doctor_info['directer_comment']) ? h($doctor_info['directer_comment']) : ''?></textarea>
                </td>
            </tr>
        </table>
        <div class="submit-conteaner">
            <p class="submit">
                <input type="submit" value="確認する">
            </p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>