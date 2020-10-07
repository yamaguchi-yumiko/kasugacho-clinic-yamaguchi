<?php

class ConsultationTime extends Model
{
    //午前・午後の時間を取得
    public function getTimetable()
    {
        $this->connect();
        $sql = 'SELECT * FROM  timetable';
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll();
    }
    //最初の時間帯を更新
    public function updateTime1($date)
    {
        $this->connect();
        $sql = 'UPDATE timetable SET name = ?,start_time = ?, end_time = ? WHERE id = 1';
        $stm = $this->dbh->prepare($sql);
        return $stm->execute($date);
    }

    //最後の時間帯を更新
    public function updateTime2($date)
    {
        $this->connect();
        $sql = 'UPDATE timetable SET
        name = ? ,start_time = ? ,end_time = ? WHERE id = 2';
        $stm = $this->dbh->prepare($sql);
        return $stm->execute($date);
    }

    //診療時間の詳細を取得
    public function getConsultationTime()
    {
        $this->connect();
        $sql = 'SELECT * FROM m_week inner join consultation_time on m_week.id = consultation_time.week_id inner join timetable on consultation_time.timetable_id = timetable.id WHERE delete_flg = 0';
        $stm = $this->dbh->query($sql);
        return $stm->fetchAll();
    }

    //診療時間のデータが入っていなければ追加、入っていれば更新
    public function addConsultationTime($data)
    {
        $this->connect();
        $sql = 'INSERT INTO consultation_time(week_id,timetable_id,consultation_type,remarks)
        VALUES(?, ?, ?, ?) ON DUPLICATE KEY UPDATE week_id = VALUES(week_id), timetable_id = VALUES(timetable_id),consultation_type = VALUES(consultation_type),remarks = VALUES(remarks)';
        $stm = $this->dbh->prepare($sql);
        return $stm->execute($data);
    }
}
