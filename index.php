<?php include "./static/includes/header.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<h1>Tomorrows Dailies</h1>
<?php

$dailies = json_decode(file_get_contents("https://api.guildwars2.com/v2/achievements/daily/tomorrow"));

$dailyIDs = '';
foreach ($dailies as $gameMode) {
	foreach ($gameMode as $achievement) {
		$dailyIDs .= $achievement->id .',';
	}
}
// get all of the achievement data from the API - returns array of objects, indexed numerically
$allAchieves = json_decode(file_get_contents("https://api.guildwars2.com/v2/achievements?ids=".$dailyIDs));
// start a new array to hold the properly indexed achievements - indexing by their ids
$achievesArray = array();
// loop through the array of objects and add them to the id-indexed array
foreach ($allAchieves as $achieve) {
	$achievesArray[$achieve->id] = $achieve;
}
unset($allAchieves); // just so we know, we aren't using this anymore!
//
?>
<table>
<thead>
<th> Name </th>
<th> Requirement </th>
<th> Description </th>
</thead>
<?php foreach ($dailies as $gamemode) { ?>
	<tr>
	<?php foreach($gamemode as $daily) { ?>
		<tr>
			<td> <?= $achievesArray[$daily->id]->name ?> </td>
			<td> <?= $achievesArray[$daily->id]->requirement ?> </td>
			<td> <?= $achievesArray[$daily->id]->description ?> </td>
		</tr>
	<?php } ?>
	</tr>
<?php } ?>
</table>

</body>
</html>
<?php include "./static/includes/footer.php";?>
	<!-- /*
	Things to display
	Name, Requirement, Description
	*/ -->