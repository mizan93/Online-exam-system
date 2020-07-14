<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/inc/header.php');
?>
<?php
?>
<style>
  .adminpanel {
    width: 500px;
    color: #999;
    margin:0 auto;
    margin-top: 30px;
padding: 50px;
border: 1px dotted #ddd;
  }
</style>
<div class="main">
  <h1>Admin Panel</h1>

  <div class='adminpanel'>
    <h2>Welcom to adimin panel</h2>
    <p>You can manage your user and online exam from here.</p>
  </div>


</div>
<?php include 'inc/footer.php'; ?>