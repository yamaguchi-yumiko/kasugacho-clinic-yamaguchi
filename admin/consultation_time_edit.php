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
    <form action="consultation_time_conf.php?type=edit" method="post">
        <table class="consultation-edit-listbox">
            <tr>
                <th>
                </th>
                <?php foreach ($week as $value) : ?>
                    <th class="row1">
                        <?=$value['name']?>
                    </th>
                    <!--曜日毎に登録するための値を受け渡し -->
                    <input type="hidden" name="<?=$value['id']?>" value="<?=$value['id']?>">
                <?php endforeach; ?>
            </tr>
            <tr>
                <?php foreach ($timetable as $value) : ?>
                    <td>
                        <input type="text" size="10" name="<?='time_zone_' . $value['id']?>" value="<?=$value['name']?>">診察時間<input type="text" size="10" name="<?='start_time_' . $value['id']?>" value="<?=toTimetableTime($value['start_time'])?>">〜<input type="text" size="10" name="<?='end_time_' . $value['id']?>" value="<?=toTimetableTime($value['end_time'])?>">
                    </td>
                    <!--タイムテーブルのID別に登録するための値を送信 -->
                    <input type="hidden" name="timetable_<?=$value['id']?>" value="<?=$value['id']?>">
                    <?php foreach (!empty($consultation_time) ? $consultation_time[$value['id']] : $week as $val) : ?>
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation_type_<?=!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id']?>">
                                    <option value="1"<?=isset($val['consultation_type']) && $val['consultation_type'] == 1 ? 'selected' : ''?>>診察する</option>
                                    <option value="2"<?=isset($val['consultation_type']) && $val['consultation_type'] == 2 ? 'selected' : ''?>>特別時間</option>
                                    <option value="99"<?=isset($val['consultation_type']) && $val['consultation_type'] == 99 ? 'selected' : ''?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="remarks_<?=(!empty($consultation_time) ? $val['timetable_id'] . $val['week_id'] : $value['id'] . $val['id'])?>" placeholder="例)17:00まで"><?=isset($val['remarks']) ? $val['remarks'] : ''?></textarea>
                        </td>
                    <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </table>
        <div class="submid_time">
            <p class="time-button">
                <input type="submit" value="確認">
            </p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>