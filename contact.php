<?php 
$mysqli=new mysqli("localhost","root","","seven_wonders");
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
  }
  

if(isset($_POST["submit"]))
{
    
    $fname = $_POST["firstname"];
    $l_name = $_POST["lastname"];
    $e_maile = $_POST["emaile"];
    $mobile = $_POST["mobile"];
    $countery = $_POST["country"];
    $subject = $_POST["subject"];

    $sql = $mysqli->query("Insert INTO `contact_us` (`first_name`, `last_name`,`country`, `mobile_no`, `email_id`, `subject`)  VALUES ('$fname',' $l_name','$countery',' $mobile','$e_maile',' $subject')");
    if($sql)
    {
        echo '<script>alert("your query is stored.we will inform you on your submitted email address.")</script>';
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
        SEVEN WONDERS OF THE WORLD
        </title>
        <!--style-->
        <link rel="stylesheet " href="css/contact.css">
    </head>
    <body>
        <?php
        include 'navbar.html';
        ?>
        <div class="container" style="padding-top:150px;">
            <div style="text-align:center">
                <h2>Contact Us</h2>
            </div>
            <div class="row">
                <div class="column">
                <img class="image" id="main-img" src="image/contact.gif" />
                </div>
                <div class="column">
                    <form method = "POST" encrypt="multipart/form-data">
                    <label for="fname">First Name</label>
                    <input type="text" id="fname" name="firstname" placeholder="Your First name..." required>
                    <label for="lname">Last Name</label>
                    <input type="text" id="lname" name="lastname" placeholder="Your Last name..." required>
                    <label for="country">Country</label>
                    <input type="text" id="Country" name="country" placeholder="Your Country name ..."required>
                    <label for="fname">Mobile No</label>
                    <input type="text" id="mobile" name="mobile" placeholder="Your Mobile no..."required>
                    <label for="fname">E-Mail ID</label>
                    <input type="text" id="E-Mail" name="emaile" placeholder="Your E-mail id..."required>
                    <label for="subject">Subject</label>
                    <textarea id="subject" name="subject" placeholder="Write something..." style="height:170px" required ></textarea>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success"  id = "submit" name = "submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
        <script>
            function myFunction() {
              alert("your information get stored on our server we reply you in very soon");
            }
        </script>
    </body>
</html>