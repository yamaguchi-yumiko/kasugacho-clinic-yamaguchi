<?php
//XSS対策
function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

//リスト管理のボタン表示
function getPage()
{
    if (!empty($_POST)) {

        if (isset($_POST['add_check'])) {
            return '<p class="listbutton"><a href="#">' . '医師名簿登録確認' . '</a></p>';
        }

        if (isset($_POST['edit_check'])) {
            return '<p class="listbutton"><a href="#">' . '医師名簿編集確認' . '</a></p>';
        }
    } elseif (!empty($_GET)) {

        if (isset($_GET['add'])) {
            return '<p class="listbutton"><a href="#">' . '医師名簿登録' . '</a></p>';
        }

        if (isset($_GET['id'])) {
            return '<p class="listbutton"><a href="#">' . '医師名簿編集' . '</a></p>';
        }

        if (isset($_GET['add_done'])) {
            return '<p class="listbutton"><a href="#">' . '医師名簿登録完了' . '</a></p>';
        }

        if (isset($_GET['edit_done'])) {
            return '<p class="listbutton"><a href="#">' . '医師名簿編集完了' . '</a></p>';
        }

        if (isset($_GET['orderby'])) {
            return '<p class="listbutton"><a href="#">' . '医師管理リスト' . '</a></p>';
        }

        if (isset($_GET['time'])) {
            return '<p class="listbutton"><a href="#">' . '診療時間管理リスト' . '</a></p>';
        }

        if (isset($_GET['time_edit'])) {
            return '<p class="listbutton"><a href="#">' . '診療時間編集' . '</a></p>';
        }
        if (isset($_GET['time_conf'])) {
            return '<p class="listbutton"><a href="#">' . '診療時間編集確認' . '</a></p>';
        }
        if (isset($_GET['time_done'])) {
            return '<p class="listbutton"><a href="#">' . '診療時間編集完了' . '</a></p>';
        }
    } else {
        return '<p class="listbutton"><a href="#">' . '医師管理リスト' . '</a></p>';
    }
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
