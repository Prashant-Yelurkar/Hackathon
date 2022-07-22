<?php
  include('config.php');
  if(isset($_POST['register']))
  {
    $f_name=$_POST["f_name"];
    $m_name=$_POST["m_name"];
    $l_name=$_POST["l_name"];
    $gender=$_POST["gender"];
    $email_id=$_POST["email_id"];
    $mobile=$_POST["mobile"];
    $password=$_POST["pwd"];
    $rpassword=$_POST["rpwd"];

    if($password==$rpassword)
    {
      $sql = "SELECT * from `users` WHERE `email_id` = '$email_id' AND `password` = '$password'";
      $result = $mysqli -> query($sql);
      if($row = $result->fetch_assoc())
      {
        if($row['email_id']==$email_id)
        {
          echo'<script>alert("Email-id already registered go to login page")</script>';
        }
      }
      else
      {
        $sql=$mysqli->query("INSERT INTO `users`(`f_name`,`m_name`,`l_name`,`gender`,`email_id`,`mobile`,`password`) VALUES('$f_name','$m_name','$l_name','$gender','$email_id','$mobile','$password')");
        if($sql)
        {
          echo'<script>alert("Registration completed successfully")</script>';
        }
      }
    }
    else
    {
      echo'<script>alert("Password Mismatch")</script>';
    } 
  }
?>

<html>
  <head>
    <link rel="stylesheet" href="css/sign_up.css">
  </head>
  <body>
    <?php
    include('navbar.html');
    ?>
  
    <form method="POST" enctype="multipart/form-data">
      <section>
        <center>
          <div>
            <h1> Register here</h1>
            <br>
            <table>
              </tr>
                <td>First Name</td>
                <td><input type="Text" class="form-control" id="f_name" name="f_name" placeholder="First Name" required></td>
              </tr>
              <tr>
                <td>Middle Name
                <td><input type="Text" class="form-control" id="m_name" name="m_name" placeholder="Middle Name" required></td>
              </tr>
              <tr>
                <td>Last Name</td>
                <td><input type="Text" class="form-control" id="l_name" name="l_name" placeholder="Last Name" required></td>
              </tr>
              <tr>
                <td>Select Gender</td>
                <td>
                  <select name="gender" id="gender" required >
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select> 
                </td>
              </tr>
              <tr>
                <td>Email-id</td>
                <td><input type="email" class="form-control" id="email_id" name="email_id" placeholder="name@example.com" required><td>
              </tr>
              <tr>
                <td>Contact</td>
                <td><input type="contact" class="form-control" id="mobile" name="mobile" placeholder="9870456456" required></td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required></td>
              </tr>
              <tr>
                <td>Re-enter Password</td>
                <td><input type="password" class="form-control" id="rpwd" name="rpwd" placeholder="Password" required></td>
              </tr>
            </table>
            <br><button class="btn btn-primary btn-lg active" type="submit" id="register" name="register"> Register</button>
            <br><a href="https://pmny.in/gINiGYecC0b5">Pay Now(demo)</a>
          <div>
        </center>
        <div align="right">
          <?php
          if(isset($_POST['register']))
          {
            ?>
            <a href="login.php" class="btn btn-primary btn-lg " role="button" aria-pressed="true">Login</a>
            <?php
          }
          ?>
        </div>
    </from>
  </body>
</html>