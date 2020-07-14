<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>
<div class="main">
    <h1>Your exam done !</h1>
    <div class="starttest">
        <p>Congrats! You have just completed the Test.</p>
        <p>Your score :
            <?php
            if (isset($_SESSION['score'])) {
                echo $_SESSION['score'];
                unset($_SESSION['score']);
            }
            ?>
        </p>
        <a href="viewans.php">View ans.</a>
        <a href="starttest.php">Start test</a>
    </div>

</div>
<?php include 'inc/footer.php'; ?>