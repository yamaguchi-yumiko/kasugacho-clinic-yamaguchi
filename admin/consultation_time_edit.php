<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
$consultation_time = $_POST + $consultation_time;
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list-mai">
    <?php getPage(); ?>
    <form action="consultation_time_conf.php?type=edit" method="post">
        <table class="consultation-edit-listbox">
            <tr>
                <th>
                </th>
                <?php foreach ($consultation_time['week'] as $week) : ?>
                    <th class="row1">
                        <?=$week['name']?>
                    </th>
                <?php endforeach; ?>
            </tr>
            <?php foreach ($consultation_time['timetable'] as $key => $value) : ?>
                <tr>
                    <td>
                        <input type="text" size="10" name="timetable[<?=$key?>][name]" value="<?=h($value['name'])?>">
                        診察時間<input type="text" size="10" name="timetable[<?=$key?>][start_time]" value="<?=h(toTimetableTime($value['start_time']))?>">
                        〜<input type="text" size="10" name="timetable[<?=$key?>][end_time]" value="<?=h(toTimetableTime($value['end_time']))?>">
                    </td>
                    <!--タイムテーブルのID別に登録するための値を送信 -->
                    <input type="hidden" name="timetable[<?=$key?>][id]" value="<?=h($value['id'])?>">
                    <?php foreach ($consultation_time['week'] as $key => $val) : ?>
                        <!--曜日毎に登録するための値を受け渡し -->
                        <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][week_id]" value="<?=h($val['week_id'])?>">
                        <!--タイムテーブルのID別に登録するための値を送信 -->
                        <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][timetable_id]" value="<?=h($value['id'])?>">
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation[<?=$value['id']?>][<?=$key?>][consultation_type]">
                                    <?php foreach(CONSULTATION_TYPE as $k => $v):?>
                                        <option value="<?=h($k)?>"<?=isset($consultation_time['consultation'][$value['id']][$key]['consultation_type']) && $consultation_time['consultation'][$value['id']][$key]['consultation_type'] == $k ? ' selected' : ''?>><?=$v?></option>
                                    <?php endforeach;?>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="consultation[<?=$value['id']?>][<?=$key?>][remarks]" placeholder="例)17:00まで"><?=isset($val['remarks']) ? h($val['remarks']) : ''?></textarea>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="submid-time">
            <p class="time-button">
                <input type="submit" value="確認">
            </p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>