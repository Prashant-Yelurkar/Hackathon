<?php
session_start();  
include('../config.php');
if(isset($_POST["register"]))
{
  $name=$_POST["name"];

  $logo = $_FILES["logo"]["name"];

  $email_id=$_POST["email_id"];
  $gst_no=$_POST["gst"];
  $language=$_POST["language"];
  $password=$_POST["pwd"];
  $rpasswprd=$_POST["rpwd"];

  $doc = $_FILES["doc"]["name"];
  $tempdoc = $_FILES["doc"]["tmp_dname"];
  $folder = "admin_doc/" . $doc;

  if($password==$rpasswprd)
  {
    $sql = "SELECT * from `admin` WHERE `email_id` = '$email_id' AND `password` = '$password'";
    $result = $mysqli -> query($sql);
    if($row = $result->fetch_assoc())
    {
      if($row["email_id"]==$email_id && $row["password"]==$password)
      {
        echo'<script>alert("Email-id already registered go to login page")</script>';
      }
    }
    else
    {
   
      $sql=$mysqli->query("INSERT INTO `admin`(`name`,`logo`,`email_id`,`gst_num`,`language`,`password`,`r_document`) VALUES ('$name','$logo','$email_id','$gst_no','$language','$password','$doc')");
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
    <link rel="stylesheet" href="../navbar.css">
    <link rel="stylesheet" href="../sign_up.css">
  </head>
  <body>
    <?php
      include('../navbar.html');
    ?>
  
    <form method="POST" enctype="multipart/form-data" >
      <section >
        <center>
          <div>
            <h1> Register here</h1>
            <br>
            <table>
              </tr>
                <td>Name</td>
                <td><input type="Text" class="form-control" id="name" name="name" placeholder="Name of News paper" required></td>
              </tr>
              <tr>
                <td>Company logo</td>
                <td><input type="file" id="logo" name="logo"></td>
              </tr>
              <tr>
                <td>Email-id</td>
                <td><input type="email" class="form-control" id="email_id" name="email_id" placeholder="name@example.com" required><td>
              </tr>
              <tr>
                <td>GST Number</td>
                <td><input type="Text" class="form-control" id="gst" name="gst" placeholder="22AAAAA0000A1Z5" required></td>
              </tr>
              <tr>
                <td>Select Language</td>
                <td>
                  <select name="language" id="language" required >
                    <option value="">Select Language</option>
                    <option value="English">English</option>
                    <option value="Hindi">Hindi</option>
                    <option value="Marathi">Marathi</option>
                    <option value="Urdu">Urdu</option>
                    <option value="Gujrati">Gujrati</option>
                  </select> 
                </td>
              </tr>
              <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required></td>
              </tr>
              <tr>
                <td>Re-enter Password</td>
                <td><input type="password" class="form-control" id="rpwd" name="rpwd" placeholder="Password" required></td>
              </tr>
              <tr>
                <td>Legal Document</td>
                <td><input type="file" id="doc" name="doc"></td>
              </tr>
            </table>
            <br><button class="btn btn-primary btn-lg active" type="submit" id="register" name="register"> Register</button>
            
          <div>
        </center>
        <div align="right">
          <?php
          if((isset($_POST['register']) AND $row) OR isset($_POST['register']) AND $sql)
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