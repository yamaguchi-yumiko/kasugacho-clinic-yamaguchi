<?php
class ConsultationTime extends Model
{
    //午前・午後の時間を取得
    public function getTimeTable()
    {
        $this->connect();
        $sql = 'SELECT * FROM timetable';
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll();
    }
    //診療時間の詳細を取得
    public function getConsultationTime()
    {
        $this->connect();
        $sql =
            'SELECT * FROM m_week'
                .' INNER JOIN consultation_time'
                .' ON m_week.id = consultation_time.week_id'
                .' INNER JOIN timetable'
                .' ON consultation_time.timetable_id = timetable.id'
            .' WHERE'
                .' delete_flg = 0'
        ;
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll();
    }
    //診察時間帯を更新
    //診療時間のデータが入っていなければ追加、入っていれば更新
    public function editConsultationTime($timetable, $week_id ,$timetable_id,$consultation_type,$remarks)
    {
        $this->connect();
        $this->dbh->beginTransaction();
        try {
            $sql = 'UPDATE timetable SET name = ?, start_time = ?, end_time = ? WHERE id = ?';
            $stm = $this->dbh->prepare($sql);
            $stm->execute($timetable);
            $sql =
                'INSERT INTO consultation_time('
                    .'week_id'
                    .', timetable_id'
                    .', consultation_type'
                    .', remarks'
                .' )VALUES('
                    .'?'
                    .', ?'
                    .', ?'
                    .', ?'
                .' )'
                .' ON DUPLICATE KEY UPDATE'
                    .' week_id ='
                    .' VALUES('
                        .' week_id'
                    .')'
                    .', timetable_id ='
                    .' VALUES('
                        .' timetable_id'
                    .' )'
                    .', consultation_type ='
                    .' VALUES('
                        .' consultation_type'
                    .' )'
                    .', remarks ='
                    .' VALUES('
                        .' remarks'
                    .')'
            ;
            $stm = $this->dbh->prepare($sql);
            $stm->bindValue(1,$week_id);
            $stm->bindValue(2,$timetable_id);
            $stm->bindValue(3,$consultation_type);
            $stm->bindValue(4,!empty($remarks) ? $remarks : null, PDO::PARAM_STR_CHAR);
            $stm->execute();
            return $this->dbh->commit();
        } catch (Exception $e) {
            $this->dbh->rollBack();
            throw $e;
        }
    }
}
