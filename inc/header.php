<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/session.php');
Session::init();
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');

spl_autoload_register(function ($class) {
	include_once 'classes/' . $class . '.php';
});
$bd = new Database();
$fm = new Format();
$user = new User();
$exam = new Exam();
$process = new Process();
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
	<title>Online Exam System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="script/validation.min.js"></script>
	<script src="js/register.js"></script>
	<script src="js/main.js"></script>
</head>

<body>
	<?php
	if (isset($_GET['action']) && $_GET['action'] == 'logout') {
		Session::destroy();
		header('Location:index.php');
		exit();
	}
	?>
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
					<?php 
				$login=Session::get('login');
				if ($login==true) {
				
					 ?>
					<li><a <?php if ($currenpage == 'profile') {
								echo 'id="active"';
							} ?> href="profile.php">Profile</a></li>

					<li><a <?php if ($currenpage == 'exam') {
								echo 'id="active"';
							} ?>href="exam.php">Exam</a></li>
								<li><a href="?action=logout">Logout</a></li>
						<?php }else{ ?>
					<li><a <?php if ($currenpage == 'index') {
								echo 'id="active"';
							} ?>href="index.php">Login</a></li>
					<li><a <?php if ($currenpage == 'register') {
								echo 'id="active"';
							} ?> href="register.php">Register</a></li>
				<?php } ?>
				</ul> <span style="float: right;">
					Welcome <strong>
						<?php echo Session::get('Name') ?>
					</strong>
				</span>
			</div>