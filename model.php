<?php 

// variant 2: with localhost
$link = mysqli_connect('localhost', 'root','root', 'g');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
// $p = $_GET['p'];
// $p = (int)$p;
$q = 'SRK20ZIX-S';
if (isset($_GET['p'])) {
	$q = $link->real_escape_string($_GET['p']);
}
$table = 'airFinal';

$result = $link->query("SELECT * FROM $table WHERE model_no = '$q' LIMIT 1") or die("Error in the consult.." . mysqli_error($link));


$r = [];
while ($row = mysqli_fetch_array($result)) {
	// json_encode($row);
	// exit;
	$r[] = $row;
}
// json_encode($r);
print json_encode($r);
// echo 'seems ok';
mysqli_close($link);
 ?>
