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
        . (isset($_GET['type']) ? TYPE_NAME[$_GET['type']] : '')
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
    $gender_name_after = ['' => '未選択'];
    $gender_array_merge = GENDER + $gender_name_after;
    echo (isset($gender_array_merge[$_POST['gender']]) ? $gender_array_merge[h($_POST['gender'])] : '');
}
// 完了画面の文言を取得
function getDoneSentence()
{
    echo '<p class="complete">' . (isset(TYPE_NAME[$_GET['type']]) ? TYPE_NAME[$_GET['type']] : '') . 'が完了しました。</p>';
}
/*診療時間管理ページ*/
//timetableの時間を00:00に変換して表示
function toTimetableTime($time)
{
    return $time = (new Datetime($time))->format('H:i');
}

//編集画面の診療詳細を取得
function getEditMedicalDetails($consultation_type_name, $consultation_time_value, $remarks_name, $consultation_remarks_value)
{
    echo '<td><label class="consultation-edit-label"><select name="'
        . $consultation_type_name
        . '"><option value="1"'
        . (isset($consultation_time_value) && $consultation_time_value == 1 ? 'selected' : '')
        . '>診察する</option><option value="2"'
        . (isset($consultation_time_value) && $consultation_time_value == 2 ? 'selected' : '')
        . '>特別時間</option><option value="99"'
        . (isset($consultation_time_value) && $consultation_time_value == 99 ? 'selected' : '')
        . '>診察しない</option></select></label><span>備考</span><br><textarea cols="14" rows="4" name="'
        . $remarks_name
        . '" placeholder="例)17:00まで">'
        . (isset($consultation_time_value) ? $consultation_remarks_value : '')
        . '</textarea></td>'
    ;
}
//確認画面の診療詳細を取得
function getConfMedicalDetails($consultation_type, $remarks)
{
    if (isset($_GET['type']) && $_GET['type'] === 'edit') {
        echo '<td><p>'
            . (($consultation_type == 1) ? '診察する' : (($consultation_type == 2) ? '特別時間' : (($consultation_type == 99) ? '診察しない' : '')))
            . '</p><span>備考</span><br><p class="remarks">'
            . $remarks
            . '</p></td>'
        ;
    } else {
        echo '<td><p class="'
        .$consultation_type
        .'"></p>'
        .'<p class="remarks_indicate">'
        .$remarks
        .'</p></td>'
    ;
    }
}


//診療時間を取得
function getConsultationTime($consultation_type)
{
    echo '<dd class="row1"><p class="'
        . $consultation_type
        . '"></p></dd>'
    ;
}

//TOP画面の診療時間を取得
function getTopConsultationTime($consultation_type, $remarks)
{
    echo '<td class="row2"><span><p class="'
        . $consultation_type
        . '"></p></span><div>'
        . $remarks
        . '</div></td>'
    ;
}
