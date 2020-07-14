<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
include_once($filepath . '/../classes/user.php');
$user = new User();
?>
<?php
// Session::checkLogin();
?>

<?php
if (isset($_GET['dis_id'])) {
   $dis_id = (int) $_GET['dis_id'];
   $disable = $user->disableUser($dis_id);
}
if (isset($_GET['enable_id'])) {
   $enable_id = (int) $_GET['enable_id'];
   $enable = $user->enableUser($enable_id);
}
?>
<?php
//delete user
if (isset($_GET['remove_id'])) {
   $id = $_GET['remove_id'];
   $deluser = $user->RemoveUser($id);
}
?>
<div class="main">
  <div class='manageuser'>
    <h1>Admin panel - Manage user</h1>
    <?php
    if (isset($disable)) {
       echo $disable;
    }
    ?>
    <?php
    if (isset($enable)) {
       echo $enable;
    }
    ?>
<?php
if (isset($deluser)) {
   echo $deluser;
}
?>
    <table class='tblone'>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      <?php
      //get user
      $userdata = $user->getAllUserdata();
      if ($userdata) {
         $i = 0;
         while ($data = $userdata->fetch_assoc()) {
            $i++;
            ?>
            <tr>
              <td>
                <?php
                if ($data['status'] == '1') {
                   echo " <span class='error'>" . $i . "</span>";
                } else {
                   echo $i;
                }
                ?>
              </td>
              <td>
      <?php
      if ($data['status'] == '1') {
         echo " <span class='error'>" . $data['name'] . "</span>";
      } else {
         echo $data['name'];
      }
      ?>
              </td>
              <td>
                <?php
                if ($data['status'] == '1') {
                   echo " <span class='error'>" . $data['username'] . "</span>";
                } else {
                   echo $data['username'];
                }
                ?>
              </td>
              <td>
                <?php
                if ($data['status'] == '1') {
                   echo " <span class='error'>" . $data['email'] . "</span>";
                } else {
                   echo $data['email'];
                }
                ?>
              </td>
              <td>
            <?php
            if ($data['status'] == '0') {
               ?>
                   <a onclick="return confirm('Are you sure to disable ??');" href="?dis_id=<?php echo $data['userid']; ?>"><abbr title="click to enable">Disable</abbr></a>
      <?php } else { ?>
                   <a onclick="return confirm('Are you sure to enable ??');" href="?enable_id=<?php echo $data['userid']; ?>"><abbr title="click to disable">Eanable</abbr></a>
      <?php } ?>
                || <a onclick="return confirm('Are you sure to remove ??');" href="?remove_id=<?php echo $data['userid']; ?>">Remove</a>
              </td>
            </tr>
   <?php }
}
?>
    </table>
  </div>
</div>
<?php include 'inc/footer.php'; ?>