<!--header共通 -->
<?php require_once('header.php'); ?>
<main>
	<!-- aside共通 -->
	<?php require_once('aside.php'); ?>
	<!-- contact -->
	<section id="contact">
		<h1>お問い合わせフォーム</h1>
		<div class="contact">
			<h2>お問い合わせ</h2>
			<?php if (isset($error)) : ?>
				<form action="confirm.php" method="post" novalidate="novalidate">
					<input type="hidden" name="token" value="<?= $_POST['token'] ?>">
					<table>
						<tr>
							<th>
								お名前<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['name']) ? h($error['name']) : '' ?></span>
								<input type="text" name="name" value="<?= $_POST['name'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								フリガナ<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['kana']) ? h($error['kana']) : '' ?></span>
								<input type="text" name="kana" value="<?= $_POST['kana'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>都道府県</th>
							<td>
								<select name="Prefectures">
									<?php foreach (PrefecturesS as $key => $value) : ?>
										<option value="<?= $value ?>" <?= $_POST['Prefectures'] === $value ? 'selected' : '' ?>><?= $value ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>
								市区町村<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['city']) ? h($error['city']) : '' ?></span>
								<input type="text" name="city" value="<?= $_POST['city'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								番地<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['address']) ? h($error['address']) : '' ?></span>
								<input type="text" name="address" value="<?= $_POST['address'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								マンション名等
							</th>
							<td>
								<input type="text" name="building" value="<?= $_POST['building'] ?>">
							</td>
						</tr>
						<tr>
							<th>
								年齢
							</th>
							<td>
								<input type="text" name="age" value="<?= $_POST['age'] ?>">
							</td>
						</tr>
						<tr>
							<th>
								電話番号
							</th>
							<td>
								<input type="tel" name="phone" value="<?= $_POST['phone'] ?>">
							</td>
						</tr>
						<tr>
							<th>
								メールアドレス<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['email']) ? h($error['email']) : '' ?></span>
								<input type="email" name="email" value="<?= $_POST['email'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								メールアドレス確認<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['email_conf']) ? h($error['email_conf']) : '' ?></span>
								<input type="email" name="email_conf" value="<?= $_POST['email_conf'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								お問い合わせ内容<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['inquiry']) ? h($error['inquiry']) : '' ?></span>
								<textarea name="inquiry" cols="50" rows="10" value="<?= $_POST['inquiry'] ?>" required></textarea>
							</td>
						</tr>
					</table>
					<p class="submit-button"><input type="submit" value="送信内容の確認へ"></p>
				</form>
			<?php else : ?>
				<table>
					<tr>
						<th>お名前</th>
						<td>
							<?= $_POST['name'] ?>
						</td>
					</tr>
					<tr>
						<th>フリガナ</th>
						<td>
							<?= $_POST['kana'] ?>
						</td>
					</tr>
					<tr>
						<th>都道府県</th>
						<td><?= $_POST['Prefectures'] ?></td>
					</tr>
					<tr>
						<th>市区町村</th>
						<td><?= $_POST['city'] ?></td>
					</tr>
					<tr>
						<th>番地</th>
						<td><?= $_POST['address'] ?></td>
					</tr>
					<tr>
						<th>マンション名等</th>
						<td><?= $_POST['building'] ?></td>
					</tr>
					<tr>
						<th>年齢</th>
						<td><?= $_POST['age'] ?></td>
					</tr>
					<tr>
						<th>電話番号</th>
						<td><?= $_POST['phone'] ?></td>
					</tr>
					<tr>
						<th>メールアドレス</th>
						<td><?= $_POST['email'] ?></td>
					</tr>
					<tr>
						<th>メールアドレス確認</th>
						<td><?= $_POST['email_conf'] ?></td>
					</tr>
					<tr>
						<th>お問い合わせ内容</th>
						<td><?= nl2br($_POST['inquiry']) ?></td>
					</tr>
				</table>
				<form action="done.php" method="post">
					<input type="hidden" name="token" value="<?= h($_POST['token']) ?>">
					<input type="hidden" name="name" value="<?= h($_POST['name']) ?>">
					<input type="hidden" name="kana" value="<?= h($_POST['kana']) ?>">
					<input type="hidden" name="city" value="<?= h($_POST['city']) ?>">
					<input type="hidden" name="address" value="<?= h($_POST['address']) ?>">
					<input type="hidden" name="phone" value="<?= h($_POST['phone']) ?>">
					<input type="hidden" name="age" value="<?= h($_POST['age']) ?>">
					<input type="hidden" name="email" value="<?= h($_POST['email']) ?>">
					<input type="hidden" name="email_conf" value="<?= h($_POST['email_conf']) ?>">
					<input type="hidden" name="inquiry" value="<?= h($_POST['inquiry']) ?>">
					<div class="contact-conf">
						<p class="submit-button-return"><input type="submit" value="戻る" formaction="contact.php"></p>
						<p class="submit-button-conf"><input type="submit" value="送信する"></p>
					</div>
				</form>
			<?php endif; ?>
		</div>
	</section>
