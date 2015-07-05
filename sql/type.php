<?php 

// variant 2: with localhost
$link = mysqli_connect('localhost', 'test','root', 'g');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
// $p = $_GET['p'];
// $p = (int)$p;

$table = 'gh_aircon';
if (isset($_GET['t'])) {
	$table = $link->real_escape_string($_GET['t']);
}

$result = $link->query("SELECT Brand FROM $table GROUP BY Brand ORDER BY Brand") or die("Error in the consult.." . mysqli_error($link));


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
