<?php
 session_start();  
include('config.php');
if(isset($_POST["login"]))
{
  $_username=$_POST["username"];
  $_password=$_POST["pwd"];
  $sql = "SELECT * from `admin` WHERE `email_id` = '$_username' AND `password` = '$_password'";
  $result = $mysqli -> query($sql);
  if($row = $result->fetch_assoc())
  {
    if($row['password']==$_password && $row['email_id']==$_username)
    {
      $_SESSION["admin"]=$_username;
      $_SESSION["admin1"]=$row['name'];
      $p=$row['name'];
      
      ?>
        <script type="text/javascript">
          alert("Admin login successful");
          location="./admin/admin_site.php";
        </script>
      <?php
    }
  }
  else
  {
    $sql = "SELECT * from `users` WHERE `email_id` = '$_username' AND `password` = '$_password'";
    $result = $mysqli -> query($sql);
    if($row = $result->fetch_assoc())
    {
      if($row['password']==$_password && $row['email_id']==$_username)
      {
        $_SESSION["user"]=$_username;
        ?>
          <script type="text/javascript">
            alert("User login successful");
            location="./admin/admin_site.php";
          </script>
        <?php
      }
    }
    else
    {
      echo '<script>alert("Invalid Credentials")</script>';
    }
  }
}
?>
<html lang="en"> 
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet">
  </head>
  <?php
    include("navbar.html");
  ?>
  <body >
    <main class="form-signin">
      <form method="POST" enctype="multipart/form-data" class="text-center">
        <br><br>
        <h1 class="h3 mb-3 fw-bold" style="padding-top:30%">LOGIN</h1>
        <hr>
      
        <div class="form-floating">
          <input type="email" class="form-control" id="username" name="username" placeholder="name@example.com" required>
          <label>User Name</label>
        </div>
        <br>
        <div class="form-floating">
          <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
          <label>Password</label>
        </div>

        <br>
        <button class="btn btn-primary btn-lg active" type="submit" id="login" name="login">Login</button><br><br>
        <h5>Don't have an account? Create one!</h5><a href="user_sign_up.php" role="button" aria-pressed="true">Sign Up</a>
        <p class="mt-5 mb-3 text-muted fw-bold">&copy;2022-2023</p>
      </form>
    </main>
  </body>
</html>
