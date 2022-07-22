<?php
    session_start();  
    include('../config.php');
    $email_id=($_SESSION["admin"]);  
    $name=($_SESSION["admin1"]);
    if($_SESSION["admin"])
    { 
        date_default_timezone_set("Asia/Calcutta");
        $time=date("h:i:sa");
        $date=date("Y-m-d");
        $_date=date("d-m-Y");
        if(isset($_POST["submitnews"]))
        {
            $file = $_FILES["newspaper"]["name"];
            $sql = "SELECT * from `daily_news` WHERE `date` ='$date' AND `name` = '$name'";
            $result = $mysqli -> query($sql);
            
            if($row = $result->fetch_assoc())
            {
                if($row['date']== $date && $row['name']==$name)
                {
                    echo '<script>alert("You already submitted today PDF try tomorrow")</script>';
                }
            }
            else
            {
                $sql1=$mysqli->query("INSERT INTO `daily_news`(`name`,`date`,`file`) VALUES ('$name','$date','$file')");
                if($sql1)
                {
                    print_r($sql1);
                    echo '<script>alert("File Upload successfully")</script>';
                }
            }
        }
        
        elseif(isset($_POST["submitarchives"]))
        {
            $date1=$_POST["date"];
            $file = $_FILES["newspaper"]["name"];
            $sql="SELECT * from `archives` WHERE `date` ='$date1' AND `name` = '$name'";
            $result = $mysqli -> query($sql);
            if($row = $result->fetch_assoc())
            {
                if($row['date']== $date1 && $row['name']==$name)
                {
                    echo '<script>alert("You already submitted today PDF try tomorrow")</script>';
                }
            }
            else
            {
                $sql1=$mysqli->query("INSERT INTO `archives`(`date`,`name`,`file`) VALUES ('$date1','$name','$file')");
                if($sql1)
                {
                    print_r($sql1);
                    echo '<script>alert("File Upload successfully")</script>';
                }
            }
        }
    ?> 
        <html>  
            <head>
            <link href="admin_site.css" rel="stylesheet">
            <title>Admin Login</title>
            </head>
                <?php
                $sql = "SELECT * from `admin` WHERE `email_id` ='$email_id'";
                $result = $mysqli -> query($sql);
                if($row = $result->fetch_assoc())
                {
                ?>
            <body> 
                <?php
                }
                ?>
                <form method="POST" enctype="multipart/form-data">
                    <?php
                        include('ad_navbar.html');
                    ?>
                    <section class="section">
                        <div align="right" class="name">
                            <h4><?php print_r($name);?><img src="admin_logo/<?= $row["logo"]?>" alt="<?php print_r($_name);?>"></h4>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Upload Daily News</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <button class="btn btn-primary btn-lg active" id="uploadnews" name="uploadnews">Upload</button>
                                    <?php
                                        if(isset($_POST["uploadnews"]))
                                        {
                                            ?>
                                            <br>
                                            <br>
                                            <?php print_r($_date)?>
                                            <table>
                                                <tr>
                                                    <td>Today's Newspaper : :</td>
                                                    <td><input type="file" id="newspaper" name="newspaper"></td>
                                                </tr>
                                            </table>
                                                <br><br>
                                                <center><button class="btn btn-primary btn-lg active" id="submitnews" name="submitnews">Submit</button></center>
                                            <?php
                                            
                                        }
                                    ?>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Archives</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <button class="btn btn-primary btn-lg active" id="uploadarchives" name="uploadarchives">Upload</button>
                                    <?php
                                        if(isset($_POST["uploadarchives"]))
                                        {
                                            ?>
                                            <br><br>
                                            <input type="date" id="date" name="date"><br>
                                            <br>
                                            <table>
                                                <tr>
                                                    <td>Uplod archives here:</td>
                                                    <td><input type="file" id="newspaper" name="newspaper"></td>
                                                </tr>
                                            </table>
                                                <br><br>
                                                <center><button class="btn btn-primary btn-lg active" id="submitarchives" name="submitarchives">Submit</button></center>
                                            <?php
                                            
                                        }
                                    ?>
                                </div>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Analytics</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Special title treatment</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <br><br>
                    <div class="button">
                        <button class="btn btn-primary" id="logout" name="logout">Logout</button><br><br>
                        <?php
                            if(isset($_POST["logout"]))
                            {
                                session_destroy();
                                ?>
                                <script type="text/javascript">
                                    alert("Thanks");
                                    location="../login.php";
                                </script>
                                <?php
                            }
                        ?>
                    </div>
                </form>
            </body>  
        </html>  
    <?php
    }

?>





