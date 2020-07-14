<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
$userid = Session::get('userId');

?>

<div class="main">
    <h1>Update your profile</h1>
    <?php 
if (isset($updatedata)) {
echo $updatedata;
}
?>
    <style>
        .profile {
            width: 520px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 50px;
        }
    </style>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $updatedata=$user->updateUserdata($_POST,$userid);
    }
    $getdata = $user->getuserdata($userid);
    if ($getdata) {
        while ($data = $getdata->fetch_assoc()) {

    ?>
            <div class="profile">
                <form action="" method="post">
                    <table class="tbl">
                        <tr>
                            <td>Name</td>
                            <td><input name="email" id='email' type="text" value="<?php echo $data['name']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td><input name="username" id='username' type="text" value="<?php echo $data['username']; ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input name="email" id='email' type="text" value="<?php echo $data['email']; ?>"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input type="submit" name="update" id="update" value="Update">

                        </tr>
                    </table>
                </form>
        <?php }
    } ?>
            </div>
</div>
<?php include 'inc/footer.php'; ?>