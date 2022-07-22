<?php
            if(isset($_POST["Loout"]))
            {
                session_destroy();
                ?>
                <script type="text/javascript">
                    alert("Thanks");
                    location="login.php";
                </script>
                <?php
            }
        ?>



<?php
            echo date('Y-m-d', strtotime($date. ' + 10 days'));
            $date=date("Y/m/d");
            print_r($date);
        ?> 