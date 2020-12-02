<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//タイムテーブルの時間を取得
$timetable = $consultationTime->getTimeTable();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list_main">
    <?php getPage(); ?>
    <table class="consultation-edit-listbox">
        <tr>
            <th>
            </th>
            <?php foreach (WEEK as $value) : ?>
                <th>
                    <?=$value?>
                </th>
            <?php endforeach; ?>
        </tr>
        <tr>
            <td class="time">
                <p><?=$_POST['before_time_zone']?></p>
                診療時間<p><?=$_POST['before_start_time']?></p>
                〜<p><?=$_POST['before_end_time']?></p>
            </td>
            <!-- 診療詳細を取得 -->
            <?php getConfMedicalDetails($_POST['before_monday_type'], $_POST['before_monday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['before_tuesday_type'], $_POST['before_tuesday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['before_wednesday_type'], $_POST['before_wednesday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['before_thursday_type'], $_POST['before_thursday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['before_friday_type'], $_POST['before_friday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['before_saturday_type'], $_POST['before_saturday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['before_sunday_type'], $_POST['before_sunday_remarks']); ?>
        </tr>
        <tr>
            <td class="time">
                <p><?=$_POST['after_time_zone']?></p>
                診療時間<p><?=$_POST['after_start_time']?></p>
                〜<p><?=$_POST['after_end_time']?></p>
            </td>
            <!-- 診療詳細を取得 -->
            <?php getConfMedicalDetails($_POST['after_monday_type'], $_POST['after_monday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['after_tuesday_type'], $_POST['after_tuesday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['after_wednesday_type'], $_POST['after_wednesday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['after_thursday_type'], $_POST['after_thursday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['after_friday_type'], $_POST['after_friday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['after_saturday_type'], $_POST['after_saturday_remarks']); ?>
            <?php getConfMedicalDetails($_POST['after_sunday_type'], $_POST['after_sunday_remarks']); ?>
        </tr>
    </table>
    <form action="consultation_time_done.php?type=edit" method="post">
        <!-- 入力値の受け渡し -->
        <!--曜日毎に登録するための値を受け渡し -->
        <input type="hidden" name="monday" value="1">
        <input type="hidden" name="tuesday" value="2">
        <input type="hidden" name="wednesday" value="3">
        <input type="hidden" name="thursday" value="4">
        <input type="hidden" name="friday" value="5">
        <input type="hidden" name="saturday" value="6">
        <input type="hidden" name="sunday" value="7">
        <!--タイムテーブルのID別に登録するための値を受け渡し -->
        <input type="hidden" name="befoer_timetable" value="1">
        <input type="hidden" name="after_timetable" value="2">
        <!--タイムテーブルの内容を受け渡し-->
        <input type="hidden" name="before_time_zone" value="<?=$_POST['before_time_zone']?>">
        <input type="hidden" name="before_start_time" value="<?=$_POST['before_start_time']?>">
        <input type="hidden" name="before_end_time" value="<?=$_POST['before_end_time']?>">
        <input type="hidden" name="after_time_zone" value="<?=$_POST['after_time_zone']?>">
        <input type="hidden" name="after_start_time" value="<?=$_POST['after_start_time']?>">
        <input type="hidden" name="after_end_time" value="<?=$_POST['after_end_time']?>">
        <!--診察種別と備考欄の内容を受け渡し-->
        <input type="hidden" name="before_monday_type" value="<?=$_POST['before_monday_type']?>">
        <input type="hidden" name="before_monday_remarks" value="<?=$_POST['before_monday_remarks']?>">
        <input type="hidden" name="before_tuesday_type" value="<?=$_POST['before_tuesday_type']?>">
        <input type="hidden" name="before_tuesday_remarks" value="<?=$_POST['before_tuesday_remarks']?>">
        <input type="hidden" name="before_wednesday_type" value="<?=$_POST['before_wednesday_type']?>">
        <input type="hidden" name="before_wednesday_remarks" value="<?=$_POST['before_wednesday_remarks']?>">
        <input type="hidden" name="before_thursday_type" value="<?=$_POST['before_thursday_type']?>">
        <input type="hidden" name="before_thursday_remarks" value="<?=$_POST['before_thursday_remarks']?>">
        <input type="hidden" name="before_friday_type" value="<?=$_POST['before_friday_type']?>">
        <input type="hidden" name="before_friday_remarks" value="<?=$_POST['before_friday_remarks']?>">
        <input type="hidden" name="before_saturday_type" value="<?=$_POST['before_saturday_type']?>">
        <input type="hidden" name="before_saturday_remarks" value="<?=$_POST['before_saturday_remarks']?>">
        <input type="hidden" name="before_sunday_type" value="<?=$_POST['before_sunday_type']?>">
        <input type="hidden" name="before_sunday_remarks" value="<?=$_POST['before_sunday_remarks']?>">
        <input type="hidden" name="after_monday_type" value="<?=$_POST['after_monday_type']?>">
        <input type="hidden" name="after_monday_remarks" value="<?=$_POST['after_monday_remarks']?>">
        <input type="hidden" name="after_tuesday_type" value="<?=$_POST['after_tuesday_type']?>">
        <input type="hidden" name="after_tuesday_remarks" value="<?=$_POST['after_tuesday_remarks']?>">
        <input type="hidden" name="after_wednesday_type" value="<?=$_POST['after_wednesday_type']?>">
        <input type="hidden" name="after_wednesday_remarks" value="<?=$_POST['after_wednesday_remarks']?>">
        <input type="hidden" name="after_thursday_type" value="<?=$_POST['after_thursday_type']?>">
        <input type="hidden" name="after_thursday_remarks" value="<?=$_POST['after_thursday_remarks']?>">
        <input type="hidden" name="after_friday_type" value="<?=$_POST['after_friday_type']?>">
        <input type="hidden" name="after_friday_remarks" value="<?=$_POST['after_friday_remarks']?>">
        <input type="hidden" name="after_saturday_type" value="<?=$_POST['after_saturday_type']?>">
        <input type="hidden" name="after_saturday_remarks" value="<?=$_POST['after_saturday_remarks']?>">
        <input type="hidden" name="after_sunday_type" value="<?=$_POST['after_sunday_type']?>">
        <input type="hidden" name="after_sunday_remarks" value="<?=$_POST['after_sunday_remarks']?>">
        <div class="submid_time">
            <p class="time-button"><input type="submit" value="戻る" formaction="consultation_time_edit.php?type=edit"></p>
            <p class="time-button"><input type="submit" name="done" value="完了"></p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>