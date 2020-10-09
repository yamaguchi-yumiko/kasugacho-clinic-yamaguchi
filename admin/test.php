<?php

$this->connect();
$sql = 'UPDATE consultationTime SET consultation_type = ? remarks = ?
FROM consultationTime INNER JOIN m_week ON consultationTime.week_id = m_week.id INNER JOIN timetable ON consultationTime.timetable_id = timetable.id
WHERE  week_id = id';
$stm = $this->dbh->prepare($sql);
return $stm->execute();

// UPDATE  追加するテーブル
// SET  何を
// FROM    追加するテーブル
//             INNER JOIN マスター
//                 ON 追加テーブル.ID1 = マスター.ID
//             INNER JOIN 時間
//                 ON 追加.ID2 = 時間.ID
// WHERE  ;

$this->connect();
$sql = 'UPDATE timetable SET
FROM name = ? start_time = ? end_time =? WHERE id =?';
$stm = $this->dbh->prepare($sql);
return $stm->execute();

$this->connect();
$sql = 'INSERT timetable INTO
 name = ? start_time = ? end_time =? WHERE id =?';
$stm = $this->dbh->prepare($sql);
return $stm->execute();

        $this->connect();
        $sql = 'INSERT INTO consultationTime(week_id,timetable_id,consultation_type,remarks)
        VALUES(?, ?, ?, ?)';
        $stm = $this->dbh->prepare($sql);
        return $stm->execute($data);


?>
$dsn = 'mysql:host=localhost;dbname=db;charset=utf8';
$user = 'user';
$sql1 = "SELECT * FROM table1 WHERE name = ?";
$sql2 = "SELECT * FROM table2 WHERE name = ?";
$value1 = "佐藤";
$value2 = "鈴木";

$db = new PDO($this -> dsn, $this -> user);
$db -> setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$stmt1 = $db -> prepare($sql1);
$stmt1 -> bindValue(1, $value1, PDO::PARAM_STR);
$stmt1 -> execute();

$stmt2 = $db -> prepare($sql2);
$stmt2 -> bindValue(1, $value2, PDO::PARAM_STR);
$stmt2 -> execute();
