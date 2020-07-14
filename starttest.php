<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>
<?php
$question = $exam->getAllq();
$total = $exam->getTotalRows();
?>
<div class="main">
    <h1>Welcome to Online Exam </h1>
    <div class="starttest">
        <h2>Test your knowledge</h2>
        <ul>
            <li><strong>Number of Question:</strong><?php  echo $total; ?></li>
            <li><strong>Type of Question:</strong>multiple choice</li>
        </ul>
        <a href="test.php?q=<?php echo $question['qunum']; ?>">Start test</a>
    </div>
</div>
<?php include 'inc/footer.php'; ?>