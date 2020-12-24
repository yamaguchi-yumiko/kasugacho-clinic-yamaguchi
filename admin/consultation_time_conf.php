<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//診療時間を取得
$consultation_time = array_combine(CONSULTAION_INDEX, $consultationTime->getConsultationTime());
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list_main">
    <?php getPage(); ?>
    <table class="consultation-edit-listbox">
        <tr>
            <th>
            </th>
            <?php foreach ($consultation_time['week'] as $week) : ?>
                <th>
                    <?=$week['name']?>
                </th>
            <?php endforeach; ?>
        </tr>
        <?php foreach ($consultation_time['timetable'] as $key => $value) : ?>
            <tr>
                <td class="time">
                    <p><?=h($_POST['timetable'][$key]['name'])?></p>
                    診療時間<p><?=h($_POST['timetable'][$key]['start_time'])?></p>
                    〜<p><?=h($_POST['timetable'][$key]['end_time'])?></p>
                </td>
                <?php foreach ($consultation_time['week'] as $key => $val) : ?>
                    <td>
                        <p><?php getConsultationTypeSentence(h($_POST['consultation'][$value['id']][$key]['consultation_type']))?></p>
                        <span>備考</span><br>
                        <p class="remarks"><?=h($_POST['consultation'][$value['id']][$key]['remarks'])?></p>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <form action="consultation_time_done.php?type=edit" method="post">
        <?php foreach ($consultation_time['timetable'] as $key => $value) : ?>
            <!--タイムテーブルの内容を受け渡し-->
            <input type="hidden" name="timetable[<?=$key?>][name]" value="<?=h($_POST['timetable'][$key]['name'])?>">
            <input type="hidden" name="timetable[<?=$key?>][start_time]" value="<?=h($_POST['timetable'][$key]['start_time'])?>">
            <input type="hidden" name="timetable[<?=$key?>][end_time]" value="<?=h($_POST['timetable'][$key]['end_time'])?>">
            <input type="hidden" name="timetable[<?=$key?>][id]" value="<?=h($value['id'])?>">
            <?php foreach ($consultation_time['week'] as $key => $val) : ?>
                <!--診療時間の値を受け渡し -->
                <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][week_id]" value="<?=h($val['week_id'])?>">
                <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][timetable_id]" value="<?=h($value['id'])?>">
                <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][consultation_type]" value="<?=h($_POST['consultation'][$value['id']][$key]['consultation_type'])?>">
                <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][remarks]" value="<?=h($_POST['consultation'][$value['id']][$key]['remarks'])?>">
            <?php endforeach; ?>
        <?php endforeach; ?>
        <div class="submid_time">
            <p class="time-button"><input type="submit" value="戻る" formaction="consultation_time_edit.php?type=edit"></p>
            <p class="time-button"><input type="submit" name="done" value="完了"></p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>