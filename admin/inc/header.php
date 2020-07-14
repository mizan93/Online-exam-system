<?php
include_once("../lib/Session.php");
Session::checkAdminSession();
include_once("../lib/Database.php");
include_once("../helpers/Format.php");
$db  = new Database();
$fm  = new Format();
?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<!doctype html>
<html>

<head>
	<title>Admin</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/admin.css">
</head>

<body>
	<div class="phpcoding">
		<section class="headeroption"></section>
		<section class="maincontent">
			<div class="menu">
				<style>
					#active {
						background: greenyellow;
					}
				</style>
				<?php
				$path = $_SERVER['SCRIPT_FILENAME'];
				$currenpage = basename($path, '.php');

				?>

				<ul>
					<li><a <?php if ($currenpage == 'index') {
								echo 'id="active"';
							} ?> href="index.php">Home</a></li>
					<li><a <?php if ($currenpage == 'users') {
								echo 'id="active"';
							} ?> href="users.php">Manage user</a></li>
					<li><a <?php if ($currenpage == 'quesadd') {
								echo 'id="active"';
							} ?> href="quesadd.php">Add Ques</a></li>
					<li><a <?php if ($currenpage == 'queslist') {
								echo 'id="active"';
							} ?> href="queslist.php">Ques List</a></li>
					<?php
					if (isset($_GET['action']) && $_GET['action'] == 'logout') {
						Session::destroy();
						header('location:login.php');
						exit();
					} ?>
					<li><a href="?action=logout">Logout</a></li>
				</ul>
			</div>