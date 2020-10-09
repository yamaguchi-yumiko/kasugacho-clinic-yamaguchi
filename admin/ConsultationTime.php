<?php

class ConsultationTime extends Model
{

    //午前・午後の時間を取得
    public function getTimeTable()
    {
        $this->connect();
        $sql = 'SELECT * FROM  timetable';
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll();
    }

    //診療時間の詳細を取得
    public function getConsultationTime()
    {
        $this->connect();
        $sql = 'SELECT * FROM m_week inner join consultation_time on m_week.id = consultation_time.week_id inner join timetable on consultation_time.timetable_id = timetable.id WHERE delete_flg = 0';
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll();
    }

    //診察時間帯を更新
    //診療時間のデータが入っていなければ追加、入っていれば更新
    public function editConsultationTime($data1,$data2)
    {
        $this->connect();
        $this->dbh->beginTransaction();
        try {
            $sql = 'UPDATE timetable SET name = ?,start_time = ?, end_time = ? WHERE id = ?';
            $stm = $this->dbh->prepare($sql);
            $stm->execute($data1);

            $sql = 'INSERT INTO consultation_time(week_id,timetable_id,consultation_type,remarks)VALUES(?, ?, ?, ?) ON DUPLICATE KEY UPDATE week_id = VALUES(week_id), timetable_id = VALUES(timetable_id),consultation_type = VALUES(consultation_type),remarks = VALUES(remarks)';
            $stma = $this->dbh->prepare($sql);
            $stma->execute($data2);

            return $this->dbh->commit();

        } catch (Exception $e) {
            $this->dbh->rollBack();
            throw $e;
        }
    }
}
