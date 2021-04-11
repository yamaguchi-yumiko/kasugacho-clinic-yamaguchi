<?php
class ConsultationTime extends Model
{
    public function getConsultationTime()
    {
        $this->connect();
        //午前・午後の時間を取得
        $sql = 'SELECT * FROM timetable';
        $stm = $this->dbh->query($sql);
        $timetable = $stm->fetchAll(PDO::FETCH_ASSOC);

        //週の情報を取得
        $sql = 'SELECT id AS week_id, name FROM m_week';
        $stm = $this->dbh->query($sql);
        $week = $stm->fetchAll(PDO::FETCH_ASSOC);

        //診療時間の詳細を取得
        $sql =
            'SELECT'
                . ' timetable_id'
                . ', week_id'
                . ', timetable_id'
                . ', consultation_type'
                . ', remarks'
            . ' FROM consultation_time'
            . ' WHERE delete_flg = 0'
        ;
        $stm = $this->dbh->query($sql);
        $consultation = $stm->fetchAll(PDO::FETCH_ASSOC | PDO::FETCH_GROUP);
        return ['timetable' => $timetable, 'consultation' => $consultation, 'week' => $week,];
    }

    //診察時間帯を更新
    //診療時間のデータが入っていなければ追加、入っていれば更新
    public function editConsultationTime($post)
    {
        $this->connect();
        //トランザクション開始
        $this->dbh->beginTransaction();
        try {
            $sql = 'UPDATE timetable SET name = ?, start_time = ?, end_time = ? WHERE id = ?';
            $stm = $this->dbh->prepare($sql);
            foreach ($post['timetable'] as $value) {
                $stm->execute([$value['name'], $value['start_time'], $value['end_time'], $value['id']]);
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
					.' VALUES('
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
            foreach ($post['consultation'] as $value) {
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
            return '編集が完了しました。';
        } catch (PDOException $e) {
            //エラー時はロールバックで変更内容を破棄
            $this->dbh->rollBack();
            return '編集に失敗しました。';
        }
    }
}