<?php
//XSS対策
function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
/* 医師管理ページ */
//リスト管理のボタン表示
function getPage()
{
    $before_names = ['doctor' => '医師', 'consultation' => '診療時間',];
    $type_names = ['add' => '登録', 'edit' => '編集',];
    $after_names = ['list' => '管理リスト', 'conf' => '確認', 'done' => '完了',];
    //URLのファイル名を取得
    $file_name = basename($_SERVER['PHP_SELF'], '.php');
    //ファイル名の最初の文字列を取得
    $before_string = substr($file_name, 0, stripos($file_name, '_'));
    //ファイル名の最後の文字列を取得して_を空に置換
    $after_string = str_replace('_', '', substr($file_name, strrpos($file_name, '_')));
    //配列要素を文字列で連結して表示
    echo '<p class="listbutton">'
        . (isset($before_names[$before_string]) ? $before_names[$before_string] : '')
        . (isset($_GET['type']) ? $type_names[$_GET['type']] : '')
        . (isset($after_names[$after_string]) ? $after_names[$after_string] : '')
        . '</p>'
    ;
}
//医師情報一覧のソート機能
function sortInfo($sql)
{
    $id_name = ['id' => ' id ',];
    $sort_name = ['asc' => ' ASC', 'desc' => ' DESC',];
    $item_name = ['name' => ' roman_name', 'update' => ' updated_at',];
    $name_if_null = ['name' => ' IS NULL ASC,', 'update' => ' IS NULL ASC,',];
    $sort_id_name = ['name' => ', id ASC', 'update' => ', id ASC', 'directer' => ', id ASC',];
    $directer_flg_name = ['directer' => ' directer_flg= 1',];
    $sort_doctor_name = ['doctor' => ' id DESC ',];
    if (isset($_GET['sort'])) {
        //GETパラメーターの最初の文字列を取得
        $before_string = substr($_GET['sort'], 0, stripos($_GET['sort'], '_'));
        //GETパラメーターの最後の文字列を取得して_を空に置換
        $after_string = str_replace('_', '', substr($_GET['sort'], strrpos($_GET['sort'], '_')));
        return $sql
            . (isset($directer_flg_name[$before_string]) ? $directer_flg_name[$before_string] : '')
            . (isset($id_name[$before_string]) ? $id_name[$before_string] : '')
            . (isset($item_name[$before_string]) ? $item_name[$before_string] : '')
            . (isset($name_if_null[$before_string]) ? $name_if_null[$before_string] : '')
            . (isset($item_name[$before_string]) ? $item_name[$before_string] : '')
            . (isset($sort_name[$after_string]) ? $sort_name[$after_string] : '')
            . (isset($sort_id_name[$before_string]) ? $sort_id_name[$before_string] : '')
        ;
    } else {
        return $sql . $sort_doctor_name['doctor'];
    }
}
//確認画面の性別を取得
function getGenderName()
{
    $gender = [GENDER_MAN => '男性', GENDER_WOMAN => '女性', '' => '未選択',];
    echo (isset($gender[$_POST['gender']]) ? $gender[$_POST['gender']] : '');
}
//submitボタンを取得
function getSubmitButton()
{
    $input_value = ['add' => '登録完了する', 'edit' => '編集を完了する',];
    $input_name = ['add' => 'add_done', 'edit' => 'edit_done',];

    if ((filter_input(INPUT_GET, 'type') === 'add')) {
        $form_action_add = ['add' => 'add',];
    } else {
        $form_action_edit = ['edit' => 'edit&id=' . $_GET['id']];
        $doctorInfo = new DoctorInfo();
        $doctor_info = $doctorInfo->getDoctorInfo($_GET['id']);
        $form_action_edit = ['edit' => "edit&id={$doctor_info['id']}",];
    }
    //URLのファイル名を取得
    $file_name = basename($_SERVER['PHP_SELF'], '.php');
    //ファイル名の最後の文字列を取得して_を空に置換
    $after_string = str_replace('_', '', substr($file_name, strrpos($file_name, '_')));
    //confページだったら
    if ($after_string === 'conf') {
        //戻るボタン
        echo  '<form action="" method="post">'
            . '<div class="submid_conteaner">'
            . '<p class="submit"><input type="submit" value="戻る" onClick="form.action=\''
            . 'doctor_edit.php?type='
            . (isset($form_action_add[$_GET['type']]) ? $form_action_add[$_GET['type']] : '')
            . (isset($form_action_edit[$_GET['type']]) ? $form_action_edit[$_GET['type']] : '')
            . '\';return true" ></p>'
            //戻るボタン
            . '<p class="submit"><input type="submit" name="'
            . (isset($input_name[$_GET['type']]) ? $input_name[$_GET['type']] : '')
            . '" value="'
            . (isset($input_value[$_GET['type']]) ? $input_value[$_GET['type']] : '')
            . '" onClick="form.action=\'doctor_done.php?type='
            . (isset($form_action_add[$_GET['type']]) ? $form_action_add[$_GET['type']] : '')
            . (isset($form_action_edit[$_GET['type']]) ? $form_action_edit[$_GET['type']] : '')
            . '\';return true" ></p>'
            . '</div>'
        ;
    } else {
        echo '<form action="doctor_conf.php?type='
            . (isset($form_action_add[$_GET['type']]) ? $form_action_add[$_GET['type']] : '')
            . (isset($form_action_edit[$_GET['type']]) ? $form_action_edit[$_GET['type']] : '')
            . '"method="post">'
        ;
    }
}
// 完了画面の文言を取得
function getDoneSentence()
{
    $sentence = ['add' => '登録が完了しました。', 'edit' => '編集が完了しました。',];
    echo '<p class="complete">' . (isset($sentence[$_GET['type']]) ? $sentence[$_GET['type']] : '') . '</p>';
}

/*診療時間管理ページ*/
//timetableの時間を00:00に変換して表示
function toTimetableTime($time)
{
    return $time = (new Datetime($time))->format('H:i');
}
//記号を取得
function getConsultationTimeMark($consultation_type)
{
    echo (($consultation_type === '1') ? '<p class="circle"></>' : (($consultation_type === '2') ? '<p class="triangl"></p>' : (($consultation_type === '99') ? '<p class="cross"></p>' : '')));
}
//編集画面の診療詳細を取得
function getEditMedicalDetails($consultation_type_name, $consultation_time_value, $remarks_name, $consultation_remarks_value)
{
    echo '<label class="consultation-edit-label">'
        . '<select name="' . $consultation_type_name . '">'
        . '<option value="1"' . (isset($consultation_time_value) && $consultation_time_value === '1' ? 'selected' : '') . '>診察する</option>'
        . '<option value="2"' . (isset($consultation_time_value) && $consultation_time_value === '2' ? 'selected' : '') . '>特別時間</option>'
        . '<option value="99"' . (isset($consultation_time_value) && $consultation_time_value === '99' ? 'selected' : '') . '>診察しない</option>'
        . '</select>'
        . '</label>'
        . '<span>備考</span><br>'
        . '<textarea cols="14" rows="4" name="' . $remarks_name . '" placeholder="例)17:00まで">' . (isset($consultation_time_value) ? $consultation_remarks_value : '') . '</textarea>'
    ;
}
//確認画面の診療詳細を取得
function getConfMedicalDetails($consultation_type, $remarks)
{
    echo '<p>' . (($consultation_type === '1') ? '診察する' : (($consultation_type === '2') ? '特別時間' : (($consultation_type === '99') ? '診察しない' : ''))) . '</p>'
        . '<span>備考</span><br>'
        . '<p class="remarks">' . $remarks . '</p>'
    ;
}
