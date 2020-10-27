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
    //URLの文字を分解
    $keywords = preg_split('/[=?&\/._]+/', str_replace('time', '', basename($_SERVER['REQUEST_URI'])));

    $before_names = ['doctor' => '医師', 'consultation' => '診療時間',];
    $after_names = ['list' => '管理リスト', 'conf' => '確認', 'done' => '完了',];
    $type_names = ['add' => '登録', 'edit' => '編集',];

    //配列要素を文字列で連結して表示
    return '<p class="listbutton"><a href="#">'
        . (isset($before_names[$keywords[0]]) ? $before_names[$keywords[0]] : '')
        . (in_array('type', $keywords) ? $type_names[$keywords[4]] : '')
        . (isset($after_names[$keywords[1]]) ? $after_names[$keywords[1]] : '')
        . (isset($after_names[$keywords[2]]) ? $after_names[$keywords[2]] : '')
        . '</a></p>';
}

//医師情報一覧のソート機能
function sortInfo($data)
{
    //URLを配列で取得
    $keywords1 = preg_split('/[=?&\/._]+/', str_replace('doctor_list.php?sort=', '', basename($_SERVER['REQUEST_URI'])));
    $keywords2 = preg_split('/[=?&\/._]+/', str_replace('doctorIntroduction.php?sort=', '', basename($_SERVER['REQUEST_URI'])));


    $parms1 = ['id' => ' id ',];
    $parms2 = ['asc' => ' ASC', 'desc' => ' DESC',];
    $parms3 = ['name' => ' roman_name', 'update' => ' updated_at',];
    $parms4 = ['name' => ' IS NULL ASC,', 'update' => ' IS NULL ASC,',];
    $parms5 = ['name' => ', id ASC', 'update' => ', id ASC', 'directer' => ', id ASC'];
    $parms6 = ['directer' => ' directer_flg= 1',];
    $parms7 = ['doctor' => ' id DESC ',];

    return $data
        . (isset($parms7[$keywords1[0]]) ? $parms7[$keywords1[0]] : '')
        . (isset($parms1[$keywords1[0]]) ? $parms1[$keywords1[0]] : '')
        . (isset($parms3[$keywords1[0]]) ? $parms3[$keywords1[0]] : '')
        . (isset($parms4[$keywords1[0]]) ? $parms4[$keywords1[0]] : '')
        . (isset($parms3[$keywords1[0]]) ? $parms3[$keywords1[0]] : '')
        . (isset($parms2[$keywords1[1]]) ? $parms2[$keywords1[1]] : '')
        . (isset($parms6[$keywords2[0]]) ? $parms6[$keywords2[0]] : '')
        . (isset($parms2[$keywords2[1]]) ? $parms2[$keywords2[1]] : '')
        . (isset($parms5[$keywords2[0]]) ? $parms5[$keywords2[0]] : '');
}

/*診療時間管理ページ*/
//timetableの時間を00:00に変換して表示
function toTimetableTime($data)
{
    return $data = (new Datetime($data))->format('H:i');
}

//確認画面のvalueを数字から文字へ変換を表示
function toExaminationType($data)
{
    if ($data === '1') return '診察する';
    if ($data === '2') return '特別時間';
    if ($data === '99') return '診察しない';
}

//条件に合った記号を取得
function setMark($data)
{
    if ($data === '1') return '<p class="circle"></>';
    if ($data === '2') return '<p class="triangl"></p>';
    if ($data === '99') return '<p class="cross"></p>';
}

//更新ボタンが押されたらDBを更新する
function insertNull($data)
{
    return (($data === '') ? NULL : ($data));
}

//各ページに設定、GETパラメーターのURLのキーを値に変換、_で分割してGET判定
function getParam()
{
    return array_flip(explode('_', $_GET['type']));
}
