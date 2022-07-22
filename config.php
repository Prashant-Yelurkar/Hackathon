<?php
$mysqli = new mysqli("localhost","root","","e_newspaper");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
  }
