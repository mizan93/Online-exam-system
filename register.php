<?php include 'inc/header.php'; ?>

<div class="main">
  <h1>Online Exam System - User Registration</h1>
  <div class="segment" style="margin-right:30px;">
    <img src="img/regi.png" />
  </div>
  <div class="segment">

    <span id="regmsg"></span>

    <form id="userreg" action="" method="post">
      <table>
        <tr>
          <td>Name</td>
          <td>:</td>
          <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
          <td>Username</td>
          <td>:</td>

          <td><input name="username" type="text" id="username"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td>:</td>

          <td><input type="password" name="pass" id="pass"></td>
        </tr>

        <tr>
          <td>E-mail</td>
          <td>:</td>

          <td><input name="email" type="text" id="email"></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td><input type="submit" name='regsubmit' id="regsubmit" value="Signup">
          </td>
        </tr>
      </table>
    </form>
    <p>Already Registered ? <a href="index.php">Signin</a> Here</p>

  </div>



</div>
<?php include 'inc/footer.php'; ?>