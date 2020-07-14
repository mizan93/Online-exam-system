<?php include 'inc/header.php';

Session::checkSession();

$total = $exam->getTotalRows();
?>

<div class="main">
    <h1>Total Question : <?php echo $total; ?> & Ans given :</h1>
    <div class="test">
        <table>
            <?php
            $question = $exam->getQuestionByNo();
            if ($question) {
                while ($data = $question->fetch_assoc()) { ?>
                    <tr>
                        <td colspan="2">
                            <h3>QNo. <?php echo $data['qunum']; ?>: <?php echo $data['quname']; ?></h3>
                        </td>
                    </tr>
                    <?php
                    $qno = $data['qunum'];
                    $ans = $exam->getANS($qno);
                    if ($ans) {
                        while ($data = $ans->fetch_assoc()) { ?>
                            <tr>
                                <td>

                                    <?php
                                    if ($data['rightans'] == '1') { ?>

                                        <input type="radio" checked value="<?php echo $data['quid']; ?>" /><?php echo $data['ans'] ?>
                                    <?php } else { ?>
                                        <input type="radio" value="<?php echo $data['quid']; ?>" /><?php echo $data['ans']; ?>

                                    <?php } ?>
                                </td>
                            </tr>
                    <?php }
                    } ?>
            <?php }
            } ?>

        </table>
    </div>
</div>
<?php include 'inc/footer.php'; ?>