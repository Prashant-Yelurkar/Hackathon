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
      <section>
          <div>
            <h3>Select Language</h3>
            <select name="language" id="language">
                <option value="">Select Language</option>
                <option value="English">English</option>
                <option value="Hindi">Hindi</option>
                <option value="Marathi">Marathi</option>
                <option value="Urdu">Urdu</option>
                <option value="Gujrati">Gujrati</option>
            </select> 
            <br>
            <br><button class="btn btn-primary btn-lg active" type="submit" id="find" name="find">Find</button>
            
          <div>
          <div >
          <?php
            if(isset($_POST['find']))
            {
                    $language=$_POST["language"];
                    
                    $sql="SELECT * FROM `admin` WhERE `language`='$language'";
                    $result = $mysqli -> query($sql);
                    if($row = $result->fetch_assoc())
                    {  
                        if($row['language']==$language)
                        {
                            
                            ?>
                            <h3>Select Newspaper</h3>
                            <select name="name" id="name" required >
                                <option value="">Select name</option>
                                <?php
                                if($language == "English")
                                {
                                    ?>
                                    <option value="Times of india">Times of india</option>
                                    <?php
                                }
                
                                if($language == "Hindi")
                                {
                                    ?>
                                    <option value="Dainik Bhaskar ">Dainik Bhaskar </option>
                                    <?php
                                }
                                
                                if($language == "Marathi")
                                {
                                    ?>
                                    <option value="Sakal">Sakal</option>
                                    <?php
                                }
                                if($language == "Gujrati")
                                {
                                    ?>
                                    <option value="Diya Bhaskar ">Divya Bhaskar </option>
                                    <?php
                                }
                                if($language == "Gujrati")
                                {
                                    ?>
                                    <option value="Sahafat">Sahafat</option>
                                    <?php
                                }
                            ?>
                            
                        </select> 
                        <?php
                        }
                    }
                    ?>
                <br>
                <br><button class="btn btn-primary btn-lg active" type="submit" id="find1" name="find1"> Find</button>
                <?php
            }
            ?>
            <?php
            if(isset($_POST["find1"]))
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
        </div>
    </from>
  </body>
</html>