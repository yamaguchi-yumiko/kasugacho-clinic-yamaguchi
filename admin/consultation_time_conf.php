<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//タイムテーブルの時間を取得
$timetable = $consultationTime->getTimeTable();
//曜日を取得
$week = $consultationTime->getWeek();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list_main">
    <?php getPage(); ?>
    <form action="consultation_time_done.php?type=edit" method="post">
        <table class="consultation-edit-listbox">
            <tr>
                <th>
                </th>
                <?php foreach ($week as $value) : ?>
                    <th>
                        <?=$value['name']?>
                    </th>
                    <!--曜日毎に登録するための値を受け渡し -->
                    <input type="hidden" name="<?=$value['id']?>" value="<?=$value['id']?>">
                <?php endforeach; ?>
            </tr>
            <tr>
                <?php foreach ($timetable as $value) : ?>
                    <td class="time">
                        <p><?=$_POST['time_zone_' . $value['id']]?></p>診療時間<p><?=$_POST['start_time_' . $value['id']]?></p>〜<p><?=$_POST['end_time_' . $value['id']]?></p>
                    </td>
                    <!--タイムテーブルのID別に登録するための値を送信 -->
                    <input type="hidden" name="timetable_<?=$value['id']?>" value="<?=$value['id']?>">
                    <!--タイムテーブルの内容を受け渡し-->
                    <input type="hidden" name="time_zone_<?=$value['id']?>" value="<?=$_POST['time_zone_' . $value['id']]?>">
                    <input type="hidden" name="start_time_<?=$value['id']?>" value="<?=$_POST['start_time_' . $value['id']]?>">
                    <input type="hidden" name="end_time_<?=$value['id']?>" value="<?=$_POST['end_time_' . $value['id']]?>">
                    <?php foreach (!empty($consultation_time) ? $consultation_time[$value['id']] : $week as $val) : ?>
                        <td>
                            <p><?=($_POST['consultation_type_' . (!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])] == 1) ? '診察する' : (($_POST['consultation_type_' . (!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])] == 2) ? '特別時間' : (($_POST['consultation_type_' . (!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])] == 99) ? '診察しない' : ''))?></p>
                            <span>備考</span><br>
                            <p class="remarks"><?=$_POST['remarks_' . (!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])]?></p>
                        </td>
                        <!--診察種別と備考欄の内容を受け渡し-->
                        <input type="hidden" name="consultation_type_<?=(!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])?>" value="<?=$_POST['consultation_type_' . (!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])]?>">
                        <input type="hidden" name="remarks_<?=(!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])?>" value="<?=$_POST['remarks_' . (!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])]?>">
                    <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </table>
        <div class="submid_time">
            <p class="time-button"><input type="submit" value="戻る" formaction="consultation_time_edit.php?type=edit"></p>
            <p class="time-button"><input type="submit" name="done" value="完了"></p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>