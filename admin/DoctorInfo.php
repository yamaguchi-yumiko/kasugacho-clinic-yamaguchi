<?php
class DoctorInfo extends Model
{
    //医師情報を医師管理リストとサイトページに表示
    public function getDoctorsInfo()
    {
        $this->connect();
        $sql = sortInfo('SELECT * FROM docter WHERE delete_flg = 0 ORDER BY');
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll();
    }
    //トップページ:院長みの情報を表示
    public function getDirecterInfo()
    {
        $this->connect();
        $sql = 'SELECT * FROM docter WHERE delete_flg = 0 AND directer_flg = 1';
        $stm = $this->dbh->query($sql);
        return $stm->fetch();
    }
    //DBに登録と更新する
    public function setDoctor(
        $name,
        $roman_name,
        $gender,
        $specialty_disease,
        $belong,
        $img,
        $comment,
        $directer_flg,
        $directer_comment,
        $id,
        $type
    ) {
        $this->connect();
        if ($type === 'add') {
            $sql =
                'INSERT INTO docter'
                . '('
                    . 'name'
                    . ', roman_name'
                    . ', gender'
                    . ', specialty_disease'
                    . ', belong'
                    . ', img'
                    . ', comment'
                    . ', directer_flg'
                    . ', directer_comment'
                . ')VALUES('
                    . '?'
                    . ', ?'
                    . ', ?'
                    . ', ?'
                    . ', ?'
                    . ', ?'
                    . ', ?'
                    . ', ?'
                    . ', ?'
                . ')'
            ;
            $stm = $this->dbh->prepare($sql);
            $stm->bindValue(1, !empty($name) ? $name : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(2, !empty($roman_name) ? $roman_name : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(3, !empty($gender) ? $gender : null, PDO::PARAM_INT);
            $stm->bindValue(4, !empty($specialty_disease) ? $specialty_disease : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(5, !empty($belong) ? $belong : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(6, !empty($img) ? $img : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(7, !empty($comment) ? $comment : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(8, $directer_flg, PDO::PARAM_INT);
            $stm->bindValue(9, !empty($directer_comment) ? $directer_comment : null, PDO::PARAM_STR_CHAR);
        } elseif ($type === 'edit') {
            $sql =
                'UPDATE docter SET'
                    . 'name = ?'
                    . ', roman_name = ?'
                    . ', gender = ?'
                    . ', specialty_disease = ?'
                    . ', belong = ?'
                    . ', img = ?'
                    . ', comment = ?'
                    . ', directer_flg = ?'
                    . ', directer_comment = ?'
                    . ', updated_at = ?'
                . ' WHERE id = ?'
            ;
            $stm = $this->dbh->prepare($sql);
            $stm->bindValue(1, !empty($name) ? $name : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(2, !empty($roman_name) ? $roman_name : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(3, !empty($gender) ? $gender : null, PDO::PARAM_INT);
            $stm->bindValue(4, !empty($specialty_disease) ? $specialty_disease : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(5, !empty($belong) ? $belong : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(6, !empty($img) ? $img : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(7, !empty($comment) ? $comment : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(8, $directer_flg, PDO::PARAM_INT);
            $stm->bindValue(9, !empty($directer_comment) ? $directer_comment : null, PDO::PARAM_STR_CHAR);
            $stm->bindValue(10, (new DateTime())->format('Y-m-d H:i:s.u'));
            $stm->bindValue(11, $id, PDO::PARAM_INT);
        }
        return $stm->execute();
    }
    //編集を押した時にIDの内容を取得
    public function getDoctorInfo($doctor_id)
    {
        $this->connect();
        $sql = 'SELECT * FROM docter WHERE id = ?';
        $stm = $this->dbh->prepare($sql);
        $stm->execute([$doctor_id]);
        return $stm->fetch();
    }
    //論理削除
    public function deleteDoctor($doctor_id)
    {
        $this->connect();
        $sql = 'UPDATE docter SET delete_flg = 1 WHERE id = ?';
        $stm = $this->dbh->prepare($sql);
        return $stm->execute([$doctor_id]);
    }
}
