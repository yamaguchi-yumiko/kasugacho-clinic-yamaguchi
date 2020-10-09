<?php
//XSS対策
function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

//リスト管理のボタン表示
function getPage()
{

if(isset($_GET['doctor'])){
    $befor = '医師名簿';
}

if(isset($_GET['consultation'])){
    $befor = '診療時間';
}

if(isset($_GET['list'])){
    $afte = '管理リスト';
}

if(isset($_GET['add'])){
    $afte = '登録';
}

if(isset($_GET['addConf'])){
    $afte = '登録確認';
}

if(isset($_GET['addDone'])){
    $afte = '登録完了';
}

if(isset($_GET['edit'])){
    $afte = '編集';
}

if(isset($_GET['editConf'])){
    $afte = '編集確認';
}

if(isset($_GET['editDone'])){
    $afte = '編集完了';
}

return '<p class="listbutton"><a href="#">' .$befor.$afte. '</a></p>';
}


//医師情報一覧のソート機能
class SortList extends Model
{

    public function sortInfo()
    {
        $this->connect();
        if (isset($_GET['orderby'])) {
            //▲を押したらIDの新しい順に表示
            if ($_GET['orderby'] === 'id_asc') {
                $sql = 'SELECT * FROM docter WHERE delete_flg = 0 ORDER BY id DESC';
            }
            //▲を押したらIDの古い順に表示
            if ($_GET['orderby'] === 'id_desc') {
                $sql = 'SELECT * FROM docter WHERE delete_flg = 0 ORDER BY id ASC';
            }
            //▼を押したらローマ字の古い順に表示
            if ($_GET['orderby'] === 'name_asc') {
                $sql = 'SELECT * FROM docter WHERE delete_flg = 0  ORDER BY roman_name IS NULL ASC, roman_name DESC, id ASC';
            }
            //▲を押したらローマ字の新しい順に表示
            if ($_GET['orderby'] === 'name_desc') {
                $sql = $sql = 'SELECT * FROM docter WHERE delete_flg = 0 ORDER BY roman_name ="" ASC, roman_name ASC, id ASC';
            }
            //▲を押したら更新日時の新しい順に表示
            if ($_GET['orderby'] === 'update_asc') {
                $sql = 'SELECT * FROM docter WHERE delete_flg = 0 ORDER BY updated_at IS NULL ASC, updated_at DESC, id ASC';
            }
            //▼を押したら更新日時の古い順に表示
            if ($_GET['orderby'] === 'update_desc') {
                $sql = 'SELECT * FROM docter WHERE delete_flg = 0 ORDER BY updated_at IS NULL ASC, updated_at ASC, id ASC';
            }
        } else {
            //初回はIDの古い順で表示
            $sql = 'SELECT * FROM docter WHERE delete_flg = 0 ORDER BY id ASC';
        }

        $stm = $this->dbh->query($sql);
        return $stm->fetchAll();
    }
}

//確認画面のvalueを数字から文字へ変換を表示
function changeSelectName($data)
{
    if ($data === '1') {
        return '診察する';
    } elseif ($data === '2') {
        return  ' 特別時間';
    } elseif ($data === '99') {
        return '診察しない';
    }
}

//timetableの時間を00:00に変換して表示
function changeTimeFormat($data)
{
    return $date = (new Datetime($data))->format('H:i');
}

//条件に合った記号を表示
function getMark($data)
{
    if ($data === '1') {
        return '<p class="circle"></p>';
    } elseif ($data === '2') {
        return '<p class="triangl"></p>';
    } elseif ($data === '99') {
        return '<p class="cross"></p>';
    }
}
