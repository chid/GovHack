<?php 

// variant 2: with localhost
$link = mysqli_connect('localhost', 'test','root', 'g');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
// $p = $_GET['p'];
// $p = (int)$p;
$q = 'SRK20ZIX-S';
if (isset($_GET['p'])) {
	$q = $link->real_escape_string($_GET['p']);
}
$table = 'gh_aircon';
$table = 'gh_aircon';

// $result = $link->query("SELECT * FROM $table WHERE model_no = 'FTXZ25N / RXZ25N' LIMIT 3") or die("Error in the consult.." . mysqli_error($link));
$result = $link->query("SELECT * FROM $table ORDER BY Star2010_Cool DESC LIMIT 3") or die("Error in the consult.." . mysqli_error($link));
$result = $link->query("SELECT Brand, Model_No, Star2010_Cool, Star2010_Heat, recommends FROM $table ORDER BY Star2010_Cool DESC LIMIT 3") or die("Error in the consult.." . mysqli_error($link));


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
