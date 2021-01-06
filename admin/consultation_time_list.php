<?php
require_once('config.php');
auth_confirm();
$consultationTime = new ConsultationTime();
//診療時間を取得
$consultation_time = $consultationTime->getConsultationTime();
?>
<!--header共通 -->
<?php require_once('clinic_management_header.php'); ?>
<main class="list-mai">
    <?php getPage(); ?>
    <table class="consultation-listbox">
        <tr>
            <th>
            </th>
            <?php foreach ($consultation_time['week'] as $week) : ?>
                <th>
                    <?=$week['name']?>
                </th>
            <?php endforeach ?>
        </tr>
        <?php foreach ($consultation_time['timetable'] as $value) : ?>
            <tr>
                <td>
                    <?=h($value['name'])?><br><?=h(toTimetableTime($value['start_time']))?><br>〜<br><?=h(toTimetableTime($value['end_time']))?>
                </td>
                <?php foreach ($consultation_time['week'] as $key => $val) : ?>
                    <td>
                        <p class="<?=getConsultationTimeMark($consultation_time['consultation'][$value['id']][$key]['consultation_type'])?>"></p>
                        <p class="remarks-indicate"><?=isset($consultation_time['consultation'][$value['id']][$key]['remarks']) ? h($consultation_time['consultation'][$value['id']][$key]['remarks']) : ''?></p>
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