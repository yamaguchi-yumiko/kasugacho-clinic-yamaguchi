<?php
class ConsultationTime extends Model
{
    //午前・午後の時間を取得
    public function getTimeTable()
    {
        $this->connect();
        $sql = 'SELECT * FROM timetable';
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    //週の情報を取得
    public function getWeek()
    {
        $this->connect();
        $sql = 'SELECT id AS week_id, name FROM m_week';
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    //診療時間の詳細を取得
    public function getConsultationTime()
    {
        $this->connect();
        $sql =
            'SELECT timetable_id, consultation_time.'
                . 'week_id'
                . ', timetable_id'
                . ', consultation_type'
                . ', remarks'
            . ' FROM'
                .' consultation_time'
            . ' WHERE'
                . ' delete_flg = 0'
            ;
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
    }

    //診察時間帯を更新
    //診療時間のデータが入っていなければ追加、入っていれば更新
    public function editConsultationTime($POST)
    {
        $this->connect();
        //トランザクション開始
        $this->dbh->beginTransaction();
        try {
            $sql = 'UPDATE timetable SET name = ?, start_time = ?, end_time = ? WHERE id = ?';
            $stm = $this->dbh->prepare($sql);
            foreach ($POST['time'] as $value) {
                $stm->execute(array_values($value));
            }
            $sql =
                'INSERT INTO consultation_time('
                    . 'week_id'
                    . ', timetable_id'
                    . ', consultation_type'
                    . ', remarks'
                . ')VALUES('
                    . '?'
                    . ', ?'
                    . ', ?'
                    . ', ?'
                . ')'
                . ' ON DUPLICATE KEY UPDATE'
                    . ' week_id ='
                    . ' VALUES('
                    . 'week_id'
                . ')'
                . ', timetable_id ='
                . ' VALUES('
                    . 'timetable_id'
                . ')'
                . ', consultation_type ='
                . ' VALUES('
                    . 'consultation_type'
                . ')'
                . ', remarks ='
                . ' VALUES('
                    . 'remarks'
                . ')'
            ;
            $stm = $this->dbh->prepare($sql);
            foreach ($POST['consultation'] as $value) {
                foreach ($value as $val) {
                    $stm->bindValue(1, $val['week_id']);
                    $stm->bindValue(2, $val['timetable_id']);
                    $stm->bindValue(3, $val['consultation_type']);
                    $stm->bindValue(4, (!empty($val['remarks']) ? $val['remarks'] : null), PDO::PARAM_STR_CHAR);
                    $stm->execute();
                }
            }
             //エラーがなければコミット
            $this->dbh->commit();
        } catch (Exception $e) {
            //エラー時はロールバックで変更内容を破棄
            $this->dbh->rollBack();
            //エラーメッセージをdoneに表示
            echo '失敗しました。' . $e->getMessage();
        }
    }
}
