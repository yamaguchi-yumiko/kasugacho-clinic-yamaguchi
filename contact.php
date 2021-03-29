<!--header共通 -->
<?php require_once('header.php');
//トークンを$_SESSIONに格納し、それをキーとする
$_SESSION['key'] = getToken();
?>
<main>
	<!-- aside共通 -->
	<?php require_once('aside.php'); ?>
	<!-- contact -->
	<section id="contact">
		<h1>お問い合わせフォーム</h1>
		<div class="contact">
			<h2>お問い合わせ</h2>
			<form action="confirm.php" method="post" novalidate="novalidate">
				<input type="hidden" name="token" value="<?=h($_SESSION['key'])?>">
				<table>
					<tr>
						<th>
							<p>お名前<span>(必須)</span></p>
						</th>
						<td>
							<span><?=isset($error['name']) ? h($error['name']) : ''?></span>
							<input type="text" name="name" value="<?=isset($_POST['name']) ? h($_POST['name']) : ''?>" required>
						</td>
					</tr>
					<tr>
						<th>
							フリガナ<span>(必須)</span>
						</th>
						<td>
							<span><?=isset($error['kana']) ? h($error['kana']) : ''?></span>
							<input type="text" name="kana" value="<?=isset($_POST['kana']) ? h($_POST['kana']) : ''?>" required>
						</td>
					</tr>
					<tr>
						<th>都道府県</th>
						<td>
							<select name="Prefectures">
								<?php foreach (PREFECTURES as $key => $value) : ?>
									<option value="<?=h($key)?>"<?=isset($_POST['Prefectures']) && $_POST['Prefectures'] == $key ? ' selected' : ''?>><?=$value?></option>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							市区町村<span>(必須)</span>
						</th>
						<td>
							<span><?=isset($error['city']) ? h($error['city']) : ''?></span>
							<input type="text" name="city" value="<?=isset($_POST['city']) ? h($_POST['city']) : ''?>" required>
						</td>
					</tr>
					<tr>
						<th>
							番地<span>(必須)</span>
						</th>
						<td>
							<span><?=isset($error['address']) ? h($error['address']) : ''?></span>
							<input type="text" name="address" value="<?=isset($_POST['address']) ? h($_POST['address']) : ''?>" required>
						</td>
					</tr>
					<tr>
						<th>
							マンション名等
						</th>
						<td>
							<input type="text" name="building" value="<?=isset($_POST['building']) ? h($_POST['building']) : ''?>">
						</td>
					</tr>
					<tr>
						<th>
							年齢
						</th>
						<td>
							<input type="text" name="age" value="<?=isset($_POST['age']) ? h($_POST['age']) : ''?>">
						</td>
					</tr>
					<tr>
						<th>
							電話番号
						</th>
						<td>
							<input type="tel" name="phone" value="<?=isset($_POST['phone']) ? h($_POST['phone']) : ''?>">
						</td>
					</tr>
					<tr>
						<th>
							メールアドレス<span>(必須)</span>
						</th>
						<td>
							<span><?=isset($error['email']) ? h($error['email']) : ''?></span>
							<input type="email" name="email" value="<?=isset($_POST['email']) ? h($_POST['email']) : ''?>" required>
						</td>
					</tr>
					<tr>
						<th>
							メールアドレス確認<span>(必須)</span>
						</th>
						<td>
							<span><?=isset($error['email_conf']) ? h($error['email_conf']) : ''?></span>
							<input type="email" name="email_conf" value="<?=isset($_POST['email_conf']) ? h($_POST['email_conf']) : ''?>" required>
						</td>
					</tr>
					<tr>
						<th>
							お問い合わせ内容<span>(必須)</span>
						</th>
						<td>
							<span><?=isset($error['inquiry']) ? h($error['inquiry']) : ''?></span>
							<textarea name="inquiry" cols="44" rows="8" wrap="hard" required><?=isset($_POST['inquiry']) ? h($_POST['inquiry']) : ''?></textarea>
						</td>
					</tr>
				</table>
				<p class="submit-button"><input type="submit" value="送信内容の確認へ"></p>
			</form>
		</div>
	</section>
</main>
<!--footer 共通 -->
<?php require_once('footer.php'); ?>