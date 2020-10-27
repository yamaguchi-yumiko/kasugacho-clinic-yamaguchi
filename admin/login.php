<?php
require_once('config.php');

// もしログインボタンが押されたら
if (isset($_POST['login'])) {

    if ($_POST['id'] === '' || $_POST['pass'] === '') {
        $error = 'IDかパスワードが入力されていません。';
    } else {

        $befordmin_user = new AdminUser();
        $result = $befordmin_user->userAuth();

        //戻り値が存在して、フォームからのパスワードとデータベースのパスワードが一致したら
        if ($result && $_POST['pass'] == $result['login_pass']) {

            //セッションIDを再発行
            session_regenerate_id(true);

            //ユーザ情報をセッション変数に登録
            $_SESSION['id'] = $result['id'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['login_id'] = $result['login_id'];
            //ログイン許可をセッション変数'auth'に登録
            $_SESSION['auth'] = 1;

            header('Location: top.php');
            exit;
        }
        $error = 'IDかパスワードが間違っています。';
    }
}

?>
<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex,nofollow,noarchive">
    <title>春日町診療所システム 管理画面ログイン</title>
    <link rel="stylesheet" type="text/css" href="../css/doctormanagement.css" media="all">
</head>

<body class="loginconteaner">

    <div id='top-fixed' class='sp'></div>
    <header id="headerTop">
        <div id="top" class="pc"></div>
    </header>
    <div class="logintop">
        <h1>春日町診療所管理システム 管理画面ログイン</h1>
        <main  class="loginmain">
            <div class="errortop">
                <?php if (isset($error)) : ?>
                    <span class="error"><?=$error?></span>
                <?php endif; ?>
            </div>
            <div class="loginform">
                <form action="" method="post">
                    <table>
                        <tr>
                            <th>ログインID</th>
                            <td><input type="text" name="id" size="20" value="<?=(isset($_POST['id']) ? h($_POST['id']) : '')?>"></td>
                        </tr>
                        <tr>
                            <th>パスワード</th>
                            <td><input type="password" name="pass" size="20"></td>
                        </tr>
                    </table>
                    <div class="loginsubmit"><input type="submit" value="認証" name="login"></div>
                </form>
            </div>
        </main>
        <footer class="loginfootr"></footer>
    </div>
</body>

</html>