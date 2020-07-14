<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/exam.php');
$exam = new Exam();
?>
<?php
// Session::checkLogin();
?>
<style>
    .adminpanel {
        width: 600px;
        color: #555;
        margin: 20px auto 0;
        padding: 10px;
        border: 1px dotted #ddd;
    }
</style>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $addQ = $exam->addQuestion($_POST);
}
$totalrows = $exam->getTotalRows();
$next = $totalrows + 1;
?>
<div class="main">
    <h1>Admin Panel-Add question</h1>
    <?php
    if (isset($addQ)) {
        echo $addQ;
    } ?>
    <div class='adminpanel'>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Question No.</td>
                    <td>:</td>
                    <td><input type="number" name='qunum' value="<?php
                                                                    if (isset($next)) {
                                                                        echo $next;
                                                                    } ?>" required></td>
                </tr>
                <tr>
                    <td>Question </td>
                    <td>:</td>
                    <td><input type="text" name='quname' placeholder="Enter question.." required></td>
                </tr>
                <tr>
                    <td>Option 1 </td>
                    <td>:</td>
                    <td><input type="text" name='ans1' placeholder="Enter option 1.." required></td>
                </tr>
                <tr>
                    <td>Option 2 </td>
                    <td>:</td>
                    <td><input type="text" name='ans2' placeholder="Enter option 2.." required></td>
                </tr>
                <tr>
                    <td>Option 3 </td>
                    <td>:</td>
                    <td><input type="text" name='ans3' placeholder="Enter option 3.." required></td>
                </tr>
                <tr>
                    <td>Option 4 </td>
                    <td>:</td>
                    <td><input type="text" name='ans4' placeholder="Enter option 4.." required></td>
                </tr>
                <tr>
                    <td>Right ans</td>
                    <td>:</td>
                    <td><input type="number" name='rightans' placeholder="Enter Right ans. no..."></td>
                </tr>
                <tr>

                    <td colspan="3" align="center"><input type="submit" value="Add Question"></td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php include 'inc/footer.php'; ?>