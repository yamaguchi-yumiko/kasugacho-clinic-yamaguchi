<?php
// header共通
require_once('header.php');
deny_access();

if (!empty($_POST)){
	$_SESSION['key'] = isset($_SESSION['key']) ? $_SESSION['key'] : '';
    if (isset($_POST['token']) && $_POST['token'] === $_SESSION['key']) {
       	$done_message = getSendMail($_POST);
       	unset($_SESSION['key']);
	}
}
?>
<main>
	<!-- aside共通 -->
	<?php require_once('aside.php'); ?>
	<!-- contact -->
	<section id="contact">
		<h1>お問い合わせフォーム</h1>
		<div>
			<div class="contact">
				<h2>お問い合わせ</h2>
				<div class="contact-message">
					<?=isset($done_message) ? $done_message : '<p class="top-return"><a href="index.php">トップページに戻る</a></p>'?>
				</div>
			</div>
	</section>
</main>
<!--footer 共通 -->
<?php require_once('footer.php'); ?>
