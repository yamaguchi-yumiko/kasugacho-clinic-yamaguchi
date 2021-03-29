<?php
//XSS対策
function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}
/* 医師管理ページ */
//リスト管理のボタン表示
function getPage()
{
    $before_names = ['doctor' => '医師', 'consultation' => '診療時間',];
    $after_names = ['list' => '管理リスト', 'conf' => '確認', 'done' => '完了',];
    //URLのファイル名を取得
    $file_name = basename($_SERVER['PHP_SELF'], '.php');
    //ファイル名の最初の文字列を取得
    $before_string = substr($file_name, 0, stripos($file_name, '_'));
    //ファイル名の最後の文字列を取得して_を空に置換
    $after_string = str_replace('_', '', substr($file_name, strrpos($file_name, '_')));
    //配列要素を文字列で連結して表示
    echo '<p class="listbutton">'
        . (isset($before_names[$before_string]) ? $before_names[$before_string] : '')
        . (isset($_GET['type']) ? TYPE_NAME[$_GET['type']] : '')
        . (isset($after_names[$after_string]) ? $after_names[$after_string] : '')
        . '</p>'
    ;
}
//医師情報一覧のソート機能
function sortInfo($sql)
{
    $id_name = ['id' => ' id',];
    $sort_name = ['asc' => ' ASC', 'desc' => ' DESC',];
    $item_name = ['name' => ' roman_name', 'update' => ' updated_at',];
    $name_if_null = ['name' => ' IS NULL ASC,', 'update' => ' IS NULL ASC,',];
    $sort_id_name = ['name' => ', id ASC', 'update' => ', id ASC', 'directer' => ', id ASC',];
    $directer_flg_name = ['directer' => ' directer_flg= 1',];
    $sort_doctor_name = ['doctor' => ' id DESC',];
    if (isset($_GET['sort'])) {
        //GETパラメーターの最初の文字列を取得
        $before_string = substr($_GET['sort'], 0, stripos($_GET['sort'], '_'));
        //GETパラメーターの最後の文字列を取得して_を空に置換
        $after_string = str_replace('_', '', substr($_GET['sort'], strrpos($_GET['sort'], '_')));
        return $sql
            . (isset($directer_flg_name[$before_string]) ? $directer_flg_name[$before_string] : '')
            . (isset($id_name[$before_string]) ? $id_name[$before_string] : '')
            . (isset($item_name[$before_string]) ? $item_name[$before_string] : '')
            . (isset($name_if_null[$before_string]) ? $name_if_null[$before_string] : '')
            . (isset($item_name[$before_string]) ? $item_name[$before_string] : '')
            . (isset($sort_name[$after_string]) ? $sort_name[$after_string] : '')
            . (isset($sort_id_name[$before_string]) ? $sort_id_name[$before_string] : '')
        ;
    } else {
        return $sql . $sort_doctor_name['doctor'];
    }
}

//確認画面の性別を取得
function getGenderName()
{
    $gender_name_after = ['' => '未選択'];
    $gender_array_merge = GENDER + $gender_name_after;
    echo (isset($gender_array_merge[$_POST['gender']]) ? $gender_array_merge[h($_POST['gender'])] : '');
}

// 完了画面の文言を取得
function getDoneSentence()
{
    echo '<p class="complete">' . (isset(TYPE_NAME[$_GET['type']]) ? TYPE_NAME[$_GET['type']] : '') . 'が完了しました。</p>';
}

/*診療時間管理ページ*/
//timetableの時間を00:00に変換して表示
function toTimetableTime($time)
{
    return $time = (new Datetime($time))->format('H:i');
}

//リストページの診療時間のマークを取得
function getConsultationTimeMark($consultation_type)
{
    return (isset($consultation_type) ? h(CONSULTATION_MARK[$consultation_type]) : 'circle');
}

//フォームを経ずに直接アクセスした場合は拒否する
function deny_access(){
	if (!isset($_POST['token'])) {
		header('Location: contact.php');
		exit;
	}
}

//お問い合わせページのメール送信
function getSendMail($POST){
	try {
		define('SMTP_HOST', 'smtp.gmail.com');
		define('SMTP_PORT', 587);
		define('SMTP_PROTOCOL', 'tls');
		define('GMAIL_ADMIN', 'fabulous1109@gmail.com');
		define('GMAIL_APPPASS', 'dprscpajwauuljra');

		$SwiftSmtpTransport = new Swift_SmtpTransport(
			SMTP_HOST,
			SMTP_PORT,
			SMTP_PROTOCOL
		);

		$SwiftSmtpTransport ->setUsername(GMAIL_ADMIN);
		$SwiftSmtpTransport ->setPassword(GMAIL_APPPASS);
		$mailer = new Swift_Mailer($SwiftSmtpTransport);

		$message = new Swift_Message('お問い合わせありがとうございます。');
		$messageBody = "■お問い合わせ完了メール■\n\nこの度は、お問い合わせありがとうございます。\n下記の内容でお問い合わせを受け付けました。\n\n【お名前】"
			. $POST['name']
			. "\n\n【フリガナ】"
			. $POST['kana']
			. "\n\n【都道府】"
			. $POST['Prefectures']
			. "\n\n【市区町村】"
			. $POST['city']
			. "\n\n【番地】"
			. $POST['address']
			. "\n\n【マンション名等】"
			. $POST['building']
			. "\n\n【年齢】"
			. $POST['age']
			. "\n\n【メールアドレス】"
			. $POST['email']
			. "\n\n【電話番号】"
			. $POST['phone']
			. "\n\n【お問い合わせ内容】\n"
			. $POST['inquiry']
			. "\n\n=============================\n春日町診療所\nTEL：03-3999-8810\nmail：info＠Kasugacho.com\n============================="
		;
		$message->setBody($messageBody);
		$message->setFrom(['fabulous1109@gmail.com' => 'info＠Kasugacho.com']);
		$message->setTo([$POST['email'] => $POST['email']]);
		//メール送信
		$mailer->send($message);
		return '<p>お問い合わせありがとうございました。<br>送信が完了しました。<p>';
	} catch (Exception $e) {
		return '<p class="error">大変申し訳ございません。内部エラーが発生しました。<p>'
			.'<p>お手数ですが、時間をおいて再度お試し頂くか、03-3999-8810まで</br>お電話をいただけますようお願い申し上げます。<p>'
		;
	}
}
