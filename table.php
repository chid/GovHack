<html>
<head>
	<style type="text/css" src="k.css"></style>
</head>
<body>
<div id="full">
<input class="search" />
<table>
<?php
$f = fopen("tv.csv", "r");
$header = ($line = fgetcsv($f));
print "<thead>";
foreach ($line as $cell) {
	print "<th>".$cell."</th>";
}
print "</thead>";
print '<tbody class="list">';
while (($line = fgetcsv($f)) !== false) {
        $i = 0;
        echo "<tr>";
        foreach ($line as $cell) {
        	if ($i < 6 or $header[$i] == "CEC") {
                echo "<td class='".$header[$i]."''>" . htmlspecialchars($cell) . "</td>";
                // print $i;
            }
            $i = $i+1;
        }
        echo "</tr>\n";
}
fclose($f);
// $tv = file_get_contents('tv.csv');
echo "\n</table></body></html>";
?>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
<script type="text/javascript" src="list.min.js"></script>
<script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

<script type="text/javascript">
	console.log('ok');

	var options = {
    valueNames: ['Submit_ID', 'Brand_Reg', 'Model_No' ]
	};

	var mainList = new List('full', options);

	mainList.filter(function(i) {
		console.log(i.values());
		if (i.values().Submit_ID < 52050) {
			return true;
		} else {
			return false;
		}
	})

	function resetFilter() {
		mainList.filter(function(i) {return true;})
	}

	$('table > tbody > tr').click(function() {
    	// row was clicked
    	console.log('I was clicked');
    	console.log($(this))
    	var row = $(this).find('td:nth(2)').text();
  		console.log('You clicked ' + row);
	});
</script>