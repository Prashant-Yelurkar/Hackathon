<?php
include('../config.php');
?>
<?php

$sql = "SELECT * from `admin` WHERE `id` = 8";
$result = $mysqli -> query($sql);
if($row = $result->fetch_assoc())
{
?>
<html>
	<body>
	<div class="card" style="width: 18rem;">
	<embed src="admin_doc/<?= $row["r_document"]?>#toolbar=0" width="800px" height="500vh" />
		<img src="admin_doc/<?= $row["r_document"]?>" class="card-img-top" alt="...">
			<div class="card-body">
			<h5 class="card-title">Card title</h5>
			<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			<a href="#" class="btn btn-primary">Go somewhere</a>
		</div>
	</div>
</body>
</html>
<?php
}
?>

