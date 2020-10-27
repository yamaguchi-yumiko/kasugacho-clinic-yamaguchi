<?php
class DoctorInfo extends Model
{
    //医師情報を医師管理リストとサイトページに表示
    public function getDoctorInfo()
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

    //医師情報を登録
    public function addDoctor($data)
    {
        $this->connect();
        $sql =
            'INSERT INTO docter'
                .'('
                .'  name'
                .', roman_name'
                .', gender'
                .', specialty_disease'
                .', belong'
                .', img'
                .', comment'
                .', directer_flg'
                .', directer_comment'
            .')VALUES('
                .'  ?'
                .', ?'
                .', ?'
                .', ?'
                .', ?'
                .', ?'
                .', ?'
                .', ?'
                .', ?'
            .')'
        ;

        $stm = $this->dbh->prepare($sql);
        return $stm->execute($data);
    }

    //医師情報を編集
    //編集を押した時にIDの内容を取得
    public function getDoctorIdInfo($id)
    {
        $this->connect();
        $sql = 'SELECT * FROM docter WHERE id = ?';
        $stm = $this->dbh->prepare($sql);
        $stm->execute([$id]);
        return $stm->fetch();
    }

    //編集内容を登録
    public function editDoctor($data)
    {
        $this->connect();
        $sql =
            'UPDATE docter SET'
                .'  name = ?'
                .', roman_name = ?'
                .', gender = ?'
                .', specialty_disease = ?'
                .', belong = ?'
                .', img = ?'
                .', comment = ?'
                .', directer_flg = ?'
                .', directer_comment = ?'
                .', updated_at = ?'
            .'WHERE id = ?'
        ;
        $stm = $this->dbh->prepare($sql);
        return $stm->execute($data);
    }

    //論理削除
    public function deleteDoctor($id)
    {
        $this->connect();
        $sql = 'UPDATE docter SET delete_flg = 1 WHERE id = ?';
        $stm = $this->dbh->prepare($sql);
        return $stm->execute([$id]);
    }
}
