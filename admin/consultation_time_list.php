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
//タイムテーブルのidの数分、多次元配列に変更
foreach ($timetable as $value) {
    $week_array[$value['id']] = $m_week;
}
$consultation_time = $consultation_time + $week_array;
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list_main">
    <?php getPage(); ?>
    <table class="consultation-listbox">
        <tr>
            <th>
            </th>
            <?php foreach ($m_week as $week) : ?>
                <th>
                    <?=$week['name']?>
                </th>
            <?php endforeach ?>
        </tr>
        <?php foreach ($timetable as $value) : ?>
            <tr>
                <td>
                    <?=$value['name']?><br><?=toTimetableTime($value['start_time'])?><br>〜<br><?=toTimetableTime($value['end_time'])?>
                </td>
                <?php foreach ($consultation_time[$value['id']] as $val) : ?>
                    <td>
                        <p class="<?=isset($val['consultation_type']) ? ($val['consultation_type'] == 1 ? 'circle' : ($val['consultation_type'] == 2 ? 'triangl' : ($val['consultation_type'] == 99 ? 'cross' : ''))) : 'circle'?>"></p>
                        <p class="remarks_indicate"><?=isset($val['consultation_type']) ? $val['remarks'] : ''?></p>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <form action="consultation_time_edit.php?type=edit" method="post">
        <div class="time-button">
            <p><input type="submit" value="編集"></p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>