<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//曜日を取得
$m_week = $consultationTime->getWeek();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
//タイムテーブルの時間を取得
$timetable = $consultationTime->getTimeTable();
if (isset($_POST['return'])) {
    $consultation_time = $_POST['consultation'] + $consultation_time;
    $timetable = $_POST['time'] + $timetable;
} else {
    //タイムテーブルのidの数分、多次元配列に変更
    foreach ($timetable as $value) {
        $week_array[$value['id']] = $m_week;
    }
    $consultation_time = $consultation_time + $week_array;
}
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
                <?php foreach ($m_week as $week) : ?>
                    <th class="row1">
                        <?=$week['name']?>
                    </th>
                <?php endforeach; ?>
            </tr>
            <?php foreach ($timetable as $key => $value) : ?>
                <tr>
                    <td>
                        <input type="text" size="10" name="time[<?=$key?>][name]" value="<?=$value['name']?>">
                        診察時間<input type="text" size="10" name="time[<?=$key?>][start_time]" value="<?=toTimetableTime($value['start_time'])?>">
                        〜<input type="text" size="10" name="time[<?=$key?>][end_time]" value="<?=toTimetableTime($value['end_time'])?>">
                    </td>
                    <!--タイムテーブルのID別に登録するための値を送信 -->
                    <input type="hidden" name="time[<?=$key?>][id]" value="<?=$value['id']?>">
                    <?php foreach ($consultation_time[$value['id']] as $key => $val) : ?>
                        <!--曜日毎に登録するための値を受け渡し -->
                        <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][week_id]" value="<?=$val['week_id']?>">
                        <!--タイムテーブルのID別に登録するための値を送信 -->
                        <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][t1imetable_id]" value="<?=$value['id']?>">
                        <td>
                            <label class="consultation-edit-label">
                                <select name="consultation[<?=$value['id']?>][<?=$key?>][consultation_type]">
                                    <option value="1"<?=isset($val['consultation_type']) && $val['consultation_type'] == 1 || !isset($val['consultation_type']) ? ' selected' : ''?>>診察する</option>
                                    <option value="2"<?=isset($val['consultation_type']) && $val['consultation_type'] == 2 ? ' selected' : ''?>>特別時間</option>
                                    <option value="99"<?=isset($val['consultation_type']) && $val['consultation_type'] == 99 ? ' selected' : ''?>>診察しない</option>
                                </select>
                            </label>
                            <span>備考</span><br>
                            <textarea cols="14" rows="4" name="consultation[<?=$value['id']?>][<?=$key?>][remarks]" placeholder="例)17:00まで"><?=isset($val['remarks']) ? $val['remarks'] : ''?></textarea>
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