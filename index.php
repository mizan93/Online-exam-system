<?php include 'inc/header.php';

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/classes/user.php');
$user = new User();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$pass = md5($_POST['pass']);
	$login = $user->userLogin($email, $pass);
}
?>
<div class="main">
	<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png" />
	</div>

	<div class="segment">

		<form action="" method="post">
			<table class="tbl">
				<tr>
					<td>Email</td>
					<td><input name="email" type="text"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input name="pass" type="password"></td>
				</tr>

				<tr>
					<td></td>
					<td><input type="submit" name="login_submit" value="Signin">
					</td>
				</tr>
			</table>
		</form>
		<p>New User ? <a href="register.php">Signup</a> hare</p>
		<span style="color:red;"><?php if (isset($login)) {
										echo $login;
									} ?></span>
	</div>



</div>
<?php include 'inc/footer.php'; ?>