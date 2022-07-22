<?php
  include('config.php');
?>

<html>
  <head>
    <link rel="stylesheet" href="css/secondpage.css">
  </head>
  <body>
    <?php
    include('navbar.html');
    ?>
  
    <form method="POST" enctype="multipart/form-data" class="section">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
                <?php
                    $sql = "SELECT distinct(`language`) FROM `admin`";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) 
                    {
                        ?>
                        <h1>Select language</h1>
                        <select name="language" id="language">
                        <option value="">Select Language</option>
                            <?php 
                                while($row = $result->fetch_assoc()) 
                                {
                            ?>
                                <option value="<?php echo $row["language"];
                                    // The value we usually set is the primary key
                                ?>">
                                    <?php echo $row["language"];
                                        // To show the category name to the user
                                    ?>
                                </option>
                            <?php 
                                }
                                // While loop must be terminated
                            ?>
                        </select>
                        <br><br><button class="btn btn-primary btn-lg active" type="submit" id="findl" name="findl">Find</button><br>
                        <?php
                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
            </div>
        </div>
        <?php
        if(isset($_POST["findl"]))
        {
            $language=$_POST["language"];
        
        ?>
        <div class="col-sm-6">
            <div class="card">
            <div class="card-body">
            <?php
                    $sql = "SELECT distinct(`name`) FROM `admin` Where `language` = '$language'";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) 
                    {
                        ?>
                        <h1>Select Newspaper</h1>
                        <select name="name">
                        <option value="">Select Newspaper</option>
                            <?php 
                                while($row = $result->fetch_assoc()) 
                                {
                            ?>
                                <option value="<?php echo $row["name"];
                                    // The value we usually set is the primary key
                                ?>">
                                    <?php echo $row["name"];
                                        // To show the category name to the user
                                    ?>
                                </option>
                            <?php 
                                }
                                // While loop must be terminated
                            ?>
                        </select>
                        <br><br><button class="btn btn-primary btn-lg active" type="submit" id="findn" name="findn">Find</button><br>
                        <?php
                    } else {
                        echo "0 results";
                    }
                ?>
            </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <?php
    if(isset($_POST["findn"]))
    {
        $name=$_POST["name"];
        $date=date("Y-m-d");
        $sql = "SELECT * from `daily_news` WHERE `date` = '$date' AND `name`='$name'";
        $result = $mysqli -> query($sql);
        if($row = $result->fetch_assoc())
        {
        ?>
        <br>
        <br>
        <object data="admin/daily_news/<?= $row["file"]?>#toolbar=0" width="100%" height="100%">
            <p>Your web browser doesn't have a PDF plugin.
            Instead you can <a href="admin/daily_news/<?= $row["file"]?>#toolbar=0">click here to
            download the PDF file.</a></p>
        </object>
        
        <?php
        }
    }
    ?>
    </from>

</body>
</html>