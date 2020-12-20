<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//タイムテーブルの時間を取得
$timetable = $consultationTime->getTimeTable();
//曜日を取得
$m_week = $consultationTime->getWeek();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
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
    <form action="consultation_time_done.php?type=edit" method="post">
        <table class="consultation-edit-listbox">
            <tr>
                <th>
                </th>
                <?php foreach ($m_week as $week) : ?>
                    <th>
                        <?=$week['name']?>
                    </th>
                <?php endforeach; ?>
            </tr>
            <?php foreach ($timetable as $key => $value) : ?>
                <tr>
                    <td class="time">
                        <p><?=$_POST['time'][$key]['name']?></p>
                        診療時間<p><?=$_POST['time'][$key]['start_time']?></p>
                        〜<p><?=$_POST['time'][$key]['end_time']?></p>
                    </td>
                    <!--タイムテーブルの内容を受け渡し-->
                    <input type="hidden" name="time[<?=$key?>][name]" value="<?=$_POST['time'][$key]['name']?>">
                    <input type="hidden" name="time[<?=$key?>][start_time]" value="<?=$_POST['time'][$key]['start_time']?>">
                    <input type="hidden" name="time[<?=$key?>][end_time]" value="<?=$_POST['time'][$key]['end_time']?>">
                    <input type="hidden" name="time[<?=$key?>][id]" value="<?=$value['id']?>">
                    <?php foreach ($consultation_time[$value['id']] as $key => $val) : ?>
                        <td>
                            <p><?=($_POST['consultation'][$value['id']][$key]['consultation_type'] == 1) ? '診察する' : (($_POST['consultation'][$value['id']][$key]['consultation_type'] == 2) ? '特別時間' : (($_POST['consultation'][$value['id']][$key]['consultation_type'] == 99) ? '診察しない' : ''))?></p>
                            <span>備考</span><br>
                            <p class="remarks"><?=$_POST['consultation'][$value['id']][$key]['remarks']?></p>
                        </td>
                        <!--診療時間の値を受け渡し -->
                        <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][week_id]" value="<?=$val['week_id']?>">
                        <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][timetable_id]" value="<?=$value['id']?>">
                        <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][consultation_type]" value="<?=$_POST['consultation'][$value['id']][$key]['consultation_type']?>">
                        <input type="hidden" name="consultation[<?=$value['id']?>][<?=$key?>][remarks]" value="<?=$_POST['consultation'][$value['id']][$key]['remarks']?>">
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="submid_time">
            <p class="time-button"><input type="submit" name="return" value="戻る" formaction="consultation_time_edit.php?type=edit"></p>
            <p class="time-button"><input type="submit" name="done" value="完了"></p>
        </div>
    </form>
</main>
<!--footer共通 -->
<?php require_once('clinic_management_footer.php'); ?>