<?php include 'inc/header.php';

Session::checkSession();
?>
<?php
if (isset($_GET['q'])) {
	$qno = (int) $_GET['q'];
} else {
	header('Location:exam.php');
}
$total = $exam->getTotalRows();
$question = $exam->getQuestionByNumber($qno);
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
	$process = $process->processUserAns($_POST);
?>
<div class="main">
	<h1>Question no. <?php echo $question['qunum']; ?> of <?php echo $total; ?></h1>
	<div class="test">
		<form method="post" action="">
			<table>
				<tr>
					<td colspan="2">
						<h3>QNo. <?php echo $question['qunum']; ?>: <?php echo $question['quname']; ?></h3>
					</td>
				</tr>
				<?php
				$ans = $exam->getANS($qno);
				if ($ans) {
					while ($data = $ans->fetch_assoc()) {

				?>
						<tr>
							<td>
								<input type="radio" name="ans" value="<?php echo $data['quid']; ?>" /><?php echo $data['ans'] ?>
							</td>
						</tr>
				<?php }
				} ?>

				<tr>
					<td>
						<input type="submit" name="submit" value="Next Question" />
						<input type="hidden" name="number" value="<?php echo $qno;?>" />
					</td>
				</tr>

			</table>
	</div>
</div>
<?php include 'inc/footer.php'; ?>