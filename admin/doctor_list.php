<?php
require_once('config.php');
auth_confirm();
$doctorInfo = new DoctorInfo();
//削除を押したらdelete_flgを１にして非表示
if (isset($_POST['delete'])) {
    $doctorInfo->deleteDoctor($_GET['id']);
    header('Location: doctor_list.php');
    exit;
}
$doctors_info = $doctorInfo->getDoctorsInfo();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list-main">
    <?php getPage(); ?>
    <form action="" method="post">
        <table class="listbox doctor">
            <tr>
                <th>
                    ID<p class="sort"><a href="?sort=id_asc">&#9650</a><a href="?sort=id_desc">&#9660</a></p>
                </th>
                <th>
                    医師名<p class="sort"><a href="?sort=name_asc">&#9650</a><a href="?sort=name_desc">&#9660</a></p>
                </th>
                <th>
                    画像
                </th>
                <th>
                    登録日時
                </th>
                <th>
                    更新日時<p class="sort"><a href="?sort=update_asc">&#9650</a><a href="?sort=update_desc">&#9660</a></p>
                </th>
                <th>
                    <input type="submit" value="新規登録" name="add" formaction="doctor_edit.php?type=add" class=.add-button">
                </th>
            </tr>
            <?php foreach ($doctors_info as $doctor) : ?>
                <tr>
                    <td>
                        <?=h($doctor['id'])?>
                    </td>
                    <td>
                        <?=h($doctor['name'])?>
                    </td>
                    <td>
                        <?=$doctor['img'] !== null ? '<img src="../img/' . h($doctor['img']) . '" alt="医師画像">' : ''?>
                    </td>
                    <td>
                        <?=(new Datetime(h($doctor['created_at'])))->format('Y-m-d H:i:s')?>
                    </td>
                    <td>
                        <?=$doctor['updated_at'] !== null ? (new Datetime(h($doctor['updated_at'])))->format('Y-m-d H:i:s') : ''?>
                    </td>
                    <td>
                        <input type="submit" value="編集" name="edit" formaction="doctor_edit.php?type=edit&id=<?=$doctor['id']?>" class="button">
                        <input type="submit" name="delete" value="削除" formaction="?id=<?=$doctor['id']?>" onclick="return MoveChak()" class="button">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>