</main>
<!--footer 共通 -->
<?php require_once('footer.php'); ?>


<main>
	<!-- aside共通 -->
	<?php require_once('aside.php'); ?>
	<!-- contact -->
	<section id="contact">
		<h1>お問い合わせフォーム</h1>
		<div class="contact">
			<h2>お問い合わせ</h2>
			<form action="<?= isset($error) ? 'confirm.php' : 'done.php' ?>" method="post" novalidate="novalidate">
				<input type="hidden" name="token" value="<?= h($_POST['token']) ?>">
				<input type="hidden" name="name" value="<?= h($_POST['name']) ?>">
				<input type="hidden" name="kana" value="<?= h($_POST['kana']) ?>">
				<input type="hidden" name="city" value="<?= h($_POST['city']) ?>">
				<input type="hidden" name="address" value="<?= h($_POST['address']) ?>">
				<input type="hidden" name="phone" value="<?= h($_POST['phone']) ?>">
				<input type="hidden" name="age" value="<?= h($_POST['age']) ?>">
				<input type="hidden" name="email" value="<?= h($_POST['email']) ?>">
				<input type="hidden" name="email_conf" value="<?= h($_POST['email_conf']) ?>">
				<input type="hidden" name="inquiry" value="<?= h($_POST['inquiry']) ?>">
				<table <?= !isset($error) ? 'class="conf-table"' : '' ?>>
					<tr>
						<th>
							<?= isset($error) ? 'お名前<span>(必須)</span>' : 'お名前:' ?>
						</th>
						<td>
							<?= isset($error) ? '<span>' . (isset($error['name']) ? $error['name'] : '') . '</span><input type="text" name="kana" value="' . h($_POST['name']) . '" required>' : h($_POST['kana']) ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? 'フリガナ<span>(必須)</span>' : 'フリガナ:' ?>
						</th>
						<td>
							<?= isset($error) ? '<span>' . (isset($error['kana']) ? $error['kana'] : '') . '</span><input type="text" name="kana" value="' . h($_POST['kana']) . '" required>' : h($_POST['kana']) ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? '都道府県' : '都道府県:' ?>
						</th>
						<td>
							<?php if (isset($error)) : ?>
								<select name="Prefectures">
									<?php foreach (PrefecturesS as $key => $value) : ?>
										<option value="<?= h($key) ?>" <?= $_POST['Prefectures'] === $value ? 'selected' : '' ?>><?= $value ?></option>
									<?php endforeach; ?>
								</select>
							<?php else : ?>
								<?= h($_POST['Prefectures']) ?>
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? '市区町村<span>(必須)</span>' : '市区町村:' ?>
						</th>
						<td>
							<?= isset($error) ? '<span>' . (isset($error['city']) ? $error['city'] : '') . '</span><input type="text" name="kana" value="' . h($_POST['city']) . '" required>' : h($_POST['city']) ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? '番地<span>(必須)</span>' : '番地:' ?>
						</th>
						<td>
							<?= isset($error) ? '<span>' . (isset($error['address']) ? $error['address'] : '') . '</span><input type="text" name="kana" value="' . h($_POST['address']) . '" required>' : h($_POST['address']) ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? 'マンション名等' : 'マンション名等:' ?>
						</th>
						<td>
							<?= isset($error) ? '<input type="text" name="building" value="' . h($_POST['building']) . '">' : h($_POST['building']) ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? '年齢' : '年齢:' ?>
						</th>
						<td>
							<?= isset($error) ? '<input type="text" name="age" value="' . h($_POST['age']) . '">' : h($_POST['age']) ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? '電話番号' : '電話番号:' ?>
						</th>
						<td>
							<?= isset($error) ? '<input type="tel" name="phone" value="' . h($_POST['phone']) . '">' : h($_POST['phone']) ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? 'メールアドレス<span>(必須)</span>' : 'メールアドレス:' ?>
						</th>
						<td>
							<?= isset($error) ? '<span>' . (isset($error['email']) ? $error['email'] : '') . '</span><input type="email" name="email" value="' . h($_POST['email']) . '" required>' : h($_POST['email']) ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? 'メールアドレス確認<span>(必須)</span>' : 'メールアドレス確認:' ?>
						</th>
						<td>
							<?= isset($error) ? '<span>' . (isset($error['email_conf']) ? $error['email_conf'] : '') . '</span><input type="email" name="email_conf" value="' . h($_POST['email_conf']) . '" required>' : h($_POST['email_conf']) ?>
						</td>
					</tr>
					<tr>
						<th>
							<?= isset($error) ? 'お問い合わせ内容<span>(必須)</span>' : 'お問い合わせ内容:' ?>
						</th>
						<td>
							<?= isset($error) ? '<span>' . (isset($error['inquiry']) ? $error['inquiry'] : '') . '</span><textarea name="email_conf" cols="44" rows="10" required>' . h($_POST['inquiry']) . '</textarea>' : h($_POST['inquiry']) ?>
						</td>
					</tr>
				</table>
				<div class="<?= !isset($error) ? 'contact-conf' : '' ?>">
					<p class="submit-button"><input type="submit" value="<?= isset($error) ? '送信内容の確認へ' : '送信する' ?>"></p>
					<?= !isset($error) ? '<p class="submit-button-return"><input type="submit" value="修正" formaction="contact.php"></p>' : '' ?>
				</div>
			</form>
		</div>
	</section>
