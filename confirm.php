<?php
// header共通
require_once('header.php');
deny_access();

if (!empty($_POST)) {

	if ($_POST['name'] === '') {
		$error['name'] = '※名前を入力して下さい';
	}

	if ($_POST['kana'] === '') {
		$error['kana'] = '※フリガナを入力して下さい';
	} elseif (!preg_match('/[ァ-ヶ]+/', $_POST['kana'])) {
		$error['kana'] = '※フリガナの形式が正しくありません';
	}

	if ($_POST['Prefectures'] === '') {
		$error['Prefectures'] = '※都道府県を入力して下さい';
	}

	if ($_POST['city'] === '') {
		$error['city'] = '※市区町村を入力して下さい';
	}

	if ($_POST['address'] === '') {
		$error['address'] = '※番地を入力して下さい';
	}

	if ($_POST['email'] === '') {@
		$error['email'] = '※メールアドレスを入力して下さい';
	}

	if ($_POST['email_conf'] === '') {
		$error['email_conf'] = '※メールアドレス確認を入力して下さい';
	} elseif ($_POST['email'] !== $_POST['email_conf']) {
		$error['email_conf'] = '※メールアドレスが一致しません';
	}

	if ($_POST['inquiry'] === '') {
		$error['inquiry'] = '※お問い合わせ内容を入力して下さい';
	} elseif (mb_strlen($_POST['inquiry']) < 20) {
		$error['inquiry'] = '※20文字以上を入力して下さい';
	}
}

?>
<!--header共通 -->
<?php require_once('header.php'); ?>
<?php if (isset($error)) : ?>
	<?php require_once('contact.php'); ?>
<?php else : ?>
	<main>
		<!-- aside共通 -->
		<?php require_once('aside.php'); ?>
		<!-- contact -->
		<section id="contact">
			<h1>お問い合わせフォーム</h1>
			<div class="contact">
				<h2>お問い合わせ</h2>
				<table class="conf-table">
					<tr>
						<th>お名前:</th>
						<td>
							<?=h($_POST['name'])?>
						</td>
					</tr>
					<tr>
						<th>フリガナ:</th>
						<td>
							<?=h($_POST['kana'])?>
						</td>
					</tr>
					<tr>
						<th>都道府県:</th>
						<td><?=h(PREFECTURES[$_POST['Prefectures']])?></td>
					</tr>
					<tr>
						<th>市区町村:</th>
						<td><?=h($_POST['city'])?></td>
					</tr>
					<tr>
						<th>番地:</th>
						<td><?=h($_POST['address'])?></td>
					</tr>
					<tr>
						<th>マンション名等:</th>
						<td><?=h($_POST['building'])?></td>
					</tr>
					<tr>
						<th>年齢:</th>
						<td><?=h($_POST['age'])?></td>
					</tr>
					<tr>
						<th>電話番号:</th>
						<td><?=h($_POST['phone'])?></td>
					</tr>
					<tr>
						<th>メールアドレス:</th>
						<td><?=h($_POST['email'])?></td>
					</tr>
					<tr>
						<th>メールアドレス確認:</th>
						<td><?=h($_POST['email_conf'])?></td>
					</tr>
					<tr>
						<th>お問い合わせ内容:</th>
						<td><?=nl2br(h($_POST['inquiry']))?></td>
					</tr>
				</table>
				<form action="done.php" method="post">
					<input type="hidden" name="token" value="<?=h($_POST['token'])?>">
					<input type="hidden" name="name" value="<?=h($_POST['name'])?>">
					<input type="hidden" name="kana" value="<?=h($_POST['kana'])?>">
					<input type="hidden" name="Prefectures" value="<?=h(PREFECTURES[$_POST['Prefectures']])?>">
					<input type="hidden" name="city" value="<?=h($_POST['city'])?>">
					<input type="hidden" name="address" value="<?=h($_POST['address'])?>">
					<input type="hidden" name="building" value="<?=h($_POST['building'])?>">
					<input type="hidden" name="age" value="<?=h($_POST['age'])?>">
					<input type="hidden" name="email" value="<?=h($_POST['email'])?>">
					<input type="hidden" name="email_conf" value="<?=h($_POST['email_conf'])?>">
					<input type="hidden" name="phone" value="<?=h($_POST['phone'])?>">
					<input type="hidden" name="inquiry" value="<?=h($_POST['inquiry'])?>">
					<div class="contact-conf">
						<p class="submit-button-return"><input type="submit" value="修正" formaction="contact.php"></p>
						<p class="submit-button-conf"><input type="submit" name="done" value="送信する"></p>
					</div>
				</form>
			</div>
		</section>
	</main>
<?php endif; ?>
<!--footer 共通 -->
<?php require_once('footer.php'); ?>