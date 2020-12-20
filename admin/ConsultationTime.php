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
        $sql = 'SELECT timetable_id, consultation_time. week_id, timetable_id, consultation_type, remarks FROM consultation_time WHERE delete_flg = 0';
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
    }

    //診察時間帯を更新
    //診療時間のデータが入っていなければ追加、入っていれば更新
    public function editConsultationTime($time, $consultation)
    {
        $this->connect();
        $this->dbh->beginTransaction();
        try {
            $sql = 'UPDATE timetable SET name = ?, start_time = ?, end_time = ? WHERE id = ?';
            $stm = $this->dbh->prepare($sql);
            foreach ($time as $value) {
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
            foreach ($consultation as $value) {
                foreach ($value as $valu) {
                    $stm->bindValue(1, $valu['week_id']);
                    $stm->bindValue(2, $valu['timetable_id']);
                    $stm->bindValue(3, $valu['consultation_type']);
                    $stm->bindValue(4, !empty($valu['remarks']) ? $valu['remarks'] : null, PDO::PARAM_STR_CHAR);
                    $stm->execute();
                }
            }
            return $this->dbh->commit();
        } catch (Exception $e) {
            $this->dbh->rollBack();
            throw $e;
        }
    }
}
