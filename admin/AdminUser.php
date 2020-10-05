<?php
class AdminUser extends Model
{
    public function userAuth()
    {
        $this->connect();
        $sql = 'SELECT * FROM admin_user WHERE delete_flg = 0 AND login_id = ?';
        $stm = $this->dbh->prepare($sql);
        $stm->execute([$_POST['id']]);
        return $stm->fetch();
    }
}

