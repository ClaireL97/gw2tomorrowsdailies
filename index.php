<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

$dailies = json_decode(file_get_contents("https://api.guildwars2.com/v2/achievements/daily/tomorrow"));
// print_r($dailies);
$dailyIDs = '';
foreach ($dailies as $gameMode) {
	foreach ($gameMode as $achievement) {
		$dailyIDs .= $achievement->id .',';
	}
}
print_r($dailyIDs);
/*

*/
foreach ($results->wvw as $value) {
	//echo $value->id;

	$achievement = json_decode(file_get_contents("https://api.guildwars2.com/v2/achievements?id=".$value->id));

	// print_r($achievement);
	/*
	Things to display
	Name, Requirement, Description
	*/

	/*

	use $results (of next daily) to get all ids in a comma separated string
	query api using above, insert into an associative array of achieve_id=>data
	$allAchieves = apiCall with all ids
		ids 		achievement
		1999		blah blah Caravan Disruptor
		1849 		blah blah land claimer
		2304 		blah blah pve scrubiness
		34324		blah blah spvp newbnessiness

	foreach results as gameMode
		foreach gameMode as data
			$allAchieves[d$ata->id] will contain your data
			e.g. $allAchieves[1999] is your WvW daily
		*/
	?>
	</br>
<?php
}
?>

</body>
</html>
