<?php

$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/exam.php');

$exam = new Exam();
?>
<?php
// Session::checkLogin();
?>
<?php
//delete user
if (isset($_GET['remove_id'])) {
    $id = (int) $_GET['remove_id'];
$delq = $exam->RemoveQuestion($id);
}
?>
<div class="main">
    <div class='manageuser'>
        <h1>Admin panel - Question List</h1>

        <?php
        if (isset($delq)) {
            echo $delq;
        }
        ?>
        <table class='tblone'>
            <tr>
                <th width='10%'>No</th>
                <th width='70%'>Questions</th>
                <th width='20%'>Action</th>
            </tr>
            <?php
            //get user
            $getdata = $exam->getQuestionByNo();
            if ($getdata) {
                $i = 0;
                while ($data = $getdata->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data['quname']; ?></td>
                        <td><a onclick="return confirm('Are you sure to remove ??');" href="?remove_id=<?php echo $data['qunum']; ?>">Remove</a></td>
                    </tr>
            <?php }
            } ?>
        </table>
    </div>
</div>
<?php include 'inc/footer.php'; ?>