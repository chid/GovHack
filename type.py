<?php 

// variant 2: with localhost
$link = mysqli_connect('localhost', 'root','root', 'g');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
$p = $_GET['p'];
$p = (int)$p;

$table = 'air1000'

$result = $link->query("SELECT DISTINCT Brand FROM $table") or die("Error in the consult.." . mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
	print json_encode($row);
	exit;
}
// echo 'seems ok';
mysqli_close($link);
 ?>