</main>
<!--footer 共通 -->
<?php require_once('footer.php'); ?>

<form action="confirm.php" method="post" novalidate="novalidate">
					<input type="hidden" name="token" value="<?= $_POST['token'] ?>">
					<table>
						<tr>
							<th>
								お名前<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['name']) ? h($error['name']) : '' ?></span>
								<input type="text" name="name" value="<?= $_POST['name'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								フリガナ<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['kana']) ? h($error['kana']) : '' ?></span>
								<input type="text" name="kana" value="<?= $_POST['kana'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>都道府県</th>
							<td>
								<select name="Prefectures">
									<?php foreach (PrefecturesS as $key => $value) : ?>
										<option value="<?= h($key) ?>" <?= $_POST['Prefectures'] === $value ? 'selected' : '' ?>><?= $value ?></option>
									<?php endforeach; ?>
								</select>
							</td>
						</tr>
						<tr>
							<th>
								市区町村<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['city']) ? h($error['city']) : '' ?></span>
								<input type="text" name="city" value="<?= $_POST['city'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								番地<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['address']) ? h($error['address']) : '' ?></span>
								<input type="text" name="address" value="<?= $_POST['address'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								マンション名等
							</th>
							<td>
								<input type="text" name="building" value="<?= $_POST['building'] ?>">
							</td>
						</tr>
						<tr>
							<th>
								年齢
							</th>
							<td>
								<input type="text" name="age" value="<?= $_POST['age'] ?>">
							</td>
						</tr>
						<tr>
							<th>
								電話番号
							</th>
							<td>
								<input type="tel" name="phone" value="<?= $_POST['phone'] ?>">
							</td>
						</tr>
						<tr>
							<th>
								メールアドレス<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['email']) ? h($error['email']) : '' ?></span>
								<input type="email" name="email" value="<?= $_POST['email'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								メールアドレス確認<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['email_conf']) ? h($error['email_conf']) : '' ?></span>
								<input type="email" name="email_conf" value="<?= $_POST['email_conf'] ?>" required>
							</td>
						</tr>
						<tr>
							<th>
								お問い合わせ内容<span>(必須)</span>
							</th>
							<td>
								<span><?= isset($error['inquiry']) ? h($error['inquiry']) : '' ?></span>
								<textarea name="inquiry" cols="50" rows="10"  value="<?= $_POST['inquiry'] ?>" required></textarea>
							</td>
						</tr>
					</table>
					<p class="submit-button"><input type="submit" value="送信内容の確認へ"></p>
				</form>